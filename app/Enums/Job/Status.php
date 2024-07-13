<?php

declare(strict_types=1);

namespace App\Enums\Job;

enum Status: int
{
    case PENDING = 1;
    case PUBLISHED = 2;
    case ARCHIVED = 3;
    case REJECTED = 4;

    public static function getName(int $status): string
    {
        return match ($status) {
            self::PENDING->value => 'Pending',
            self::PUBLISHED->value => 'Published',
            self::ARCHIVED->value => 'Archived',
            self::REJECTED->value => 'Rejected',
            default => 'Default'
        };
    }

}
