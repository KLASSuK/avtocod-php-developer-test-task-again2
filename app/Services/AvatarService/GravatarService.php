<?php

namespace App\Services\AvatarService;

class GravatarService implements AvatarServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getAvatarUrl(string $email): string
    {
        return 'https://www.gravatar.com/avatar/' . md5(\mb_strtolower($email));
    }
}
