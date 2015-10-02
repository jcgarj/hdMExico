<?php

namespace DsCorp\Bundle\UserBundle\Entity;

/**
 * perfil
 */
class perfil
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $firtsName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $telephone;


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
     * Set name
     *
     * @param string $name
     *
     * @return perfil
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set firtsName
     *
     * @param string $firtsName
     *
     * @return perfil
     */
    public function setFirtsName($firtsName)
    {
        $this->firtsName = $firtsName;

        return $this;
    }

    /**
     * Get firtsName
     *
     * @return string
     */
    public function getFirtsName()
    {
        return $this->firtsName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return perfil
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
     * Set email
     *
     * @param string $email
     *
     * @return perfil
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
     * Set telephone
     *
     * @param string $telephone
     *
     * @return perfil
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }
    /**
     * @var \DsCorp\Bundle\UserBundle\Entity\file
     */
    private $file;


    /**
     * Set file
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\file $file
     *
     * @return perfil
     */
    public function setFile(\DsCorp\Bundle\UserBundle\Entity\file $file = null)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return \DsCorp\Bundle\UserBundle\Entity\file
     */
    public function getFile()
    {
        return $this->file;
    }
}
