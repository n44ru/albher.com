<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * services
 *
 * @ORM\Table(name="services")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\serviciosRepository")
 */
class services
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
     * @var string
     *
     * @ORM\Column(name="reserva", type="string", length=2)
     */
    private $reserva;

    /**
     * @ORM\Column(type="string")
     *
     */
    private $file1;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file2;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file3;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file4;


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
     * @return services
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
     * @return services
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
     * @return services
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
     * @return services
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
     * @return services
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
     * @return services
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
    public function getFile1()
    {
        return $this->file1;
    }
    public function setFile1($file1)
    {
        $this->file1 = $file1;
        return $this;
    }
    /* File gets & sets */
    public function getFile2()
    {
        return $this->file2;
    }
    public function setFile2($file2)
    {
        $this->file2 = $file2;
        return $this;
    }
    /* File gets & sets */
    public function getFile3()
    {
        return $this->file3;
    }
    public function setFile3($file3)
    {
        $this->file3 = $file3;
        return $this;
    }
    /* File gets & sets */
    public function getFile4()
    {
        return $this->file4;
    }
    public function setFile4($file4)
    {
        $this->file4 = $file4;
        return $this;
    }

    /**
     * Set reserva
     *
     * @param string $reserva
     *
     * @return services
     */
    public function setReserva($reserva)
    {
        $this->reserva = $reserva;

        return $this;
    }

    /**
     * Get reserva
     *
     * @return string
     */
    public function getReserva()
    {
        return $this->reserva;
    }
}
