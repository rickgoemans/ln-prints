<?php

namespace App\Support\Enums;

enum RoleName: string
{
    case SuperAdministrators = 'Super Administrators';
    case Administrators = 'Administrators';
    case Members = 'Members';
}
