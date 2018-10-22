<?php

namespace App\PolicyBundle\Entity;

use Doctrine\Entity\EntityException;
use Doctrine\Entity\EntityRepository;

use App\PolicyBundle\Entity\PolicyHolder;

class PolicyHolderLookup extends EntityRepository
{
    public function getSearchByKeyword($keyword, $userId = null)
    {
        $sql = "
            SELECT policy_holder_id
            FROM policy_holder
            WHERE
                (
                    policy_number = :keyword OR
                    last_name = :keyword
                )
        ";

        $params = [
            ':keyword' => $keyword
        ];

        if (isset($userId))
        {
            $sql .= "AND owner_id = :user_id";
            $params[':user_id'] = $userId;
        }

        $results = $this->fetchAll($sql, $params);
        $policies = [];

        foreach ($resuls as $result)
        {
            $policies[] = new PolicyHolder((int) $result['policy_holder_id']);
        }

        return $policies;
    }

    public function getPoliciesByUser($userId)
    {
        $results = $this->fetchAll("
            SELECT policy_holder_id
            FROM policy_holder
            WHERE owner_id = :user_id
        ", [
            ':user_id' => $userId
        ]);

        $policies = [];

        foreach ($resuls as $result)
        {
            $policies[] = new PolicyHolder((int) $result['policy_holder_id']);
        }

        return $policies;
    }

    public function getPolicyByNumber($policyNumber, $userId = null)
    {
        $sql = "
            SELECT policy_holder_id
            FROM policy_holder
            WHERE policy_number = :policy_number
        ";

        $params = [
            ':policy_number' => $policyNumber
        ];

        if (isset($userId))
        {
            $sql .= "AND owner_id = :user_id";
            $params[':user_id'] = $userId;
        }

        $result = $this->fetch($sql, $params);
        $policyHolderId = (int) $result['policy_holder_id'];

        if ($policyHolderId)
        {
            return new PolicyHolder($policyHolderId);
        }

        throw new EntityException('Policy does not exist');
    }
}
