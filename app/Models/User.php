<?php

namespace App\Models;

use App\Observers\UserObserver;
use App\Support\Enums\RoleName;
use App\Support\Traits\HasTitles;
use App\Support\Traits\LogsActivity;
use App\Support\Traits\ModelName;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * @package App\Models
 * @author Rick Goemans <rickgoemans@gmail.com>
 */
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

    /**
     * @inheritdoc
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * @inheritdoc
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @inheritdoc
     */
    protected $dates = [
        'email_verified_at',
    ];

    /**
     * @inheritdoc
     */
    protected static function boot()
    {
        parent::boot();

        self::observe(UserObserver::class);
    }

    /* ACCESSORS & MUTATORS */
    public function getTitleAttribute(): ?string
    {
        return $this->name;
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Str::startsWith($value, '$2y$') ? $value : Hash::make($value);
    }

    /* RELATIONS */
    public function isSuperAdmin(): bool
    {
        return $this->roles()
                ->where('name', RoleName::SUPER_ADMINISTRATORS)
                ->count() == 1;
    }

    public function isAdmin(): bool
    {
        return $this->roles()
                ->where('name', RoleName::ADMINISTRATORS)
                ->count() == 1;
    }

    public function isMember(): bool
    {
        return $this->roles()
                ->where('name', RoleName::MEMBERS)
                ->count() == 1;
    }

    /* IMPERSONATE */
    public function canImpersonate(): bool
    {
        return $this->isSuperAdmin();
    }

    public function canBeImpersonated(): bool
    {
        return !$this->isSuperAdmin();
    }
}
