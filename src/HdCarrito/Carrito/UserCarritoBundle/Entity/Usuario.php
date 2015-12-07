<?php

namespace HdCarrito\Carrito\UserCarritoBundle\Entity;

/**
 * Usuario
 */
class Usuario
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
    private $apPat;

    /**
     * @var string
     */
    private $apMat;

    /**
     * @var string
     */
    private $correo;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $cPassword;

    /**
     * @var string
     */
    private $razonSocial;

    /**
     * @var string
     */
    private $rfc;

    /**
     * @var string
     */
    private $rTributario;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var integer
     */
    private $noExt;

    /**
     * @var integer
     */
    private $noInt;

    /**
     * @var string
     */
    private $colonia;

    /**
     * @var string
     */
    private $cPostal;

    /**
     * @var string
     */
    private $localidad;

    /**
     * @var string
     */
    private $telefono;


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
     * @return Usuario
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
     * Set apPat
     *
     * @param string $apPat
     *
     * @return Usuario
     */
    public function setApPat($apPat)
    {
        $this->apPat = $apPat;

        return $this;
    }

    /**
     * Get apPat
     *
     * @return string
     */
    public function getApPat()
    {
        return $this->apPat;
    }

    /**
     * Set apMat
     *
     * @param string $apMat
     *
     * @return Usuario
     */
    public function setApMat($apMat)
    {
        $this->apMat = $apMat;

        return $this;
    }

    /**
     * Get apMat
     *
     * @return string
     */
    public function getApMat()
    {
        return $this->apMat;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Usuario
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Usuario
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
     * Set cPassword
     *
     * @param string $cPassword
     *
     * @return Usuario
     */
    public function setCPassword($cPassword)
    {
        $this->cPassword = $cPassword;

        return $this;
    }

    /**
     * Get cPassword
     *
     * @return string
     */
    public function getCPassword()
    {
        return $this->cPassword;
    }

    /**
     * Set razonSocial
     *
     * @param string $razonSocial
     *
     * @return Usuario
     */
    public function setRazonSocial($razonSocial)
    {
        $this->razonSocial = $razonSocial;

        return $this;
    }

    /**
     * Get razonSocial
     *
     * @return string
     */
    public function getRazonSocial()
    {
        return $this->razonSocial;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return Usuario
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set rTributario
     *
     * @param string $rTributario
     *
     * @return Usuario
     */
    public function setRTributario($rTributario)
    {
        $this->rTributario = $rTributario;

        return $this;
    }

    /**
     * Get rTributario
     *
     * @return string
     */
    public function getRTributario()
    {
        return $this->rTributario;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return Usuario
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set noExt
     *
     * @param integer $noExt
     *
     * @return Usuario
     */
    public function setNoExt($noExt)
    {
        $this->noExt = $noExt;

        return $this;
    }

    /**
     * Get noExt
     *
     * @return integer
     */
    public function getNoExt()
    {
        return $this->noExt;
    }

    /**
     * Set noInt
     *
     * @param integer $noInt
     *
     * @return Usuario
     */
    public function setNoInt($noInt)
    {
        $this->noInt = $noInt;

        return $this;
    }

    /**
     * Get noInt
     *
     * @return integer
     */
    public function getNoInt()
    {
        return $this->noInt;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return Usuario
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set cPostal
     *
     * @param string $cPostal
     *
     * @return Usuario
     */
    public function setCPostal($cPostal)
    {
        $this->cPostal = $cPostal;

        return $this;
    }

    /**
     * Get cPostal
     *
     * @return string
     */
    public function getCPostal()
    {
        return $this->cPostal;
    }

    /**
     * Set localidad
     *
     * @param string $localidad
     *
     * @return Usuario
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this;
    }

    /**
     * Get localidad
     *
     * @return string
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     *
     * @return Usuario
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return string
     */
    public function getTelefono()
    {
        return $this->telefono;
    }
    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\pais
     */
    private $pais;

    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\estado
     */
    private $estado;

    /**
     * @var \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni
     */
    private $dele_muni;


    /**
     * Set pais
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\pais $pais
     *
     * @return Usuario
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
     * @return Usuario
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

    /**
     * Set deleMuni
     *
     * @param \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni
     *
     * @return Usuario
     */
    public function setDeleMuni(\HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni $deleMuni = null)
    {
        $this->dele_muni = $deleMuni;

        return $this;
    }

    /**
     * Get deleMuni
     *
     * @return \HdCarrito\Carrito\UserCarritoBundle\Entity\dele_muni
     */
    public function getDeleMuni()
    {
        return $this->dele_muni;
    }
}
