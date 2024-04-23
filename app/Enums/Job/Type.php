<?php

declare(strict_types=1);

namespace App\Enums\Job;

enum Type: int
{
    case FULL_TIME = 1;
    case PART_TIME = 2;
    case CONTRACT = 3;
    case TEMPORARY = 4;
}
