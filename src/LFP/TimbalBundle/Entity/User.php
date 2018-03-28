<?php
// src//LFP/TimbalBundle/Entity/User

namespace LFP\TimbalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="timbal_user")
 * @ORM\Entity(repositoryClass="LFP\TimbalBundle\Repository\UserRepository")
 */
 class User
 {
     /**
      * @ORM\Column(name="id", type="integer")
      * @ORM\Id
      * @ORM\GeneratedValue(strategy="AUTO")
      */
     private $id;

     /**
      * @ORM\Column(name="email", type="string", length=63, nullable=true)
      */
     private $email;

     /**
      * @ORM\Column(name="password", type="string", length=25, nullable=true)
      */
     private $password;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set email
     *
     * @param string $email
     *
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
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }
}
