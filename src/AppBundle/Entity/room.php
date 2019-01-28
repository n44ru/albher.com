<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * room
 *
 * @ORM\Table(name="room")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\roomRepository")
 */
class room
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
     * @ORM\Column(name="tituloes", type="string", length=255)
     */
    private $tituloes;

    /**
     * @var string
     *
     * @ORM\Column(name="tituloen", type="string", length=255)
     */
    private $tituloen;

    /**
     * @var string
     *
     * @ORM\Column(name="titulode", type="string", length=255)
     */
    private $titulode;

    /**
     * @var string
     *
     * @ORM\Column(name="textoes", type="string", length=2000)
     */
    private $textoes;

    /**
     * @var string
     *
     * @ORM\Column(name="textoen", type="string", length=2000)
     */
    private $textoen;

    /**
     * @var string
     *
     * @ORM\Column(name="textode", type="string", length=2000)
     */
    private $textode;

    /**
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file5;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file6;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file7;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file8;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file9;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file10;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file11;

    /**
     * @ORM\Column(type="string", nullable=true)
     *
     */
    private $file12;


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
     * Set tituloes
     *
     * @param string $tituloes
     *
     * @return room
     */
    public function setTituloes($tituloes)
    {
        $this->tituloes = $tituloes;

        return $this;
    }

    /**
     * Get tituloes
     *
     * @return string
     */
    public function getTituloes()
    {
        return $this->tituloes;
    }

    /**
     * Set tituloen
     *
     * @param string $tituloen
     *
     * @return room
     */
    public function setTituloen($tituloen)
    {
        $this->tituloen = $tituloen;

        return $this;
    }

    /**
     * Get tituloen
     *
     * @return string
     */
    public function getTituloen()
    {
        return $this->tituloen;
    }

    /**
     * Set titulode
     *
     * @param string $titulode
     *
     * @return room
     */
    public function setTitulode($titulode)
    {
        $this->titulode = $titulode;

        return $this;
    }

    /**
     * Get titulode
     *
     * @return string
     */
    public function getTitulode()
    {
        return $this->titulode;
    }

    /**
     * Set textoes
     *
     * @param string $textoes
     *
     * @return room
     */
    public function setTextoes($textoes)
    {
        $this->textoes = $textoes;

        return $this;
    }

    /**
     * Get textoes
     *
     * @return string
     */
    public function getTextoes()
    {
        return $this->textoes;
    }

    /**
     * Set textoen
     *
     * @param string $textoen
     *
     * @return room
     */
    public function setTextoen($textoen)
    {
        $this->textoen = $textoen;

        return $this;
    }

    /**
     * Get textoen
     *
     * @return string
     */
    public function getTextoen()
    {
        return $this->textoen;
    }

    /**
     * Set textode
     *
     * @param string $textode
     *
     * @return room
     */
    public function setTextode($textode)
    {
        $this->textode = $textode;

        return $this;
    }

    /**
     * Get textode
     *
     * @return string
     */
    public function getTextode()
    {
        return $this->textode;
    }

    /**
     * Set file1
     *
     * @param string $file1
     *
     * @return room
     */
    public function setFile1($file1)
    {
        $this->file1 = $file1;

        return $this;
    }

    /**
     * Get file1
     *
     * @return string
     */
    public function getFile1()
    {
        return $this->file1;
    }

    /**
     * Set file2
     *
     * @param string $file2
     *
     * @return room
     */
    public function setFile2($file2)
    {
        $this->file2 = $file2;

        return $this;
    }

    /**
     * Get file2
     *
     * @return string
     */
    public function getFile2()
    {
        return $this->file2;
    }

    /**
     * Set file3
     *
     * @param string $file3
     *
     * @return room
     */
    public function setFile3($file3)
    {
        $this->file3 = $file3;

        return $this;
    }

    /**
     * Get file3
     *
     * @return string
     */
    public function getFile3()
    {
        return $this->file3;
    }

    /**
     * Set file4
     *
     * @param string $file4
     *
     * @return room
     */
    public function setFile4($file4)
    {
        $this->file4 = $file4;

        return $this;
    }

    /**
     * Get file4
     *
     * @return string
     */
    public function getFile4()
    {
        return $this->file4;
    }

    /**
     * Set file5
     *
     * @param string $file5
     *
     * @return room
     */
    public function setFile5($file5)
    {
        $this->file5 = $file5;

        return $this;
    }

    /**
     * Get file5
     *
     * @return string
     */
    public function getFile5()
    {
        return $this->file5;
    }

    /**
     * Set file6
     *
     * @param string $file6
     *
     * @return room
     */
    public function setFile6($file6)
    {
        $this->file6 = $file6;

        return $this;
    }

    /**
     * Get file6
     *
     * @return string
     */
    public function getFile6()
    {
        return $this->file6;
    }

    /**
     * Set file7
     *
     * @param string $file7
     *
     * @return room
     */
    public function setFile7($file7)
    {
        $this->file7 = $file7;

        return $this;
    }

    /**
     * Get file7
     *
     * @return string
     */
    public function getFile7()
    {
        return $this->file7;
    }

    /**
     * Set file8
     *
     * @param string $file8
     *
     * @return room
     */
    public function setFile8($file8)
    {
        $this->file8 = $file8;

        return $this;
    }

    /**
     * Get file8
     *
     * @return string
     */
    public function getFile8()
    {
        return $this->file8;
    }

    /**
     * Set file9
     *
     * @param string $file9
     *
     * @return room
     */
    public function setFile9($file9)
    {
        $this->file9 = $file9;

        return $this;
    }

    /**
     * Get file9
     *
     * @return string
     */
    public function getFile9()
    {
        return $this->file9;
    }

    /**
     * Set file10
     *
     * @param string $file10
     *
     * @return room
     */
    public function setFile10($file10)
    {
        $this->file10 = $file10;

        return $this;
    }

    /**
     * Get file10
     *
     * @return string
     */
    public function getFile10()
    {
        return $this->file10;
    }

    /**
     * Set file11
     *
     * @param string $file11
     *
     * @return room
     */
    public function setFile11($file11)
    {
        $this->file11 = $file11;

        return $this;
    }

    /**
     * Get file11
     *
     * @return string
     */
    public function getFile11()
    {
        return $this->file11;
    }

    /**
     * Set file12
     *
     * @param string $file12
     *
     * @return room
     */
    public function setFile12($file12)
    {
        $this->file12 = $file12;

        return $this;
    }

    /**
     * Get file12
     *
     * @return string
     */
    public function getFile12()
    {
        return $this->file12;
    }
}
