<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Form\Api\ApiConcertType;
use DataBundle\Entity\Concert;
use DataBundle\Entity\Gallery;

class ConcertHandler
{

    private $em;
    private $entityClass;
    private $repository;
    private $formFactory;
    private $bandManager;

    public function __construct(ObjectManager $em, $entityClass, FormFactoryInterface $formFactory, BandHandler $bandManager)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
        $this->bandManager = $bandManager;
    }

    /**
     * Get a Concert.
     *
     * @param mixed $id
     *
     * @return Concert
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get a list of Concerts.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($offset = 0, $limit = 10)
    {
        return $this->repository->findAllEntities($offset, $limit);
    }

    /**
     * Create a new Concert.
     *
     * @param array $parameters
     *
     * @return Concert
     */
    public function post(array $parameters)
    {
        $concert = $this->createConcert();
        return $this->processForm($concert, $parameters, 'POST');
    }

    /**
     * Edit a Concert.
     *
     * @param Concert $concert
     * @param array         $parameters
     *
     * @return Concert
     */
    public function put($concert, array $parameters)
    {

        return $this->processForm($concert, $parameters, 'PUT');
    }

    /**
     * Partially update a Concert.
     *
     * @param Concert $concert
     * @param array         $parameters
     *
     * @return Concert
     */
    private function patch(Concert $concert, array $parameters)
    {
        return $this->processForm($concert, $parameters, 'PATCH');
    }

    public function delete(Concert $concert)
    {
        $this->em->remove($concert);
        $this->em->flush();
    }

    /**
     * Processes the form.
     *
     * @param Concert $concert
     * @param array         $parameters
     * @param String        $method
     *
     * @return Concert
     *
     * @throws \DataBundle\Exception\InvalidFormException
     */
    private function processForm(Concert $concert, $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new ApiConcertType(), $concert, array('method' => $method));
        $form->submit($parameters[$form->getName()]);
        if ($form->isValid()) {
            $concert = $form->getData();
            $this->em->persist($concert);
            $this->em->flush($concert);
            return $concert;
        }

        throw new InvalidFormException($form->getErrors(), $form);
    }

    /**
     * Create Form view.
     *
     * @param String        $method
     * @param Concert       $concert 
     * @param String        $url
     *
     * @return ApiConcertFrorm
     *
     */
    public function createConcertForm($method, $concert, $url)
    {
        $form = null;
        if ($method == "POST") {
            $form = $this->formFactory->create(new ApiConcertType(), $concert, array('action' => $url, 'method' => $method));
        } elseif ($method == "PUT") {
            $form = $this->formFactory->create(new ApiConcertType(), $concert, array('action' => $url, 'method' => $method));
        } elseif ($method == "PATCH") {
            $form = $this->formFactory->create(new ApiConcertType(), $concert, array('action' => $url, 'method' => $method));
        }
        return $form;
    }

    private function createConcert()
    {
        return new $this->entityClass();
    }

    public function patchBand($concert, $newName)
    {
        $band = $this->bandManager->get($newName);
        if (!$band)
            return null;
        $concert->setBand($band);
        $this->em->persist($concert);
        $this->em->flush($concert);
        return $concert;
    }
    
    
    public function addGallery(Concert $concert, Gallery $gallery)
    {
        $concert->setGallery($gallery);
        $this->em->persist($gallery);
        try {
            $this->em->flush();
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
            if ($e->getErrorCode() === 1062)
                throw new HttpException(Response::HTTP_BAD_REQUEST, "Gallery is Already Assigned to Other Entity");
        }
        return $concert;
    }

}
