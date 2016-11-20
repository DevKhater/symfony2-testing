<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Location
 *
 * @ORM\Table(name="location")
 * @ORM\Entity(repositoryClass="DataBundle\Repository\LocationRepository")
 */
class Location
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
     * @var int
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="address", type="string")
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="DataBundle\Entity\Concert", mappedBy="location")
     * 
     */
    private $concerts;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    public function __construct()
    {
        $this->concert = new ArrayCollection();
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Location
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Add concerts
     *
     * @param \DataBundle\Entity\Concert $concerts
     * @return Location
     */
    public function addConcert(\DataBundle\Entity\Concert $concerts)
    {
        $this->concerts[] = $concerts;

        return $this;
    }

    /**
     * Remove concerts
     *
     * @param \DataBundle\Entity\Concert $concerts
     */
    public function removeConcert(\DataBundle\Entity\Concert $concerts)
    {
        $this->concerts->removeElement($concerts);
    }

    /**
     * Get concerts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getConcerts()
    {
        return $this->concerts;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Location
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }
}
