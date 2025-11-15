<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Arr;
use Stringable;

class ClassBuilder implements Stringable
{
    protected array $pending = [];

    public function add(string|array|null $classes): self
    {
        if ($classes === null) {
            return $this;
        }

        $this->pending[] = Arr::toCssClasses($classes);

        return $this;
    }

    public function __toString(): string
    {
        return (string) collect($this->pending)
            ->filter(fn ($class) => $class !== '' && $class !== null)
            ->join(' ');
    }
}
