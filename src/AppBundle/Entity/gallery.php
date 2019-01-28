<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\galleryRepository")
 */
class gallery
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titlees", type="string", length=255)
     */
    private $titlees;

    /**
     * @var string
     *
     * @ORM\Column(name="titleen", type="string", length=255)
     */
    private $titleen;

    /**
     * @var string
     *
     * @ORM\Column(name="titlede", type="string", length=255)
     */
    private $titlede;

    /**
     * @var string
     *
     * @ORM\Column(name="textes", type="string", length=2000)
     */
    private $textes;

    /**
     * @var string
     *
     * @ORM\Column(name="texten", type="string", length=2000)
     */
    private $texten;

    /**
     * @var string
     *
     * @ORM\Column(name="textde", type="string", length=2000)
     */
    private $textde;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", length=10)
     */
    private $orden;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */

    private $file;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titlees
     *
     * @param string $titlees
     *
     * @return gallery
     */
    public function setTitlees($titlees)
    {
        $this->titlees = $titlees;

        return $this;
    }

    /**
     * Get titlees
     *
     * @return string
     */
    public function getTitlees()
    {
        return $this->titlees;
    }

    /**
     * Set titleen
     *
     * @param string $titleen
     *
     * @return gallery
     */
    public function setTitleen($titleen)
    {
        $this->titleen = $titleen;

        return $this;
    }

    /**
     * Get titleen
     *
     * @return string
     */
    public function getTitleen()
    {
        return $this->titleen;
    }

    /**
     * Set titlede
     *
     * @param string $titlede
     *
     * @return gallery
     */
    public function setTitlede($titlede)
    {
        $this->titlede = $titlede;

        return $this;
    }

    /**
     * Get titlede
     *
     * @return string
     */
    public function getTitlede()
    {
        return $this->titlede;
    }

    /**
     * Set textes
     *
     * @param string $textes
     *
     * @return gallery
     */
    public function setTextes($textes)
    {
        $this->textes = $textes;

        return $this;
    }

    /**
     * Get textes
     *
     * @return string
     */
    public function getTextes()
    {
        return $this->textes;
    }

    /**
     * Set texten
     *
     * @param string $texten
     *
     * @return gallery
     */
    public function setTexten($texten)
    {
        $this->texten = $texten;

        return $this;
    }

    /**
     * Get texten
     *
     * @return string
     */
    public function getTexten()
    {
        return $this->texten;
    }

    /**
     * Set textde
     *
     * @param string $textde
     *
     * @return gallery
     */
    public function setTextde($textde)
    {
        $this->textde = $textde;

        return $this;
    }

    /**
     * Get textde
     *
     * @return string
     */
    public function getTextde()
    {
        return $this->textde;
    }

    /* File gets & sets */
    public function getFile()
    {
        return $this->file;
    }
    public function setFile($file)
    {
        $this->file = $file;
        return $this;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return gallery
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get orden
     *
     * @return integer
     */
    public function getOrden()
    {
        return $this->orden;
    }
}
