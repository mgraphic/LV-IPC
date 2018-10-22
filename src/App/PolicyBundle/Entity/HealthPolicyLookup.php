<?php

namespace App\PolicyBundle\Entity;

use Doctrine\Entity\EntityException;
use Doctrine\Entity\EntityRepository;

use App\PolicyBundle\Entity\HealthPolicy;

class HealthPolicyLookup extends EntityRepository
{
    public function getPolicyByPolicyHolderId($policyHolderId)
    {
        $result = $this->fetch("
            SELECT health_policy_id
            FROM health_policy
            WHERE policy_holder_id = :policy_holder_id
        ", [
            ':policy_holder_id' => $policyHolderId
        ]);

        $healthPolicyId = (int) $result['health_policy_id'];

        if ($healthPolicyId)
        {
            return new HealthPolicy($healthPolicyId);
        }

        throw new EntityException('Policy does not exist');
    }
}
