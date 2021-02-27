<?php
Namespace App\Traits;

trait HasRoles
{
    static $ROLES = ['member-region', 'member-manager', 'finance-user', 'finance-manager', 'premi-user', 'premi-manager'];

    public function allow (...$roles)
    {
        $hasRoles = collect($this->ability ?? []);

        if ($hasRoles->contains('*')) return true;
        if ($hasRoles->intersect($roles)->count()) return true;

        return false;
    }

    protected static function bootHasRoles() {
        static::creating(function ($user) {
            if ($user->ability === null) {
                $user->ability = [];
            }
        });
    }
}
