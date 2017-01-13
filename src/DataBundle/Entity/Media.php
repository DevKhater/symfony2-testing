<?php

namespace DataBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;
use DataBundle\Model\MediaInterface;

/**
 * Media
 * @ORM\HasLifecycleCallbacks 
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="DataBundle\Repository\MediaRepository")
 */
class Media implements MediaInterface
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    private $imageUrl;

    /**
     * @ORM\Column(type="string")
     * 
     * @Assert\NotBlank(message="Please Upload Image")
     * @Assert\Image()
     * 
     */
    private $image;

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
     * Set image
     *
     * @param string $image
     * @return Media
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @ORM\PostLoad
     */
    public function setImageUrl()
    {
        $this->imageUrl = '/uploads/images/' . $this->getImage();
        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImageUrl()
    {
        return 'uploads/images/' . $this->getImage();
    }

    /**
     * @ORM\PreRemove
     */
    public function deleteImage()
    {
        $path = __DIR__ . "/../../../web/" . $this->getImageUrl();
        if ($path) {
            unlink($path);
        }
    }

}
