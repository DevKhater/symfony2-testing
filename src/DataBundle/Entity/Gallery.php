<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="DataBundle\Repository\GalleryRepository")
 */
class Gallery
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="DataBundle\Entity\Media")
     * @ORM\JoinTable(name="galleries_images",
     *      joinColumns={@ORM\JoinColumn(name="gallery_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="media_id", referencedColumnName="id")}
     *      )
     */
    private $imagesInGallery;

    public function __construct()
    {
        $this->imagesInGallery = new ArrayCollection();
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
     * Add imagesInGallery
     *
     * @param \DataBundle\Entity\Media $imagesInGallery
     * @return Gallery
     */
    public function addImagesInGallery(\DataBundle\Entity\Media $imagesInGallery)
    {
        $this->imagesInGallery[] = $imagesInGallery;

        return $this;
    }

    /**
     * Remove imagesInGallery
     *
     * @param \DataBundle\Entity\Media $imagesInGallery
     */
    public function removeImagesInGallery(\DataBundle\Entity\Media $imagesInGallery)
    {
        $this->imagesInGallery->removeElement($imagesInGallery);
    }

    /**
     * Get imagesInGallery
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagesInGallery()
    {
        return $this->imagesInGallery;
    }

    public function isImagesInGallery()
    {
        return $this->imagesInGallery;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return Gallery
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
}
