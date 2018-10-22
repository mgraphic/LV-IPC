<?php

namespace App\PolicyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\CommonBundle\Entity\User;
use App\PolicyBundle\Entity\AutoPolicyLookup;
use App\PolicyBundle\Entity\HealthPolicyLookup;

/**
 * @ORM\Table(name="policy_holder")
 */
class PolicyHolder
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="policy_holder_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="policy_holder_id", initialValue=1000001, allocationSize=1)
     */
    private $policyHolderId;

    /**
     * @var string
     *
     * @ORM\Column(name="policy_number", type="string", length=255, nullable=false)
     */
    private $policyNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="policy_type", type="string", length=50, nullable=false)
     */
    private $policyType;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="string", length=50, nullable=false)
     */
    private $ownerId;

    /**
     * @var float
     *
     * @ORM\Column(name="premium", type="decimal", length="3,2", nullable=true)
     */
    private $premium;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dob", type="date", nullable=false)
     */
    private $dob;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_opened", type="datetime", nullable=false)
     */
    private $dateOpened;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expire", type="datetime", nullable=false)
     */
    private $dateExpire;

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
     * Set policyNumber
     *
     * @param string $policyNumber
     * @return PolicyHolder
     */
    public function setPolicyNumber($policyNumber)
    {
        $this->policyNumber = $policyNumber;
    
        return $this;
    }

    /**
     * Get policyNumber
     *
     * @return string 
     */
    public function getPolicyNumber()
    {
        return $this->policyNumber;
    }

    /**
     * Set policyType
     *
     * @param string $policyType
     * @return PolicyHolder
     */
    public function setPolicyType($policyType)
    {
        $this->policyType = $policyType;
    
        return $this;
    }

    /**
     * Get policyType
     *
     * @return string 
     */
    public function getPolicyType()
    {
        return $this->policyType;
    }

    /**
     * Get policy details object
     * 
     * @return mixed
     */
    public function getDetails()
    {
        switch ($this->getPolicyType())
        {
            case 'auto':
                return $this->getAutoPolicyLookup()->getPolicyByPolicyHolderId($this->policyHolderId);

            case 'health':
                return $this->getHealthPolicyLookup()->getPolicyByPolicyHolderId($this->policyHolderId);
        }
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return PolicyHolder
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;
    
        return $this;
    }

    /**
     * Get ownerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Get owner as an User object
     * 
     * @return User
     */
    public function getOwner()
    {
        new User($this->getOwnerId());
    }

    /**
     * Set premium
     *
     * @param float $premium
     * @return PolicyHolder
     */
    public function setPremium($premium)
    {
        $this->premium = $premium;
    
        return $this;
    }

    /**
     * Get premium
     *
     * @return float 
     */
    public function getPremium()
    {
        return $this->premium;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return PolicyHolder
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    
        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return PolicyHolder
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    
        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get Full Name
     * 
     * @return string
     */
    public function getName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Set dob
     * 
     * @param \DateTime $dob
     * @return PolicyHolder
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }

    /**
     * Get dob
     * 
     * @return \DateTime
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set dateOpened
     * 
     * @param \DateTime $dateOpened
     * @return PolicyHolder
     */
    public function setDateOpened($dateOpened)
    {
        $this->dateOpened = $dateOpened;

        return $this;
    }

    /**
     * Get dateOpened
     * 
     * @return \DateTime
     */
    public function getDateOpened()
    {
        return $this->dateOpened;
    }

    /**
     * Set dateExpire
     * 
     * @param \DateTime $dateExpire
     * @return PolicyHolder
     */
    public function setDateExpire($dateExpire)
    {
        $this->dateExpire = $dateExpire;

        return $this;
    }

    /**
     * Get dateExpire
     * 
     * @return \DateTime
     */
    public function getDateExpire()
    {
        return $this->dateExpire;
    }

    protected function getAutoPolicyLookup()
    {
        return new AutoPolicyLookup;
    }

    protected function getHealthPolicyLookup()
    {
        return new HealthPolicyLookup;
    }
}
