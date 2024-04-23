<?php

declare(strict_types=1);

namespace App\Enums\Job;

enum Status: int
{
    case PENDING = 1;
    case PUBLISHED = 2;
    case ARCHIVED = 3;
    case REJECTED = 4;

}
