<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documents
 *
 * @ORM\Table(name="documents", indexes={@ORM\Index(name="type_id", columns={"documentType_id"})})
 * @ORM\Entity
 */
class Documents
{
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=250, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=150, nullable=false)
     */
    private $author;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     */
    private $year;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arrival_date", type="datetime", nullable=false)
     */
    private $arrivalDate;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255, nullable=false)
     */
    private $picture;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\DocumentType
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\DocumentType")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="documentType_id", referencedColumnName="id")
     * })
     */
    private $documenttype;



    /**
     * Set title
     *
     * @param string $title
     *
     * @return Documents
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
     * Set author
     *
     * @param string $author
     *
     * @return Documents
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set year
     *
     * @param integer $year
     *
     * @return Documents
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set arrivalDate
     *
     * @param \DateTime $arrivalDate
     *
     * @return Documents
     */
    public function setArrivalDate($arrivalDate)
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    /**
     * Get arrivalDate
     *
     * @return \DateTime
     */
    public function getArrivalDate()
    {
        return $this->arrivalDate;
    }

    /**
     * Set picture
     *
     * @param string $picture
     *
     * @return Documents
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get picture
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

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
     * Set documenttype
     *
     * @param \AppBundle\Entity\DocumentType $documenttype
     *
     * @return Documents
     */
    public function setDocumenttype(\AppBundle\Entity\DocumentType $documenttype = null)
    {
        $this->documenttype = $documenttype;

        return $this;
    }

    /**
     * Get documenttype
     *
     * @return \AppBundle\Entity\DocumentType
     */
    public function getDocumenttype()
    {
        return $this->documenttype;
    }
}
