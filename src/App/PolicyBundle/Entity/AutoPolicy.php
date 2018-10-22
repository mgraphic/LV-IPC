<?php

namespace App\PolicyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\CommonBundle\Entity\User;

/**
 * @ORM\Table(name="auto_policy")
 */
class AutoPolicy
{
    /**
     * @var integer
     * 
     * @ORM\Column(name="auto_policy_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="policy_holder_id", initialValue=1000001, allocationSize=1)
     */
    private $autoPolicyId;

    /**
     * @var integer
     * 
     * @ORM\Column(name="policy_holder_id", type="integer", nullable=false)
     */
    private $policyHolderId;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_type", type="string", length=50, nullable=false)
     */
    private $vehicleType;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_make", type="string", length=50, nullable=false)
     */
    private $vehicleMake;

    /**
     * @var string
     *
     * @ORM\Column(name="vehicle_model", type="string", length=50, nullable=false)
     */
    private $vehicleModel;

    /**
     * @var integer
     *
     * @ORM\Column(name="vehicle_year", type="integer", length=4, nullable=true)
     */
    private $vehicleYear;

    /**
     * @var string
     *
     * @ORM\Column(name="vin", type="string", length=50, nullable=true)
     */
    private $vin;

    /**
     * Get autoPolicyId
     *
     * @return integer 
     */
    public function getAutoPolicyId()
    {
        return $this->autoPolicyId;
    }

    /**
     * Set policyHolderId
     *
     * @param integer $policyHolderId
     * @return AutoPolicy
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
     * Set vehicleType
     *
     * @param string $vehicleType
     * @return AutoPolicy
     */
    public function setVehicleType($vehicleType)
    {
        $this->vehicleType = $vehicleType;
    
        return $this;
    }

    /**
     * Get vehicleType
     *
     * @return string 
     */
    public function getVehicleType()
    {
        return $this->vehicleType;
    }

    /**
     * Set vehicleMake
     *
     * @param string $vehicleMake
     * @return AutoPolicy
     */
    public function setVehicleMake($vehicleMake)
    {
        $this->vehicleMake = $vehicleMake;
    
        return $this;
    }

    /**
     * Get vehicleMake
     *
     * @return string 
     */
    public function getVehicleMake()
    {
        return $this->vehicleMake;
    }

    /**
     * Set vehicleModel
     *
     * @param string $vehicleModel
     * @return AutoPolicy
     */
    public function setVehicleModel($vehicleModel)
    {
        $this->vehicleModel = $vehicleModel;
    
        return $this;
    }

    /**
     * Get vehicleModel
     *
     * @return string 
     */
    public function getVehicleModel()
    {
        return $this->vehicleModel;
    }

    /**
     * Set vehicleYear
     *
     * @param integer $vehicleYear
     * @return AutoPolicy
     */
    public function setVehicleYear($vehicleYear)
    {
        $this->vehicleYear = $vehicleYear;
    
        return $this;
    }

    /**
     * Get vehicleYear
     *
     * @return integer 
     */
    public function getVehicleYear()
    {
        return $this->vehicleYear;
    }

    /**
     * Set vin
     *
     * @param string $vin
     * @return AutoPolicy
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
    
        return $this;
    }

    /**
     * Get vin
     *
     * @return string 
     */
    public function getVin()
    {
        return $this->vin;
    }
}
