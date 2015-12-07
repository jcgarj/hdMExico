<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Entity;

/**
 * pais
 */
class pais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pais;


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
     * Set pais
     *
     * @param string $pais
     *
     * @return pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return string
     */
    public function getPais()
    {
        return $this->pais;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $dele_muni;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Usuario;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->estado = new \Doctrine\Common\Collections\ArrayCollection();
        $this->dele_muni = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add estado
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado
     *
     * @return pais
     */
    public function addEstado(\HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado)
    {
        $this->estado[] = $estado;

        return $this;
    }

    /**
     * Remove estado
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado
     */
    public function removeEstado(\HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado)
    {
        $this->estado->removeElement($estado);
    }

    /**
     * Get estado
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Add deleMuni
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni
     *
     * @return pais
     */
    public function addDeleMuni(\HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni)
    {
        $this->dele_muni[] = $deleMuni;

        return $this;
    }

    /**
     * Remove deleMuni
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni
     */
    public function removeDeleMuni(\HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni)
    {
        $this->dele_muni->removeElement($deleMuni);
    }

    /**
     * Get deleMuni
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDeleMuni()
    {
        return $this->dele_muni;
    }

    /**
     * Add usuario
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario $usuario
     *
     * @return pais
     */
    public function addUsuario(\HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario $usuario)
    {
        $this->Usuario[] = $usuario;

        return $this;
    }

    /**
     * Remove usuario
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario $usuario
     */
    public function removeUsuario(\HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario $usuario)
    {
        $this->Usuario->removeElement($usuario);
    }

    /**
     * Get usuario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsuario()
    {
        return $this->Usuario;
    }

    public function __toString(){
        return $this->pais;
    }
}
