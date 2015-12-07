<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Entity;

/**
 * dele_muni
 */
class dele_muni
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $deleMuni;


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
     * Set deleMuni
     *
     * @param string $deleMuni
     *
     * @return dele_muni
     */
    public function setDeleMuni($deleMuni)
    {
        $this->deleMuni = $deleMuni;

        return $this;
    }

    /**
     * Get deleMuni
     *
     * @return string
     */
    public function getDeleMuni()
    {
        return $this->deleMuni;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Usuario;

    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\pais
     */
    private $pais;

    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\estado
     */
    private $estado;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Usuario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add usuario
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\Usuario $usuario
     *
     * @return dele_muni
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
     * @return dele_muni
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

    /**
     * Set estado
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado
     *
     * @return dele_muni
     */
    public function setEstado(\HdCarrito\Carrito\UserCarritoBundle\Entity\estado $estado = null)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return \HdCarrito\Carrito\UserCarritoBundle\Entity\estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    public function __toString(){
        return $this->deleMuni;
    }
}
