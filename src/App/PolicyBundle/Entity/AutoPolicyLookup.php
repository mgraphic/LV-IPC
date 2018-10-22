<?php

namespace App\PolicyBundle\Entity;

use Doctrine\Entity\EntityException;
use Doctrine\Entity\EntityRepository;

use App\PolicyBundle\Entity\AutoPolicy;

class AutoPolicyLookup extends EntityRepository
{
    public function getPolicyByPolicyHolderId($policyHolderId)
    {
        $result = $this->fetch("
            SELECT auto_policy_id
            FROM auto_policy
            WHERE policy_holder_id = :policy_holder_id
        ", [
            ':policy_holder_id' => $policyHolderId
        ]);

        $autoPolicyId = (int) $result['auto_policy_id'];

        if ($autoPolicyId)
        {
            return new AutoPolicy($autoPolicyId);
        }

        throw new EntityException('Policy does not exist');
    }
}
