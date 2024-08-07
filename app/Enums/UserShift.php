<?php
declare(strict_types=1);
namespace App\Enums;

enum UserShift: int
{
    use EnumToArray;

    case day = 1;
    case evening = 2;
}
