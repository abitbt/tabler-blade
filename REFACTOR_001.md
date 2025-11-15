# REFACTOR_001: Code Quality Improvements

**Status:** Planned
**Date Created:** 2025-11-15
**Phase:** 3 - Code Quality
**Priority:** Medium
**Effort:** ~2-3 days

---

## Executive Summary

This document outlines code quality improvements for the tabler-blade package. These refactorings improve maintainability, security, and performance without changing functionality.

**Completed (Phase 1 - Critical):**
- ✅ Fixed broken `tabler_menu()` helper (removed non-existent class reference)
- ✅ Added `@blaze` directive registration to TablerServiceProvider
- ✅ Fixed version comparison bugs (string → semantic versioning)

**This Document (Phase 3 - Quality):**
- 🔄 Fix hard-coded paths → Move to configuration
- 🔄 Add ClassBuilder deduplication
- 🔄 Add SRI/integrity to CDN assets
- 🔄 Standardize return type declarations
- 🔄 Add comprehensive PHPDoc blocks
- 🔄 Add version validation for CDN URLs

---

## Table of Contents

1. [Fix Hard-Coded Paths](#1-fix-hard-coded-paths)
2. [Add ClassBuilder Deduplication](#2-add-classbuilder-deduplication)
3. [Add SRI/Integrity to CDN Assets](#3-add-sriintegrity-to-cdn-assets)
4. [Standardize Return Types](#4-standardize-return-types)
5. [Add PHPDoc Blocks](#5-add-phpdoc-blocks)
6. [Validate CDN Versions](#6-validate-cdn-versions)
7. [Implementation Priority](#7-implementation-priority)

---

## 1. Fix Hard-Coded Paths

### Priority: ⭐⭐⭐ High
### Effort: Medium (2-3 hours)
### Impact: High (flexibility, testability)

### Current Problem

**File:** `src/Icon.php:52-61`

Icon paths are hard-coded directly in the code:

```php
public static function getIconPath(string $name, string $variant = 'outline'): ?string
{
    // Hard-coded paths - not configurable!
    $paths = [
        resource_path("views/tabler/icons/{$variant}/{$name}.svg"),
        base_path("node_modules/@tabler/icons/icons/{$variant}/{$name}.svg"),
        base_path("tabler-blade/stubs/resources/views/tabler/icons/{$variant}/{$name}.svg"),
    ];

    foreach ($paths as $path) {
        if (File::exists($path)) {
            return $path;
        }
    }

    return null;
}
```

### Why This Is Bad

1. **Not Configurable** - Users can't customize icon locations
2. **Hard to Test** - Paths are environment-specific
3. **Limited Flexibility** - Can't add custom icon sources
4. **Maintenance Burden** - Changing paths requires code edits
5. **No Override Support** - Users can't prioritize their own icons

### Solution

Move paths to configuration with placeholder system.

#### Step 1: Add to `config/tabler.php`

```php
'icons' => [
    'cache' => true,
    'default_variant' => 'outline',
    'default_size' => null,
    'fallback_to_font' => true,

    // NEW: Configurable search paths with placeholders
    'search_paths' => [
        '{resource}/views/tabler/icons/{variant}/{name}.svg',
        '{base}/node_modules/@tabler/icons/icons/{variant}/{name}.svg',
        '{package}/stubs/resources/views/tabler/icons/{variant}/{name}.svg',
    ],

    // Placeholder definitions (for documentation)
    // {resource} = resource_path()
    // {base}     = base_path()
    // {package}  = package root directory
    // {variant}  = icon variant (outline, filled, etc)
    // {name}     = icon name
],
```

#### Step 2: Update `src/Icon.php`

```php
public static function getIconPath(string $name, string $variant = 'outline'): ?string
{
    $searchPaths = config('tabler.icons.search_paths', [
        '{resource}/views/tabler/icons/{variant}/{name}.svg',
        '{base}/node_modules/@tabler/icons/icons/{variant}/{name}.svg',
        '{package}/stubs/resources/views/tabler/icons/{variant}/{name}.svg',
    ]);

    $paths = collect($searchPaths)->map(function ($path) use ($name, $variant) {
        return str_replace(
            ['{resource}', '{base}', '{package}', '{variant}', '{name}'],
            [resource_path(), base_path(), __DIR__.'/../', $variant, $name],
            $path
        );
    });

    foreach ($paths as $path) {
        if (File::exists($path)) {
            return $path;
        }
    }

    return null;
}
```

### Benefits

✅ **Users can customize icon locations** in config
✅ **Add custom icon sources** by appending to search_paths
✅ **Better for testing** - paths can be mocked via config
✅ **Future-proof** - new icon sources just need config change
✅ **Priority control** - first path found wins

### Example Use Case

User wants to add custom company icons with priority over Tabler icons:

```php
// config/tabler.php
'icons' => [
    'search_paths' => [
        '{resource}/views/icons/custom/{variant}/{name}.svg', // Custom icons first!
        '{resource}/views/tabler/icons/{variant}/{name}.svg',
        '{base}/node_modules/@tabler/icons/icons/{variant}/{name}.svg',
    ],
],
```

Now `<tabler:icon name="company-logo" />` checks custom folder first, falls back to Tabler if not found.

### Testing

```php
// tests/Unit/IconTest.php
public function test_icon_uses_configured_search_paths()
{
    Config::set('tabler.icons.search_paths', [
        '/custom/path/{variant}/{name}.svg',
    ]);

    // Icon should search custom path
    $path = Icon::getIconPath('test', 'outline');
    $this->assertStringContains('/custom/path/', $path);
}
```

---

## 2. Add ClassBuilder Deduplication

### Priority: ⭐ Low
### Effort: Low (30 minutes)
### Impact: Low (cleaner HTML output)

### Current Problem

**File:** `src/ClassBuilder.php:24-28`

Classes can be duplicated in output:

```php
Tabler::classes()
    ->add('btn btn-primary')
    ->add('btn btn-lg')
    ->toString();

// Output: "btn btn-primary btn btn-lg"
//         ^^^ duplicated!
```

### Why This Is Bad

1. **Larger HTML output** - Duplicate classes increase file size
2. **Potential CSS conflicts** - Some frameworks don't handle duplicates well
3. **Not DRY** - Violates Don't Repeat Yourself principle
4. **Performance** - Browser parses duplicate classes unnecessarily

### Solution

Add deduplication to `__toString()` method.

#### Current Code

```php
public function __toString(): string
{
    return (string) collect($this->pending)
        ->filter(fn ($class) => $class !== '' && $class !== null)
        ->join(' ');
}
```

#### Improved Code

```php
public function __toString(): string
{
    return (string) collect($this->pending)
        ->filter(fn ($class) => $class !== '' && $class !== null)
        ->flatMap(fn ($class) => explode(' ', $class))  // Split each class string
        ->unique()                                       // Remove duplicates
        ->filter()                                       // Remove empty strings
        ->join(' ');
}
```

### How It Works

**Step-by-step transformation:**

```php
// Input
$builder->add('btn btn-primary')->add('btn btn-lg');

// 1. After filter (remove empty)
['btn btn-primary', 'btn btn-lg']

// 2. After flatMap (split into individual classes)
['btn', 'btn-primary', 'btn', 'btn-lg']

// 3. After unique (remove duplicates)
['btn', 'btn-primary', 'btn-lg']

// 4. After filter (remove empty strings from split)
['btn', 'btn-primary', 'btn-lg']

// 5. After join (final output)
'btn btn-primary btn-lg' ✓
```

### Benefits

✅ **Smaller HTML** - ~5-10% reduction in class attribute size
✅ **No CSS conflicts** - Single instance of each class
✅ **Better performance** - Browser processes less
✅ **Professional output** - Cleaner HTML

### Real-World Impact

**Before:**
```html
<button class="btn btn-primary btn btn-lg rounded rounded-full">
```

**After:**
```html
<button class="btn btn-primary btn-lg rounded rounded-full">
```

Saves ~20 bytes per component with duplicate classes.

### Edge Cases to Consider

```php
// Case 1: Empty strings
$builder->add('')->add('btn')->toString();
// Output: 'btn' ✓

// Case 2: Multiple spaces
$builder->add('btn  btn-primary')->toString();
// Output: 'btn btn-primary' ✓

// Case 3: Order preservation
$builder->add('z-10 bg-blue')->add('text-white z-10')->toString();
// Output: 'z-10 bg-blue text-white' ✓ (first occurrence kept)
```

### Testing

```php
// tests/Unit/ClassBuilderTest.php
public function test_deduplicates_classes()
{
    $builder = new ClassBuilder();
    $result = $builder
        ->add('btn btn-primary')
        ->add('btn btn-lg')
        ->toString();

    $this->assertEquals('btn btn-primary btn-lg', $result);
}

public function test_handles_empty_strings()
{
    $builder = new ClassBuilder();
    $result = $builder->add('')->add('btn')->add('')->toString();

    $this->assertEquals('btn', $result);
}
```

---

## 3. Add SRI/Integrity to CDN Assets

### Priority: ⭐⭐⭐ High
### Effort: Medium (2-3 hours)
### Impact: High (security)

### Current Problem

**File:** `src/AssetManager.php:33-65`

CDN assets loaded without integrity checks:

```php
public static function scripts(array $options = []): HtmlString
{
    $version = config('tabler.version', '1.4.0');
    $cdn = $options['cdn'] ?? config('tabler.use_cdn', true);

    if ($cdn) {
        $script = sprintf(
            '<script src="https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/js/tabler.min.js"></script>',
            $version
        );
    } else {
        $script = '<script src="'.asset('vendor/tabler/js/tabler.min.js').'"></script>';
    }

    return new HtmlString($script);
}
```

### Why This Is Bad

1. **Security Risk** - CDN could be compromised (supply chain attack)
2. **No Verification** - Can't detect if file was tampered with
3. **Best Practice Violation** - SRI is recommended for all CDN assets
4. **Compliance Issues** - Some security audits require SRI
5. **Trust Issues** - Users can't verify asset integrity

### What is SRI?

**Subresource Integrity (SRI)** is a security feature that allows browsers to verify that files fetched from CDNs haven't been tampered with.

**How it works:**
1. Browser downloads asset from CDN
2. Calculates cryptographic hash of file
3. Compares with `integrity` attribute value
4. **Only executes if hash matches** ✓

### Solution

Add Subresource Integrity (SRI) hashes to CDN assets.

#### Step 1: Add config options

```php
// config/tabler.php
'version' => '1.4.0',
'use_cdn' => true,

// NEW: CDN configuration
'cdn' => [
    'enabled' => true,
    'integrity' => true,  // Enable SRI checks
    'crossorigin' => 'anonymous',
],
```

#### Step 2: Store SRI hashes in AssetManager

```php
// src/AssetManager.php

/**
 * SRI hashes for Tabler CDN assets.
 * Generated using: curl [url] | openssl dgst -sha384 -binary | openssl base64 -A
 */
protected static array $sriHashes = [
    '1.4.0' => [
        'css' => 'sha384-...',  // Real hash from CDN (generate with script below)
        'js' => 'sha384-...',
    ],
    // Add more versions as needed
    '1.3.0' => [
        'css' => 'sha384-...',
        'js' => 'sha384-...',
    ],
];
```

#### Step 3: Update scripts() method

```php
public static function scripts(array $options = []): HtmlString
{
    $version = static::validateVersion(config('tabler.version', '1.4.0'));
    $cdn = $options['cdn'] ?? config('tabler.cdn.enabled', config('tabler.use_cdn', true));
    $integrity = config('tabler.cdn.integrity', true);

    if ($cdn) {
        $url = sprintf(
            'https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/js/tabler.min.js',
            $version
        );

        $attributes = [
            'src' => $url,
        ];

        // Add integrity and crossorigin if enabled
        if ($integrity && isset(static::$sriHashes[$version]['js'])) {
            $attributes['integrity'] = static::$sriHashes[$version]['js'];
            $attributes['crossorigin'] = config('tabler.cdn.crossorigin', 'anonymous');
        }

        $script = '<script ' . static::buildAttributes($attributes) . '></script>';
    } else {
        $script = '<script src="'.asset('vendor/tabler/js/tabler.min.js').'"></script>';
    }

    return new HtmlString($script);
}
```

#### Step 4: Update styles() method (similar changes)

```php
public static function styles(array $options = []): HtmlString
{
    $version = static::validateVersion(config('tabler.version', '1.4.0'));
    $cdn = $options['cdn'] ?? config('tabler.cdn.enabled', config('tabler.use_cdn', true));
    $integrity = config('tabler.cdn.integrity', true);

    if ($cdn) {
        $url = sprintf(
            'https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/css/tabler.min.css',
            $version
        );

        $attributes = [
            'rel' => 'stylesheet',
            'href' => $url,
        ];

        // Add integrity and crossorigin if enabled
        if ($integrity && isset(static::$sriHashes[$version]['css'])) {
            $attributes['integrity'] = static::$sriHashes[$version]['css'];
            $attributes['crossorigin'] = config('tabler.cdn.crossorigin', 'anonymous');
        }

        $style = '<link ' . static::buildAttributes($attributes) . '>';
    } else {
        $style = '<link rel="stylesheet" href="'.asset('vendor/tabler/css/tabler.min.css').'">';
    }

    return new HtmlString($style);
}
```

#### Step 5: Add helper methods

```php
/**
 * Build HTML attributes string from array.
 */
protected static function buildAttributes(array $attrs): string
{
    return collect($attrs)
        ->map(fn($value, $key) => sprintf('%s="%s"', $key, htmlspecialchars($value, ENT_QUOTES)))
        ->join(' ');
}

/**
 * Validate Tabler version format.
 *
 * @throws \InvalidArgumentException
 */
protected static function validateVersion(string $version): string
{
    if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
        throw new \InvalidArgumentException(
            "Invalid Tabler version format: {$version}. Expected format: X.Y.Z (e.g., 1.4.0)"
        );
    }

    return $version;
}
```

### Generating SRI Hashes

**Method 1: Command Line**
```bash
# For JavaScript
curl https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js | \
  openssl dgst -sha384 -binary | \
  openssl base64 -A

# For CSS
curl https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/css/tabler.min.css | \
  openssl dgst -sha384 -binary | \
  openssl base64 -A
```

**Method 2: Online Tool**
- Visit: https://www.srihash.org/
- Paste CDN URL
- Get hash instantly

**Method 3: Create Artisan Command**
```php
// src/Commands/GenerateSriCommand.php
php artisan tabler:generate-sri 1.4.0
// Outputs SRI hashes for config
```

### Example Output

**Without SRI:**
```html
<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"></script>
```

**With SRI:**
```html
<script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.4.0/dist/js/tabler.min.js"
        integrity="sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K..."
        crossorigin="anonymous"></script>
```

### Benefits

✅ **Security** - Prevents compromised CDN attacks
✅ **Integrity** - Ensures file hasn't been tampered with
✅ **Compliance** - Meets security best practices (OWASP)
✅ **Trust** - Users know assets are verified
✅ **Zero Performance Impact** - Hash check is very fast

### Configuration Options

```php
// Disable SRI if needed (not recommended)
'cdn' => [
    'integrity' => false,
],

// Use different crossorigin setting
'cdn' => [
    'crossorigin' => 'use-credentials', // or 'anonymous'
],

// Completely disable CDN
'use_cdn' => false, // Uses local assets instead
```

### Testing

```php
// tests/Unit/AssetManagerTest.php
public function test_includes_integrity_when_enabled()
{
    Config::set('tabler.cdn.integrity', true);
    Config::set('tabler.version', '1.4.0');

    $scripts = AssetManager::scripts();

    $this->assertStringContains('integrity=', $scripts);
    $this->assertStringContains('crossorigin=', $scripts);
}

public function test_skips_integrity_when_disabled()
{
    Config::set('tabler.cdn.integrity', false);

    $scripts = AssetManager::scripts();

    $this->assertStringNotContains('integrity=', $scripts);
}
```

---

## 4. Standardize Return Types

### Priority: ⭐⭐ Medium
### Effort: Low (1 hour)
### Impact: Medium (type safety)

### Current Problem

Some methods in the package are missing explicit return type declarations.

### Why This Matters

1. **Type Safety** - Prevents bugs from wrong return values
2. **IDE Support** - Better autocomplete and type hints
3. **Documentation** - Self-documenting code
4. **PHP 8.1+** - Modern PHP best practice
5. **Static Analysis** - Tools like PHPStan can catch issues

### Files to Update

**TablerManager.php**
```php
// Line 48: Missing void return type
public function disallowWireModel(ComponentAttributeBag $attributes, string $componentName)
// Should be:
public function disallowWireModel(ComponentAttributeBag $attributes, string $componentName): void
```

### Implementation Checklist

- [ ] `TablerManager::disallowWireModel()` → add `: void`
- [ ] Review all public methods for missing return types
- [ ] Review all protected methods for missing return types
- [ ] Ensure consistency across all classes

### Script to Find Missing Return Types

```bash
# Find methods without return types
grep -rn "function " src/ --include="*.php" | \
  grep -v "): " | \
  grep -v "function ()" | \
  grep -v "//"
```

---

## 5. Add PHPDoc Blocks

### Priority: ⭐⭐ Medium
### Effort: Medium (3-4 hours)
### Impact: Medium (documentation)

### Current Problem

Documentation is inconsistent across classes. Some have comprehensive docs, others have none.

### Standard PHPDoc Template

```php
/**
 * Brief one-line description of what the method/class does.
 *
 * Optional longer description providing more context and examples.
 * Can span multiple lines if needed.
 *
 * @param string $name Parameter description
 * @param array $options Optional parameter description
 * @return ClassBuilder Returns description
 * @throws \InvalidArgumentException When validation fails
 *
 * @example
 * $classes = Tabler::classes('btn')->add('btn-primary');
 */
```

### Classes to Document

1. **TablerManager** - Core manager class (highest priority)
2. **ClassBuilder** - Utility class used everywhere
3. **Icon** - Complex icon rendering logic
4. **AssetManager** - Asset loading system
5. **TablerTagCompiler** - Complex compiler logic

### Example: ClassBuilder Documentation

```php
/**
 * Fluent class builder for dynamically constructing CSS class strings.
 *
 * Provides a chainable API for building CSS classes while handling
 * empty values, null checks, and conditional classes. Automatically
 * filters out empty strings and null values.
 *
 * @package Abitbt\TablerBlade
 * @author aBit <opensource@abit.bt>
 *
 * @example
 * $classes = Tabler::classes('btn')
 *     ->add($primary ? 'btn-primary' : 'btn-secondary')
 *     ->add(['rounded', 'shadow']);
 * echo $classes; // "btn btn-primary rounded shadow"
 */
class ClassBuilder implements Stringable
{
    /**
     * Pending CSS classes to be joined.
     *
     * @var array<string>
     */
    protected array $pending = [];

    /**
     * Add one or more CSS classes to the builder.
     *
     * Accepts strings, arrays, or null. Null values are filtered out
     * automatically. Array values are converted to class strings using
     * Laravel's Arr::toCssClasses() helper.
     *
     * @param string|array|null $classes CSS classes to add
     * @return self Fluent interface for chaining
     *
     * @example
     * $builder->add('btn btn-primary')
     *     ->add(['rounded' => true, 'shadow' => false])
     *     ->add($active ? 'active' : null);
     */
    public function add(string|array|null $classes): self
    {
        // ...
    }

    /**
     * Convert the builder to a CSS class string.
     *
     * Joins all pending classes with spaces, filtering out empty
     * strings and null values.
     *
     * @return string Space-separated CSS classes
     */
    public function __toString(): string
    {
        // ...
    }
}
```

---

## 6. Validate CDN Versions

### Priority: ⭐⭐ Medium
### Effort: Low (30 minutes)
### Impact: Medium (security)

### Current Problem

No validation of version strings in config, which could lead to:
1. XSS vulnerabilities in CDN URLs
2. Broken asset loading
3. Unclear error messages

### Solution

Add version validation to AssetManager.

```php
/**
 * Validate Tabler version format.
 *
 * Ensures version follows semantic versioning (X.Y.Z) to prevent
 * XSS attacks and malformed CDN URLs.
 *
 * @param string $version Version to validate (e.g., "1.4.0")
 * @return string Validated version
 * @throws \InvalidArgumentException If version format is invalid
 */
protected static function validateVersion(string $version): string
{
    // Check for semantic versioning format: X.Y.Z
    if (!preg_match('/^\d+\.\d+\.\d+$/', $version)) {
        throw new \InvalidArgumentException(
            "Invalid Tabler version format: {$version}. " .
            "Expected semantic versioning format: X.Y.Z (e.g., 1.4.0)"
        );
    }

    return $version;
}
```

### Usage

```php
public static function scripts(array $options = []): HtmlString
{
    // Validate version before using in URL
    $version = static::validateVersion(config('tabler.version', '1.4.0'));

    $url = sprintf(
        'https://cdn.jsdelivr.net/npm/@tabler/core@%s/dist/js/tabler.min.js',
        $version
    );

    // ...
}
```

### Benefits

✅ **Security** - Prevents XSS via malicious version strings
✅ **Early Error Detection** - Catches config errors on load
✅ **Clear Errors** - Helpful error messages
✅ **Validation** - Ensures version exists on CDN

### Example Error

**Bad Config:**
```php
'version' => '1.4.0<script>alert("xss")</script>',
```

**Error Message:**
```
InvalidArgumentException: Invalid Tabler version format: 1.4.0<script>alert("xss")</script>.
Expected semantic versioning format: X.Y.Z (e.g., 1.4.0)
```

---

## 7. Implementation Priority

### Recommended Order

| Priority | Item | Effort | Impact | Time |
|----------|------|--------|--------|------|
| **1** | Fix hard-coded paths | Medium | High | 2-3h |
| **2** | Add SRI/integrity | Medium | High | 2-3h |
| **3** | Validate CDN versions | Low | Medium | 30m |
| **4** | Standardize return types | Low | Medium | 1h |
| **5** | Add ClassBuilder dedup | Low | Low | 30m |
| **6** | Add PHPDoc blocks | Medium | Medium | 3-4h |

**Total Estimated Time:** ~10-12 hours (1.5-2 days)

### Phase Breakdown

**Day 1 Morning (4 hours)**
- ✓ Item 1: Fix hard-coded paths
- ✓ Item 2: Add SRI/integrity (start)

**Day 1 Afternoon (4 hours)**
- ✓ Item 2: Add SRI/integrity (finish)
- ✓ Item 3: Validate CDN versions
- ✓ Item 4: Standardize return types

**Day 2 Morning (4 hours)**
- ✓ Item 5: Add ClassBuilder dedup
- ✓ Item 6: Add PHPDoc blocks

---

## Testing Strategy

### Unit Tests Required

1. **IconTest.php**
   - `test_uses_configured_search_paths()`
   - `test_falls_back_to_default_paths()`
   - `test_custom_paths_have_priority()`

2. **ClassBuilderTest.php**
   - `test_deduplicates_classes()`
   - `test_handles_empty_strings()`
   - `test_preserves_order()`

3. **AssetManagerTest.php**
   - `test_includes_integrity_when_enabled()`
   - `test_skips_integrity_when_disabled()`
   - `test_validates_version_format()`
   - `test_throws_on_invalid_version()`

### Integration Tests

1. Test full asset loading with SRI
2. Test icon loading from custom paths
3. Test ClassBuilder in real components

---

## Backward Compatibility

All changes maintain **100% backward compatibility**:

✅ **Config Changes** - All new config keys have defaults
✅ **Method Signatures** - No breaking changes to public API
✅ **Return Types** - Added but not changed
✅ **Behavior** - Existing functionality unchanged

Users can upgrade without code changes.

---

## Documentation Updates

After implementation, update:

1. **README.md** - Add SRI documentation
2. **config/tabler.php** - Add inline comments
3. **CHANGELOG.md** - Document all changes
4. **docs/** - Create if not exists

---

## Success Criteria

This refactoring is complete when:

- [ ] All hard-coded paths moved to config
- [ ] SRI hashes added for Tabler 1.4.0
- [ ] Version validation implemented
- [ ] Return types added to all methods
- [ ] ClassBuilder deduplicates classes
- [ ] PHPDoc blocks added to all classes
- [ ] Tests written and passing
- [ ] Documentation updated
- [ ] No breaking changes
- [ ] Code reviewed

---

## Notes

- Keep changes focused and atomic (one PR per item)
- Maintain 100% backward compatibility
- Write tests before implementation
- Update docs immediately after code changes
- Use semantic commit messages

---

**Last Updated:** 2025-11-15
**Status:** Planned → Ready for Implementation
