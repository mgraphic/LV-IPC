<?php

namespace App\CommonBundle\Entity;

use Doctrine\Entity\EntityException;
use Doctrine\Entity\EntityRepository;

use App\CommonBundle\Entity\User;

class UserLookup extends EntityRepository
{
    public function getUserByEmail($email)
    {
        $result = $this->fetch("
            SELECT user_id
            FROM user
            WHERE email LIKE :email
        ", [
            ':email' => $email
        ]);

        $userId = (int) $result['user_id'];

        if ($userId)
        {
            return new User($userId);
        }

        throw new EntityException('User does not exist');
    }
}
