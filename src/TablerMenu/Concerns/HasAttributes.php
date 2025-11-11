<?php

namespace Abitbt\TablerBlade\TablerMenu\Concerns;

trait HasAttributes
{
    protected array $attributes = [];

    /**
     * Set HTML attributes for the menu item.
     */
    public function attributes(array $attributes): self
    {
        $this->attributes = array_merge($this->attributes, $attributes);

        return $this;
    }

    /**
     * Set a single HTML attribute.
     */
    public function attribute(string $key, mixed $value): self
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * Get all HTML attributes.
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
