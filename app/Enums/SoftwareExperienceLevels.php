<?php


namespace App\Enums;

use app\Http\Traits\ConstantExport;

/**
 * Author: Farai Zihove
 * Mobile: +263778234258
 * Email: farai@flickerleap.com
 * Date: 1/6/2023
 * Time: 08:14
 */
class SoftwareExperienceLevels extends Enum
{
    const BEGINNER = 'Beginner';
    const ADVANCED = 'Advanced';
    const EXPERT = 'Expert';
    const INTERMEDIATE = 'Intermediate';
    use ConstantExport;
}
