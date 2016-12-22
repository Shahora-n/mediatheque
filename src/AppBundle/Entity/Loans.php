<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Loans
 *
 * @ORM\Table(name="loans", indexes={@ORM\Index(name="publication_id", columns={"document_id"})})
 * @ORM\Entity
 */
class Loans
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="borrow_date", type="date", nullable=false)
     */
    private $borrowDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="return_date", type="date", nullable=false)
     */
    private $returnDate;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Loans
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
     * Set borrowDate
     *
     * @param \DateTime $borrowDate
     *
     * @return Loans
     */
    public function setBorrowDate($borrowDate)
    {
        $this->borrowDate = $borrowDate;

        return $this;
    }

    /**
     * Get borrowDate
     *
     * @return \DateTime
     */
    public function getBorrowDate()
    {
        return $this->borrowDate;
    }

    /**
     * Set returnDate
     *
     * @param \DateTime $returnDate
     *
     * @return Loans
     */
    public function setReturnDate($returnDate)
    {
        $this->returnDate = $returnDate;

        return $this;
    }

    /**
     * Get returnDate
     *
     * @return \DateTime
     */
    public function getReturnDate()
    {
        return $this->returnDate;
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
     * @return Loans
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
