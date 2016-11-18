<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use DataBundle\Model\MediaInterface;

class MediaHandler
{
    private $em;
    private $entityClass;
    private $repository;

    public function __construct(ObjectManager $em, $entityClass)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
    }
    
    public function get($id)
    {
        return $this->repository->find($id);
    }

    
    public function delete(MediaInterface $image)
    {
        $this->em->remove($image);
        $this->em->flush();
    }

}
