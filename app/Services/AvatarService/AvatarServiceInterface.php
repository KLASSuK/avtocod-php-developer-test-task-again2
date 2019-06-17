<?php

namespace App\Services\AvatarService;

interface AvatarServiceInterface
{
    /**
     * Get avatar URL for passed email address.
     *
     * @param string $email
     *
     * @return string
     */
    public function getAvatarUrl(string $email): string;
}
