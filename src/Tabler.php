<?php

namespace Abitbt\TablerBlade;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Abitbt\TablerBlade\ClassBuilder classes(string|array|null $styles = null)
 * @method static void disallowWireModel(\Illuminate\View\ComponentAttributeBag $attributes, string $componentName)
 * @method static array splitAttributes(\Illuminate\View\ComponentAttributeBag $attributes, array $by = ['class', 'style'], bool $strict = false)
 * @method static array forwardedAttributes(\Illuminate\View\ComponentAttributeBag $attributes, array $propKeys)
 * @method static \Illuminate\View\ComponentAttributeBag attributesAfter(string $prefix, \Illuminate\View\ComponentAttributeBag $attributes, array $default = [])
 * @method static string applyInset(string|bool|null $inset, string $top, string $right, string $bottom, string $left)
 * @method static bool componentExists(string $name)
 * @method static string scripts(array $options = [])
 * @method static string styles(array $options = [])
 * @method static void markAssetsRendered()
 *
 * @see \Abitbt\TablerBlade\TablerManager
 */
class Tabler extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'tabler';
    }
}
