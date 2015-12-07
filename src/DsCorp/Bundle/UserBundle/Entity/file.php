<?php

namespace DsCorp\Bundle\UserBundle\Entity;

/**
 * file
 */
class file
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $metatags;

    /**
     * @var \DateTime
     */
    private $dateUpdate;


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
     * Set file
     *
     * @param string $file
     *
     * @return file
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param string $path
     *
     * @return file
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set metatags
     *
     * @param string $metatags
     *
     * @return file
     */
    public function setMetatags($metatags)
    {
        $this->metatags = $metatags;

        return $this;
    }

    /**
     * Get metatags
     *
     * @return string
     */
    public function getMetatags()
    {
        return $this->metatags;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     *
     * @return file
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
     * Manages the copying of the file to the relevant place on the server
     */
    public function upload($dir='perfil')
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return false;
        }

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and target filename as params
        $this->getFile()->move(
            $this->getUploadRootDir($dir),
            urlencode(time().$this->getFile()->getClientOriginalName())
        );

        // set the path property to the filename where you've saved the file
        $this->path = urlencode(time().$this->getFile()->getClientOriginalName());
        $this->setDateUpdate(new \DateTime("now"));
        $this->file=$this->getUploadDir($dir).'/'.$this->path;
        return true;
        // clean up the f$this->path = $this->getFile()->getClientOriginalName();ile property as you won't need it anymore
        //$this->setImagen(null);
    }

     /**
     * Updates the hash value to force the preUpdate and postUpdate events to fire
     */
   
    public function getAbsolutePath()
    {
        return null === $this->path
            ? null
            : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
            ? null
            : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir($dir='perfil')
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../../web/'.$this->getUploadDir($dir);
    }

    protected function getUploadDir($dir='perfil')
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/'.$dir;
    }

   public function __toString()
   { 
     return $this->metatags;
    }
}
