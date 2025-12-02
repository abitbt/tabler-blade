<?php

namespace Abitbt\TablerBlade\TablerMenu;

use Closure;
use Illuminate\Support\Traits\Macroable;

class TablerMenu
{
    use Macroable;

    protected array $items = [];

    /**
     * Create a new menu builder instance.
     */
    public static function make(): self
    {
        return new self;
    }

    /**
     * Create a menu from configuration array.
     * Returns processed array with authorization and active states applied.
     */
    public static function fromConfig(string $key): array
    {
        return self::processConfigArray(config($key, []));
    }

    /**
     * Process a configuration array and apply authorization/active states.
     */
    protected static function processConfigArray(array $items): array
    {
        return collect($items)
            ->filter(fn ($item) => self::isAuthorized($item))
            ->map(fn ($item) => self::processConfigItem($item))
            ->values()
            ->toArray();
    }

    /**
     * Process a single configuration item.
     */
    protected static function processConfigItem(array $item): array
    {
        $processed = $item;

        // Add active state for links
        if (($item['type'] ?? 'link') === 'link' && isset($item['active'])) {
            $processed['active'] = is_string($item['active'])
                ? request()->routeIs($item['active'])
                : (bool) $item['active'];
        }

        // Process nested dropdown items recursively
        if (isset($item['items']) && is_array($item['items'])) {
            $processed['items'] = self::processConfigArray($item['items']);

            // Dropdown is active if any child is active
            if (($item['type'] ?? null) === 'dropdown') {
                $processed['active'] = collect($processed['items'])
                    ->contains('active', true);
            }
        }

        // Resolve route to URL
        if (isset($item['route'])) {
            $processed['url'] = route($item['route']);
            unset($processed['route']);
        }

        return $processed;
    }

    /**
     * Check if item is authorized for current user.
     */
    protected static function isAuthorized(array $item): bool
    {
        if (isset($item['can'])) {
            return \Illuminate\Support\Facades\Gate::allows($item['can']);
        }

        if (isset($item['canAny'])) {
            return \Illuminate\Support\Facades\Gate::any($item['canAny']);
        }

        return true;
    }

    /**
     * Add a link to the menu.
     */
    public function link(string $title, string $url): MenuLink
    {
        $link = new MenuLink($title, $url);
        $this->items[] = $link;

        return $link;
    }

    /**
     * Add a dropdown to the menu.
     */
    public function dropdown(string $title): MenuDropdown
    {
        $dropdown = new MenuDropdown($title);
        $this->items[] = $dropdown;

        return $dropdown;
    }

    /**
     * Add a divider to the menu.
     */
    public function divider(): self
    {
        $this->items[] = new MenuDivider;

        return $this;
    }

    /**
     * Add a heading to the menu.
     */
    public function heading(string $title): self
    {
        $this->items[] = new MenuHeading($title);

        return $this;
    }

    /**
     * Add items conditionally.
     */
    public function when(bool $condition, Closure $callback): self
    {
        if ($condition) {
            $callback($this);
        }

        return $this;
    }

    /**
     * Add items unless condition is true.
     */
    public function unless(bool $condition, Closure $callback): self
    {
        if (! $condition) {
            $callback($this);
        }

        return $this;
    }

    /**
     * Create a group of menu items.
     */
    public function group(string $heading, Closure $callback): self
    {
        $this->heading($heading);
        $callback($this);

        return $this;
    }

    /**
     * Get all menu items.
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * Get visible menu items.
     */
    public function getVisibleItems(): array
    {
        return array_filter($this->items, fn ($item) => $item->isVisible());
    }

    /**
     * Convert the menu to an array representation.
     */
    public function toArray(): array
    {
        return array_values(array_map(
            fn ($item) => $item->toArray(),
            $this->getVisibleItems()
        ));
    }
}
