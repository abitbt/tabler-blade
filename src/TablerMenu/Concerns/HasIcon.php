<?php

namespace Abitbt\TablerBlade\TablerMenu\Concerns;

trait HasIcon
{
    protected ?string $icon = null;

    /**
     * Set the icon for the menu item.
     */
    public function icon(string $icon): self
    {
        throw_if(empty(trim($icon)), \InvalidArgumentException::class, 'Icon name cannot be empty.');

        $this->icon = $icon;

        return $this;
    }

    /**
     * Get the icon name.
     */
    public function getIcon(): ?string
    {
        return $this->icon;
    }
}
