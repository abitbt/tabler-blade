<?php

namespace Abitbt\TablerBlade\TablerMenu;

use Abitbt\TablerBlade\TablerMenu\Concerns\Authorizable;
use Abitbt\TablerBlade\TablerMenu\Concerns\HasAttributes;
use Abitbt\TablerBlade\TablerMenu\Concerns\HasBadge;
use Abitbt\TablerBlade\TablerMenu\Concerns\HasIcon;
use Abitbt\TablerBlade\TablerMenu\Contracts\Renderable;
use Closure;

abstract class MenuItem implements Renderable
{
    use Authorizable;
    use HasAttributes;
    use HasBadge;
    use HasIcon;

    protected string $title;

    protected mixed $activeWhen = null;

    protected bool $visible = true;

    protected bool $forceActive = false;

    /**
     * Set the active condition for the menu item.
     */
    public function activeWhen(string|Closure $condition): self
    {
        $this->activeWhen = $condition;

        return $this;
    }

    /**
     * Set the active condition based on URL pattern.
     */
    public function activeUrl(string $pattern): self
    {
        $this->activeWhen = fn () => request()->is($pattern);

        return $this;
    }

    /**
     * Set the active condition based on route pattern.
     */
    public function activeRoute(string $pattern): self
    {
        $this->activeWhen = fn () => request()->routeIs($pattern);

        return $this;
    }

    /**
     * Force this menu item to be active.
     */
    public function active(bool $active = true): self
    {
        $this->forceActive = $active;

        return $this;
    }

    /**
     * Hide the menu item conditionally.
     */
    public function if(bool $condition): self
    {
        $this->visible = $condition;

        return $this;
    }

    /**
     * Hide the menu item unless condition is true.
     */
    public function unless(bool $condition): self
    {
        $this->visible = ! $condition;

        return $this;
    }

    /**
     * Get the menu item title.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Determine if the menu item should be visible.
     */
    public function isVisible(): bool
    {
        if (! $this->visible) {
            return false;
        }

        return $this->isAuthorized();
    }

    /**
     * Determine if the menu item is currently active.
     */
    public function isActive(): bool
    {
        if ($this->forceActive) {
            return true;
        }

        if ($this->activeWhen === null) {
            return false;
        }

        if ($this->activeWhen instanceof Closure) {
            return call_user_func($this->activeWhen);
        }

        // String pattern - assume it's a route pattern
        if (is_string($this->activeWhen)) {
            return request()->routeIs($this->activeWhen);
        }

        return false;
    }

    /**
     * Convert the menu item to an array representation.
     */
    abstract public function toArray(): array;
}
