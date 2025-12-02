<?php

namespace Abitbt\TablerBlade\TablerMenu\Contracts;

interface Renderable
{
    /**
     * Convert the menu item to an array representation.
     */
    public function toArray(): array;

    /**
     * Determine if the menu item should be visible.
     */
    public function isVisible(): bool;

    /**
     * Determine if the menu item is currently active.
     */
    public function isActive(): bool;
}
