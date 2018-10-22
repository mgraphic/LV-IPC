<?php

namespace App\PolicyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\CommonBundle\Entity\User;

/**
 * @ORM\Table(name="health_policy")
 */
class HealthPolicy
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="health_policy_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="policy_holder_id", initialValue=1000001, allocationSize=1)
     */
    private $healthPolicyId;

    /**
     * @var integer
     * 
     * @ORM\Column(name="policy_holder_id", type="integer", nullable=false)
     */
    private $policyHolderId;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var deductable
     *
     * @ORM\Column(name="deductable", type="decimal", length="4,2", nullable=true)
     */
    private $deductable;

    /**
     * Get healthPolicyId
     *
     * @return integer 
     */
    public function getHealthPolicyId()
    {
        return $this->healthPolicyId;
    }

    /**
     * Set policyHolderId
     *
     * @param integer $policyHolderId
     * @return HealthPolicy
     */
    public function setPolicyHolderId($policyHolderId)
    {
        $this->policyHolderId = $policyHolderId;

        return $this;
    }
    
    /**
     * Get policyHolderId
     *
     * @return integer 
     */
    public function getPolicyHolderId()
    {
        return $this->policyHolderId;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return HealthPolicy
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set deductable
     *
     * @param integer $deductable
     * @return HealthPolicy
     */
    public function setDeductable($deductable)
    {
        $this->deductable = $deductable;
    
        return $this;
    }

    /**
     * Get deductable
     *
     * @return integer 
     */
    public function getDeductable()
    {
        return $this->deductable;
    }
}
