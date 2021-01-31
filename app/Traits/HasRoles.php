<?php
Namespace App\Traits;

trait HasRoles
{
    static $ROLES = ['member-region', 'member-manager', 'premi-admin', 'premi-manager'];

    public function allow (...$roles)
    {
        $hasRoles = collect($this->ability['roles'] ?? []);

        if ($hasRoles->contains('*')) return true;
        if ($hasRoles->intersect($roles)->count()) return true;

        return false;
    }

    public function allowRegion ($role, $region)
    {
        $hasRoles = collect($this->ability['roles'] ?? []);
        $hasRegions = collect($this->ability['regions'] ?? []);

        if ($hasRoles->contains('*')) return true;

        if ($hasRoles->contains('member-manager') && $role == "member-region") return true;

        if ($hasRoles->contains('member-region') && $hasRegions->intersect([$region->id])->count()) return true;

        return false;
    }

    protected static function bootHasRoles() {
        static::creating(function ($user) {
            if ($user->ability === null) {
                $user->ability = [
                    'roles' => [],
                    'regions' => [],
                ];
            }
        });
    }
}
