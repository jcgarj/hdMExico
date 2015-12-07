<?php

namespace HdCarrito\Carrito\AdminProdBundle\Entity;

/**
 * admonProd
 */
class admonProd
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var string
     */
    private $precio;

    /**
     * @var string
     */
    private $precioAnte;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return admonProd
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return admonProd
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     *
     * @return admonProd
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return admonProd
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set precioAnte
     *
     * @param string $precioAnte
     *
     * @return admonProd
     */
    public function setPrecioAnte($precioAnte)
    {
        $this->precioAnte = $precioAnte;

        return $this;
    }

    /**
     * Get precioAnte
     *
     * @return string
     */
    public function getPrecioAnte()
    {
        return $this->precioAnte;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $itemCart;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->itemCart = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add itemCart
     *
     * @param \HdCarrito\Carrito\CartBundle\Entity\itemCart $itemCart
     *
     * @return admonProd
     */
    public function addItemCart(\HdCarrito\Carrito\CartBundle\Entity\itemCart $itemCart)
    {
        $this->itemCart[] = $itemCart;

        return $this;
    }

    /**
     * Remove itemCart
     *
     * @param \HdCarrito\Carrito\CartBundle\Entity\itemCart $itemCart
     */
    public function removeItemCart(\HdCarrito\Carrito\CartBundle\Entity\itemCart $itemCart)
    {
        $this->itemCart->removeElement($itemCart);
    }

    /**
     * Get itemCart
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItemCart()
    {
        return $this->itemCart;
    }
}
