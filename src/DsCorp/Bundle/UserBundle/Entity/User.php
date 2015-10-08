<?php

namespace DsCorp\Bundle\UserBundle\Entity;
use Symfony\Component\Security\Core\User\UserInterface;
/**
 * User
 */
class User implements UserInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $userName;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $salt;

    /**
     * @var \DateTime
     */
    private $dateCreate;

    /**
     * @var \DateTime
     */
    private $dateUpdate;

    /**
     * @var integer
     */
    private $userCreate;

    /**
     * @var integer
     */
    private $userUpdate;

     /**
     * @var \DsCorp\Bundle\UserBundle\Entity\perfil
     */
    private $perfil;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $rol_user;

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
     * Set userName
     *
     * @param string $userName
     *
     * @return User
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;

        return $this;
    }

    /**
     * Get userName
     *
     * @return string
     */
    public function getUserName()
    {
        return $this->userName;
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

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return User
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set dateCreate
     *
     * @param \DateTime $dateCreate
     *
     * @return User
     */
    public function setDateCreate($dateCreate)
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    /**
     * Get dateCreate
     *
     * @return \DateTime
     */
    public function getDateCreate()
    {
        return $this->dateCreate;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return User
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set userCreate
     *
     * @param integer $userCreate
     *
     * @return User
     */
    public function setUserCreate($userCreate)
    {
        $this->userCreate = $userCreate;

        return $this;
    }

    /**
     * Get userCreate
     *
     * @return integer
     */
    public function getUserCreate()
    {
        return $this->userCreate;
    }

    /**
     * Set userUpdate
     *
     * @param integer $userUpdate
     *
     * @return User
     */
    public function setUserUpdate($userUpdate)
    {
        $this->userUpdate = $userUpdate;

        return $this;
    }

    /**
     * Get userUpdate
     *
     * @return integer
     */
    public function getUserUpdate()
    {
        return $this->userUpdate;
    }
    

    /**
     * Get roles
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRoles()
    {
        $losroles=array();
        foreach ($this->rol_user as $key) {
            $losroles[]=$key->getName();
        }
        return $losroles;
        //return $this->roles;
    }

  
    function eraseCredentials(){}
   
    /**
     * Set perfil
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\perfil $perfil
     *
     * @return User
     */
    public function setPerfil(\DsCorp\Bundle\UserBundle\Entity\perfil $perfil = null)
    {
        $this->perfil = $perfil;

        return $this;
    }

    /**
     * Get perfil
     *
     * @return \DsCorp\Bundle\UserBundle\Entity\perfil
     */
    public function getPerfil()
    {
        return $this->perfil;
    }
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rol_user = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rolUser
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\role $rolUser
     *
     * @return User
     */
    public function addRolUser(\DsCorp\Bundle\UserBundle\Entity\role $rolUser)
    {
        $this->rol_user[] = $rolUser;

        return $this;
    }

    /**
     * Remove rolUser
     *
     * @param \DsCorp\Bundle\UserBundle\Entity\role $rolUser
     */
    public function removeRolUser(\DsCorp\Bundle\UserBundle\Entity\role $rolUser)
    {
        $this->rol_user->removeElement($rolUser);
    }

    /**
     * Get rolUser
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRolUser()
    {
        return $this->rol_user;
    }

     public function __toString() {      
      if($this->perfil){
         return $this->perfil->getName().' '.$this->perfil->getFirtsName().' '.$this->perfil->getLastName();
      }else{
         return '';
      }
     }
}
