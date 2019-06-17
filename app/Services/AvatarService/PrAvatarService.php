<?php

namespace App\Services\AvatarService;

class PrAvatarService implements AvatarServiceInterface
{
    /**
     * {@inheritdoc}
     */
    public function getAvatarUrl(string $email): string
    {
        return 'https://i.pravatar.cc/256?u=' . md5($email);
    }
}
