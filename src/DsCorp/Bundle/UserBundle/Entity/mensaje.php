<?php

namespace DsCorp\Bundle\UserBundle\Entity;

/**
 * mensaje
 */
class mensaje
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $subjet;

    /**
     * @var string
     */
    private $body;


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
     * Set subjet
     *
     * @param string $subjet
     *
     * @return mensaje
     */
    public function setSubjet($subjet)
    {
        $this->subjet = $subjet;

        return $this;
    }

    /**
     * Get subjet
     *
     * @return string
     */
    public function getSubjet()
    {
        return $this->subjet;
    }

    /**
     * Set body
     *
     * @param string $body
     *
     * @return mensaje
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $toUser;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $atach;

    /**
     * @var \DsCorp\Bundle\UserBundle\Entity\User
     */
    private $fromUser;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->toUser = new \Doctrine\Common\Collections\ArrayCollection();
        $this->atach = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add toUser
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\User $toUser
     *
     * @return mensaje
     */
    public function addToUser(\DsCorp\Bundle\UserBundle\Entity\User $toUser)
    {
        $this->toUser[] = $toUser;

        return $this;
    }

    /**
     * Remove toUser
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\User $toUser
     */
    public function removeToUser(\DsCorp\Bundle\UserBundle\Entity\User $toUser)
    {
        $this->toUser->removeElement($toUser);
    }

    /**
     * Get toUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getToUser()
    {
        return $this->toUser;
    }

    /**
     * Add atach
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\file $atach
     *
     * @return mensaje
     */
    public function addAtach(\DsCorp\Bundle\UserBundle\Entity\file $atach)
    {
        $this->atach[] = $atach;

        return $this;
    }

    /**
     * Remove atach
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\file $atach
     */
    public function removeAtach(\DsCorp\Bundle\UserBundle\Entity\file $atach)
    {
        $this->atach->removeElement($atach);
    }

    /**
     * Get atach
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAtach()
    {
        return $this->atach;
    }

    /**
     * Set fromUser
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\User $fromUser
     *
     * @return mensaje
     */
    public function setFromUser(\DsCorp\Bundle\UserBundle\Entity\User $fromUser = null)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * Get fromUser
     *
     * @return \DsCorp\Bundle\UserBundle\Entity\User
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }
}
