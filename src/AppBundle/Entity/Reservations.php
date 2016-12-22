<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", indexes={@ORM\Index(name="document_id", columns={"document_id"})})
 * @ORM\Entity
 */
class Reservations
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="reservation_date", type="date", nullable=false)
     */
    private $reservationDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\Documents
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Documents")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     * })
     */
    private $document;



    /**
     * Set reservationDate
     *
     * @param \DateTime $reservationDate
     *
     * @return Reservations
     */
    public function setReservationDate($reservationDate)
    {
        $this->reservationDate = $reservationDate;

        return $this;
    }

    /**
     * Get reservationDate
     *
     * @return \DateTime
     */
    public function getReservationDate()
    {
        return $this->reservationDate;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Reservations
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
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
     * Set document
     *
     * @param \AppBundle\Entity\Documents $document
     *
     * @return Reservations
     */
    public function setDocument(\AppBundle\Entity\Documents $document = null)
    {
        $this->document = $document;

        return $this;
    }

    /**
     * Get document
     *
     * @return \AppBundle\Entity\Documents
     */
    public function getDocument()
    {
        return $this->document;
    }
}
