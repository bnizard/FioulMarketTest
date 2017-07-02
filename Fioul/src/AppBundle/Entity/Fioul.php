<?php

namespace AppBundle\Entity;

/**
 * Fioul
 */
class Fioul
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $postalCodeId;

    /**
     * @var int
     */
    private $amount;

    /**
     * @var \DateTime
     */
    private $date;


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
     * Set postalCodeId
     *
     * @param integer $postalCodeId
     *
     * @return Fioul
     */
    public function setPostalCodeId($postalCodeId)
    {
        $this->postalCodeId = $postalCodeId;

        return $this;
    }

    /**
     * Get postalCodeId
     *
     * @return int
     */
    public function getPostalCodeId()
    {
        return $this->postalCodeId;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     *
     * @return Fioul
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Fioul
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
}
