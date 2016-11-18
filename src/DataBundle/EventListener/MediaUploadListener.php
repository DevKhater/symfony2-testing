<?php

namespace DataBundle\EventListener;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use MK\CRUDBundle\Entity\Media;
use MK\CRUDBundle\Service\FileUploader;

class MediaUploadListener
{

    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }
    
    public function postLoad(LifecycleEventArgs $args)
    {
//
//        $entity = $args->getEntity();
//        $image = $entity->getImage();
//        $image->setImageUrl();
//        
////        dump($fileName);exit;
////        //$entity->getImage()->setImage();
////        $image = new File($this->uploader->getTargetPath().'/'. $entity->getImage()->getImage());
////        dump($image);exit;
////        
////        //$entity->setImage(new File($this->uploader->getTargetPath().'/'.$fileName));
//        
//        //$image->setImage($this->uploader->getPrefixPath().'/'.$fileName);
//        //$entity->setImage($image);
//        dump($image);
//        dump($entity);
    }

    private function uploadFile($entity)
    {
        // upload only works for Product entities
        if (!$entity instanceof Media) {
            return;
        }

        $file = $entity->getImage();

        // only upload new files
        if (!$file instanceof UploadedFile) {
            return;
        }

        $fileName = $this->uploader->upload($file);
        $entity->setImage($fileName);
    }
}
