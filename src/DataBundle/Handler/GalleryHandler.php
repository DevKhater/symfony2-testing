<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use DataBundle\Exception\InvalidFormException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use DataBundle\Form\Api\ApiGalleryType;
use DataBundle\Entity\Gallery;
use DataBundle\Entity\Media;

class GalleryHandler
{

    private $em;
    private $entityClass;
    private $repository;
    private $formFactory;
    private $mediaManager;

    public function __construct(ObjectManager $em, $entityClass, FormFactoryInterface $formFactory, MediaHandler $mediaManager)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->mediaManager = $mediaManager;
    }

    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function all($offset = 0, $limit = 10)
    {
        return $this->repository->findAllEntities($offset, $limit);
    }

    public function post(array $parameters)
    {
        $gallery = $this->createGallery();
        return $this->processForm($gallery, $parameters, 'POST');
    }

    public function addImage(Gallery $gallery, Media $image)
    {
        $gallery->addImagesInGallery($image);
        $this->em->persist($gallery);
        try {
            $this->em->flush();
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
            if ($e->getErrorCode() === 1062)
                throw new HttpException(Response::HTTP_BAD_REQUEST, "Image is Already Assigned to Other Entity");
        }

        return $gallery;
    }

    public function addImages(Gallery $gallery, $medias)
    {
        foreach ($medias as $image) {
            $searchImage = $this->mediaManager->get($image['id']);
            $searchImInGa = $this->repository->getImage($gallery, $searchImage);
            if (sizeof($searchImInGa) == 0) {
                $gallery->addImagesInGallery($searchImage);
                $this->em->persist($gallery);
                $this->em->flush();
            }
        }
        return $gallery;
    }

    public function removeImage(Gallery $gallery, Media $image)
    {
        $gallery->removeImagesInGallery($image);
        $this->em->persist($gallery);
        $this->em->flush();
        return $gallery;
    }

    private function processForm(Gallery $gallery, $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new ApiGalleryType(), $gallery, array('method' => $method));
        $form->submit($parameters[$form->getName()]);
        if ($form->isValid()) {
            $gallery = $form->getData();
            $this->em->persist($gallery);
            $this->em->flush($gallery);
            return $gallery;
        }

        throw new InvalidFormException($form->getErrors(), $form);
    }

    private function createGallery()
    {
        return new $this->entityClass();
    }

}
