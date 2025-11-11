<?php

namespace Abitbt\TablerBlade\TablerMenu\Concerns;

use Closure;
use Illuminate\Support\Facades\Gate;

trait Authorizable
{
    protected ?string $canAbility = null;

    protected mixed $canArguments = [];

    protected ?array $canAnyAbilities = null;

    protected mixed $canAnyArguments = [];

    protected ?Closure $authorizeCallback = null;

    /**
     * Require a specific permission/ability to view this menu item.
     */
    public function can(string $ability, mixed $arguments = []): self
    {
        $this->canAbility = $ability;
        $this->canArguments = $arguments;

        return $this;
    }

    /**
     * Require any of the specified permissions/abilities to view this menu item.
     */
    public function canAny(array $abilities, mixed $arguments = []): self
    {
        $this->canAnyAbilities = $abilities;
        $this->canAnyArguments = $arguments;

        return $this;
    }

    /**
     * Use a custom authorization callback.
     */
    public function authorize(Closure $callback): self
    {
        $this->authorizeCallback = $callback;

        return $this;
    }

    /**
     * Check if the user is authorized to see this menu item.
     */
    protected function isAuthorized(): bool
    {
        // Custom authorization callback
        if ($this->authorizeCallback !== null) {
            return call_user_func($this->authorizeCallback, auth()->user());
        }

        // Check specific ability
        if ($this->canAbility !== null) {
            return Gate::allows($this->canAbility, $this->canArguments);
        }

        // Check any of the abilities
        if ($this->canAnyAbilities !== null) {
            return Gate::any($this->canAnyAbilities, $this->canAnyArguments);
        }

        // No authorization required
        return true;
    }
}
