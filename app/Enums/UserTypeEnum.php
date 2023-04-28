<?php


namespace App\Enums;

use App\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: 263778234258
 * Email: zihovem@gmail.com
 * Date: 4/4/2022
 * Time: 19:06
 */
class UserTypeEnum extends Enum
{
    const SUPER_ADMIN = 'SuperAdmin';
    const ADMIN = 'Admin';
    const USER = 'User';
    const CLIENT = 'Client';
    const REPORTING = 'Reporting';
    use ConstantExport;
}
