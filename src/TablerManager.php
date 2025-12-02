<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Str;
use Illuminate\View\ComponentAttributeBag;

class TablerManager
{
    public bool $hasRenderedAssets = false;

    public function boot(): void
    {
        // Hook into Livewire if available
        if (class_exists(\Livewire\Livewire::class)) {
            \Livewire\on('flush-state', function () {
                $this->hasRenderedAssets = false;
            });
        }
    }

    public function markAssetsRendered(): void
    {
        $this->hasRenderedAssets = true;
    }

    public function scripts(array $options = []): string
    {
        $this->markAssetsRendered();

        return AssetManager::scripts($options);
    }

    public function styles(array $options = []): string
    {
        $this->markAssetsRendered();

        return AssetManager::styles($options);
    }

    public function classes(string|array|null $styles = null): ClassBuilder
    {
        $builder = new ClassBuilder;

        return $styles ? $builder->add($styles) : $builder;
    }

    public function disallowWireModel(ComponentAttributeBag $attributes, string $componentName): void
    {
        if ($attributes->whereStartsWith('wire:')->isNotEmpty()) {
            throw new \Exception('Cannot use wire:model on <'.$componentName.'>');
        }
    }

    public function splitAttributes(ComponentAttributeBag $attributes, array $by = ['class', 'style'], bool $strict = false): array
    {
        return [
            $strict ? $attributes->only($by) : $attributes->whereStartsWith($by),
            $strict ? $attributes->except($by) : $attributes->whereDoesntStartWith($by),
        ];
    }

    public function forwardedAttributes(ComponentAttributeBag $attributes, array $propKeys): array
    {
        $props = [];

        $unescape = fn ($value) => is_string($value) ? htmlspecialchars_decode($value, ENT_QUOTES) : $value;

        foreach ($propKeys as $key) {
            // Because Blade automatically escapes all "attributes" (not "props"), it errantly escaped these values.
            // Therefore, we have to apply an "unescape" operation (htmlspecialchars_decode) to rectify that...
            if (isset($attributes[$key])) {
                $props[$key] = $unescape($attributes[$key]);
            }
            // If a kebab-cased prop is present, we need to convert it to camelCase so that @props() picks it up...
            elseif (isset($attributes[Str::kebab($key)])) {
                $props[$key] = $unescape($attributes[Str::kebab($key)]);
            }
        }

        return $props;
    }

    public function attributesAfter(string $prefix, ComponentAttributeBag $attributes, array $default = []): ComponentAttributeBag
    {
        $newAttributes = new ComponentAttributeBag($default);
        $keysToRemove = [];

        foreach ($attributes->getAttributes() as $key => $value) {
            if (str_starts_with($key, $prefix)) {
                $newAttributes[substr($key, strlen($prefix))] = $value;
                $keysToRemove[] = $key;
            }
        }

        // Remove the transferred attributes from the original bag
        foreach ($keysToRemove as $key) {
            unset($attributes[$key]);
        }

        return $newAttributes;
    }

    public function applyInset(string|bool|null $inset, string $top, string $right, string $bottom, string $left): string
    {
        if ($inset === null) {
            return '';
        }

        $insets = $inset === true
            ? collect(['top', 'right', 'bottom', 'left'])
            : str($inset)->explode(' ')->map(fn ($i) => trim($i));

        $insetClasses = [
            'top' => $top,
            'right' => $right,
            'bottom' => $bottom,
            'left' => $left,
        ];

        return $insets->map(fn ($i) => $insetClasses[$i])->join(' ');
    }

    public function componentExists(string $name): bool
    {
        // Laravel 12+ uses xxh128 hashing for views
        if (version_compare(app()->version(), '12.0', '>=')) {
            return app('view')->exists(hash('xxh128', 'tabler').'::'.$name);
        }

        return app('view')->exists(md5('tabler').'::'.$name);
    }
}
