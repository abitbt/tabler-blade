<?php

namespace Abitbt\TablerBlade\TablerMenu;

use Abitbt\TablerBlade\TablerMenu\Contracts\Renderable;

class MenuDivider implements Renderable
{
    /**
     * Dividers are always visible.
     */
    public function isVisible(): bool
    {
        return true;
    }

    /**
     * Dividers are never active.
     */
    public function isActive(): bool
    {
        return false;
    }

    /**
     * Convert the divider to an array representation.
     */
    public function toArray(): array
    {
        return [
            'type' => 'divider',
        ];
    }
}
