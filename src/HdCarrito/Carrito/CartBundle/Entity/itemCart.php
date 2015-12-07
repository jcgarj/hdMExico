<?php

namespace HdCarrito\Carrito\CartBundle\Entity;

/**
 * itemCart
 */
class itemCart
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var integer
     */
    private $cantidadPedido;

    /**
     * @var decimal
     */
    private $precioU;


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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return itemCart
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set cantidadPedido
     *
     * @param integer $cantidadPedido
     *
     * @return itemCart
     */
    public function setCantidadPedido($cantidadPedido)
    {
        $this->cantidadPedido = $cantidadPedido;

        return $this;
    }

    /**
     * Get cantidadPedido
     *
     * @return integer
     */
    public function getCantidadPedido()
    {
        return $this->cantidadPedido;
    }

    /**
     * Set precioU
     *
     * @param decimal $precioU
     *
     * @return itemCart
     */
    public function setPrecioU($precioU)
    {
        $this->precioU = $precioU;

        return $this;
    }

    /**
     * Get precioU
     *
     * @return decimal
     */
    public function getPrecioU()
    {
        return $this->precioU;
    }
    /**
     * @var \HdCarrito\Carrito\CartBundle\Entity\carrito
     */
    private $carrito;

    /**
     * @var \HdCarrito\Carrito\AdminProdBundle\Entity\admonProd
     */
    private $admonProd;


    /**
     * Set carrito
     *
     * @param \HdCarrito\Carrito\CartBundle\Entity\carrito $carrito
     *
     * @return itemCart
     */
    public function setCarrito(\HdCarrito\Carrito\CartBundle\Entity\carrito $carrito = null)
    {
        $this->carrito = $carrito;

        return $this;
    }

    /**
     * Get carrito
     *
     * @return \HdCarrito\Carrito\CartBundle\Entity\carrito
     */
    public function getCarrito()
    {
        return $this->carrito;
    }

    /**
     * Set admonProd
     *
     * @param \HdCarrito\Carrito\AdminProdBundle\Entity\admonProd $admonProd
     *
     * @return itemCart
     */
    public function setAdmonProd(\HdCarrito\Carrito\AdminProdBundle\Entity\admonProd $admonProd = null)
    {
        $this->admonProd = $admonProd;

        return $this;
    }

    /**
     * Get admonProd
     *
     * @return \HdCarrito\Carrito\AdminProdBundle\Entity\admonProd
     */
    public function getAdmonProd()
    {
        return $this->admonProd;
    }
}
