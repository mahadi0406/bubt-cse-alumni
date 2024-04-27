<?php

declare(strict_types=1);

namespace App\Enums\Job;

use App\Enums\EnumToArray;

enum Type: int
{
    use EnumToArray;
    case FULL_TIME = 1;
    case PART_TIME = 2;
    case CONTRACT = 3;
    case TEMPORARY = 4;
}
