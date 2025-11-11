<?php

namespace Abitbt\TablerBlade\TablerMenu;

use Abitbt\TablerBlade\TablerMenu\Contracts\Renderable;

class MenuHeading implements Renderable
{
    protected string $title;

    /**
     * Create a new menu heading instance.
     */
    public function __construct(string $title)
    {
        throw_if(empty(trim($title)), \InvalidArgumentException::class, 'Menu heading title cannot be empty.');

        $this->title = $title;
    }

    /**
     * Get the heading title.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Headings are always visible.
     */
    public function isVisible(): bool
    {
        return true;
    }

    /**
     * Headings are never active.
     */
    public function isActive(): bool
    {
        return false;
    }

    /**
     * Convert the heading to an array representation.
     */
    public function toArray(): array
    {
        return [
            'type' => 'heading',
            'title' => $this->title,
        ];
    }
}
