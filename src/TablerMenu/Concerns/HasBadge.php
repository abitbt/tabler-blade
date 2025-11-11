<?php

namespace Abitbt\TablerBlade\TablerMenu\Concerns;

trait HasBadge
{
    protected ?array $badge = null;

    /**
     * Set a badge for the menu item.
     */
    public function badge(string $text, ?string $color = null): self
    {
        throw_if(empty(trim($text)), \InvalidArgumentException::class, 'Badge text cannot be empty.');

        $this->badge = [
            'text' => $text,
            'color' => $color,
        ];

        return $this;
    }

    /**
     * Get the badge configuration.
     */
    public function getBadge(): ?array
    {
        return $this->badge;
    }

    /**
     * Get the badge text.
     */
    public function getBadgeText(): ?string
    {
        return $this->badge['text'] ?? null;
    }

    /**
     * Get the badge color.
     */
    public function getBadgeColor(): ?string
    {
        return $this->badge['color'] ?? null;
    }
}
