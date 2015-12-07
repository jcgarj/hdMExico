<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Entity;

/**
 * estado
 */
class estado
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $estado;


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
     * Set estado
     *
     * @param string $estado
     *
     * @return estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $dele_muni;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Usuario;

    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\pais
     */
    private $pais;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dele_muni = new \Doctrine\Common\Collections\ArrayCollection();
        $this->Usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add deleMuni
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni
     *
     * @return estado
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
     * @return estado
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

    /**
     * Set pais
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\pais $pais
     *
     * @return estado
     */
    public function setPais(\HdCarrito\Carrito\UserCarritoBundle\Entity\pais $pais = null)
    {
        $this->pais = $pais;

        return $this;
    }

    /**
     * Get pais
     *
     * @return \HdCarrito\Carrito\UserCarritoBundle\Entity\pais
     */
    public function getPais()
    {
        return $this->pais;
    }

    public function __toString(){
        return $this->estado;
    }
}
