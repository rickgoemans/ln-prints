<?php

namespace App\Models;

use App\Observers\UserObserver;
use App\Support\Enums\RoleName;
use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use CausesActivity;
    use HasFactory;
    use HasRoles;
    use HasTitles;
    use LogsActivity;
    use ModelName;
    use MustVerifyEmail;
    use Notifiable;

    /** {@inheritdoc} */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /** {@inheritdoc} */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** {@inheritdoc} */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** {@inheritdoc} */
    protected static function boot(): void
    {
        parent::boot();

        self::observe(UserObserver::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->roles()
                ->where('name', RoleName::SuperAdministrators->value)
                ->count() == 1;
    }

    public function isAdmin(): bool
    {
        return $this->roles()
                ->where('name', RoleName::Administrators->value)
                ->count() == 1;
    }

    public function isMember(): bool
    {
        return $this->roles()
                ->where('name', RoleName::Members->value)
                ->count() == 1;
    }

    public function canImpersonate(): bool
    {
        return $this->isSuperAdmin();
    }

    public function canBeImpersonated(): bool
    {
        return !$this->isSuperAdmin();
    }

    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes): string => $attributes['name'],
        );
    }

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value): string => Str::startsWith($value, '$2y$')
                ? $value
                : Hash::make($value),
        );
    }
}
