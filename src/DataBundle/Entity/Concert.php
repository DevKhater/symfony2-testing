<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use DataBundle\Model\ConcertInterface;

/**
 * Concert
 *
 * @ORM\Table(name="concert")
 * @ORM\Entity(repositoryClass="DataBundle\Repository\ConcertRepository")
 */
class Concert implements ConcertInterface
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
     * @var date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * @var location
     * 
     * @ORM\ManyToOne(targetEntity="DataBundle\Entity\Location", inversedBy="concerts")
     * @ORM\JoinColumn(name="location_id", referencedColumnName="id")     */
    private $location;

    /**
     * @ORM\ManyToOne(targetEntity="DataBundle\Entity\Band", inversedBy="concerts")
     * @ORM\JoinColumn(name="band_id", referencedColumnName="id")
     */
    protected $band;

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
     * Set date
     *
     * @param \DateTime $date
     * @return Concert
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

    /**
     * Set location
     *
     * @param \DataBundle\Entity\Location $location
     * @return Concert
     */
    public function setLocation(\DataBundle\Entity\Location $location = null)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return \DataBundle\Entity\Location 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set band
     *
     * @param \DataBundle\Entity\Band $band
     * @return Concert
     */
    public function setBand(\DataBundle\Entity\Band $band = null)
    {
        $this->band = $band;

        return $this;
    }

    /**
     * Get band
     *
     * @return \DataBundle\Entity\Band 
     */
    public function getBand()
    {
        return $this->band;
    }
}
