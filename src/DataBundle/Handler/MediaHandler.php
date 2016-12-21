<?php namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Form\MediaType;
use DataBundle\Model\MediaInterface;

class MediaHandler
{

    private $em;
    private $entityClass;
    private $formFactory;
    private $repository;
    private $fileUploaderService;

    public function __construct(ObjectManager $em, $entityClass, FormFactoryInterface $formFactory, $fileUploaderService)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->fileUploaderService = $fileUploaderService;
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

    public function save($media)
    {
        $this->em->persist($media);
        $this->em->flush($media);
    }

    public function post($uploadedFile)
    {
        $media = $this->createMedia();
        $fileName = $this->fileUploaderService->upload($uploadedFile);
        $media->setImage($fileName);
        $this->save($media);
        return $media;
    }

    private function createMedia()
    {
        return new $this->entityClass();
    }
}
