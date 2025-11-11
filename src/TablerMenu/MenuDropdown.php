<?php

namespace Abitbt\TablerBlade\TablerMenu;

use Closure;

class MenuDropdown extends MenuItem
{
    protected array $children = [];

    protected ?int $columns = null;

    protected bool $right = false;

    /**
     * Create a new menu dropdown instance.
     */
    public function __construct(string $title)
    {
        throw_if(empty(trim($title)), \InvalidArgumentException::class, 'Menu dropdown title cannot be empty.');

        $this->title = $title;
    }

    /**
     * Define the dropdown items using a callback.
     */
    public function items(Closure $callback): self
    {
        $callback($this);

        return $this;
    }

    /**
     * Set the number of columns for the dropdown layout.
     */
    public function columns(int $columns): self
    {
        throw_if($columns < 1 || $columns > 6, \InvalidArgumentException::class, 'Dropdown columns must be between 1 and 6.');

        $this->columns = $columns;

        return $this;
    }

    /**
     * Align the dropdown menu to the right.
     */
    public function right(bool $right = true): self
    {
        $this->right = $right;

        return $this;
    }

    /**
     * Add a link to the dropdown.
     */
    public function link(string $title, string $url): MenuLink
    {
        $link = new MenuLink($title, $url);
        $this->children[] = $link;

        return $link;
    }

    /**
     * Add a nested dropdown to this dropdown.
     */
    public function dropdown(string $title): MenuDropdown
    {
        $dropdown = new MenuDropdown($title);
        $this->children[] = $dropdown;

        return $dropdown;
    }

    /**
     * Add a divider to the dropdown.
     */
    public function divider(): self
    {
        $this->children[] = new MenuDivider;

        return $this;
    }

    /**
     * Add a heading to the dropdown.
     */
    public function heading(string $title): self
    {
        $this->children[] = new MenuHeading($title);

        return $this;
    }

    /**
     * Get all child items.
     */
    public function getChildren(): array
    {
        return $this->children;
    }

    /**
     * Get visible children.
     */
    public function getVisibleChildren(): array
    {
        return array_filter($this->children, fn ($item) => $item->isVisible());
    }

    /**
     * Check if any child item is active.
     */
    protected function hasActiveChild(): bool
    {
        foreach ($this->children as $child) {
            if ($child->isActive()) {
                return true;
            }

            // Check nested dropdowns
            if ($child instanceof MenuDropdown && $child->hasActiveChild()) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the dropdown is currently active.
     */
    public function isActive(): bool
    {
        // Check explicit active state first
        if (parent::isActive()) {
            return true;
        }

        // Dropdown is active if any child is active
        return $this->hasActiveChild();
    }

    /**
     * Convert the menu dropdown to an array representation.
     */
    public function toArray(): array
    {
        $data = [
            'type' => 'dropdown',
            'title' => $this->title,
            'children' => array_values(array_map(
                fn ($item) => $item->toArray(),
                $this->getVisibleChildren()
            )),
            'active' => $this->isActive(),
        ];

        if ($this->icon !== null) {
            $data['icon'] = $this->icon;
        }

        if ($this->badge !== null) {
            $data['badge'] = $this->badge['text'];
            if ($this->badge['color'] !== null) {
                $data['badge_color'] = $this->badge['color'];
            }
        }

        if ($this->columns !== null) {
            $data['columns'] = $this->columns;
        }

        if ($this->right) {
            $data['right'] = true;
        }

        if (! empty($this->attributes)) {
            $data['attributes'] = $this->attributes;
        }

        return $data;
    }
}
