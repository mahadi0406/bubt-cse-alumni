<?php

namespace App\Services;

use App\Enums\ContentType;

class ContentService
{
    public function getContent(ContentType $contentType, array $placeholders = []): ?string
    {
        $content = match ($contentType->value) {
            ContentType::JOB_APPLY->value => 'Demo data :amount',
            default => null,
        };

        foreach ($placeholders as $key => $value) {
            $content = str_replace(":$key", $value, $content);
        }

        return $content;
    }

}
