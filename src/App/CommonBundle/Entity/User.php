<?php

namespace App\CommonBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use App\CommonBundle\Model\Roles;

/**
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @var boolean
     */
    private $isAuthenticated = false;

    /**
     * @var integer
     * 
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="user_id", initialValue=1000001, allocationSize=1)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password_hash", type="string", length=255, nullable=false)
     */
    private $passwordHash;

    /**
     * @var integer
     *
     * @ORM\Column(name="roles", type="string", length=50, nullable=false)
     */
    private $roles;

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
     * Is admin role
     * 
     * @return boolean
     */
    public function isAdmin()
    {
        return ($this->userEntity->getRoles() & Roles::ADMIN_USER);
    }

    /**
     * Is customer role
     * 
     * @return boolean
     */
    public function isCustomer()
    {
        return ($this->userEntity->getRoles() & Roles::CUSTOMER_USER);
    }

    /**
     * Authenticate user password
     * 
     * @param string $plainTextPassword
     * @return boolean
     */
    public function login($plainTextPassword)
    {
        // Typically would implement a more secure salt/hash algorithm in a production environment
        $this->isAuthenticated = (sha1($plainTextPassword) === $this->getPasswordHash());

        return $this->isAuthenticated();
    }

    /**
     * Is authenticated
     * 
     * @return boolean
     */
    public function isAuthenticated()
    {
        return $this->isAuthenticated;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set passwordHash
     *
     * @param string $passwordHash
     * @return User
     */
    public function setPasswordHash($email)
    {
        $this->passwordHash = $passwordHash;
    
        return $this;
    }

    /**
     * Get passwordHash
     *
     * @return string 
     */
    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    /**
     * Set roles
     *
     * @param integer $roles
     * @return User
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;
    
        return $this;
    }

    /**
     * Get roles
     *
     * @return integer 
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
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
     * @return User
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
}
