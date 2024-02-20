<?php

namespace App\Support\Enums;

use App\Support\Traits\SelectableEnum;

class RoleName
{
    use SelectableEnum;

    const SUPER_ADMINISTRATORS = 'Super Administrators';
    const ADMINISTRATORS = 'Administrators';
    const MEMBERS = 'Members';
}
