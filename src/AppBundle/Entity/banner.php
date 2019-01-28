<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * banner
 *
 * @ORM\Table(name="banner")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\bannerRepository")
 */
class banner
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="textonees", type="string", length=255)
     */
    private $textonees;

    /**
     * @var string
     *
     * @ORM\Column(name="textoneen", type="string", length=255)
     */
    private $textoneen;

    /**
     * @var string
     *
     * @ORM\Column(name="textonede", type="string", length=255)
     */
    private $textonede;

    /**
     * @var string
     *
     * @ORM\Column(name="texttwoes", type="string", length=255)
     */
    private $texttwoes;

    /**
     * @var string
     *
     * @ORM\Column(name="texttwoen", type="string", length=255)
     */
    private $texttwoen;

    /**
     * @var string
     *
     * @ORM\Column(name="texttwode", type="string", length=255)
     */
    private $texttwode;

    /**
     * @var string
     *
     * @ORM\Column(name="fulles", type="string", length=2000)
     */
    private $fulles;

    /**
     * @var string
     *
     * @ORM\Column(name="fullen", type="string", length=2000)
     */
    private $fullen;

    /**
     * @var string
     *
     * @ORM\Column(name="fullde", type="string", length=2000)
     */
    private $fullde;

    /**
     * @var integer
     *
     * @ORM\Column(name="orden", type="integer", length=10)
     */
    private $orden;

    /**
     * @ORM\Column(type="string")
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
     * Set title
     *
     * @param string $title
     *
     * @return banner
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set textonees
     *
     * @param string $textonees
     *
     * @return banner
     */
    public function setTextonees($textonees)
    {
        $this->textonees = $textonees;

        return $this;
    }

    /**
     * Get textonees
     *
     * @return string
     */
    public function getTextonees()
    {
        return $this->textonees;
    }

    /**
     * Set textoneen
     *
     * @param string $textoneen
     *
     * @return banner
     */
    public function setTextoneen($textoneen)
    {
        $this->textoneen = $textoneen;

        return $this;
    }

    /**
     * Get textoneen
     *
     * @return string
     */
    public function getTextoneen()
    {
        return $this->textoneen;
    }

    /**
     * Set textonede
     *
     * @param string $textonede
     *
     * @return banner
     */
    public function setTextonede($textonede)
    {
        $this->textonede = $textonede;

        return $this;
    }

    /**
     * Get textonede
     *
     * @return string
     */
    public function getTextonede()
    {
        return $this->textonede;
    }

    /**
     * Set texttwoes
     *
     * @param string $texttwoes
     *
     * @return banner
     */
    public function setTexttwoes($texttwoes)
    {
        $this->texttwoes = $texttwoes;

        return $this;
    }

    /**
     * Get texttwoes
     *
     * @return string
     */
    public function getTexttwoes()
    {
        return $this->texttwoes;
    }

    /**
     * Set texttwoen
     *
     * @param string $texttwoen
     *
     * @return banner
     */
    public function setTexttwoen($texttwoen)
    {
        $this->texttwoen = $texttwoen;

        return $this;
    }

    /**
     * Get texttwoen
     *
     * @return string
     */
    public function getTexttwoen()
    {
        return $this->texttwoen;
    }

    /**
     * Set texttwode
     *
     * @param string $texttwode
     *
     * @return banner
     */
    public function setTexttwode($texttwode)
    {
        $this->texttwode = $texttwode;

        return $this;
    }

    /**
     * Get texttwode
     *
     * @return string
     */
    public function getTexttwode()
    {
        return $this->texttwode;
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
     * Set fulles
     *
     * @param string $fulles
     *
     * @return banner
     */
    public function setFulles($fulles)
    {
        $this->fulles = $fulles;

        return $this;
    }

    /**
     * Get fulles
     *
     * @return string
     */
    public function getFulles()
    {
        return $this->fulles;
    }

    /**
     * Set fullen
     *
     * @param string $fullen
     *
     * @return banner
     */
    public function setFullen($fullen)
    {
        $this->fullen = $fullen;

        return $this;
    }

    /**
     * Get fullen
     *
     * @return string
     */
    public function getFullen()
    {
        return $this->fullen;
    }

    /**
     * Set fullde
     *
     * @param string $fullde
     *
     * @return banner
     */
    public function setFullde($fullde)
    {
        $this->fullde = $fullde;

        return $this;
    }

    /**
     * Get fullde
     *
     * @return string
     */
    public function getFullde()
    {
        return $this->fullde;
    }

    /**
     * Set orden
     *
     * @param integer $orden
     *
     * @return banner
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
