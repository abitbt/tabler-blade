<?php

namespace Abitbt\TablerBlade\TablerMenu;

class MenuLink extends MenuItem
{
    protected string $url;

    protected ?string $target = null;

    /**
     * Create a new menu link instance.
     */
    public function __construct(string $title, string $url)
    {
        throw_if(empty(trim($title)), \InvalidArgumentException::class, 'Menu link title cannot be empty.');
        throw_if(empty(trim($url)), \InvalidArgumentException::class, 'Menu link URL cannot be empty.');

        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Set the link target attribute.
     */
    public function target(string $target): self
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Open link in new tab/window.
     */
    public function newTab(): self
    {
        return $this->target('_blank');
    }

    /**
     * Get the URL for this link.
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * Automatically detect active state based on current URL.
     */
    public function autoActive(?string $prefix = null): self
    {
        if ($prefix !== null) {
            $this->activeRoute("{$prefix}*");
        } else {
            $this->activeWhen(fn () => request()->url() === $this->url);
        }

        return $this;
    }

    /**
     * Convert the menu link to an array representation.
     */
    public function toArray(): array
    {
        $data = [
            'type' => 'link',
            'title' => $this->title,
            'url' => $this->url,
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

        if ($this->target !== null) {
            $data['target'] = $this->target;
        }

        if (! empty($this->attributes)) {
            $data['attributes'] = $this->attributes;
        }

        return $data;
    }
}
