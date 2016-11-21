<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use DataBundle\Form\Api\ApiConcertType;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Entity\Concert;

class ConcertHandler
{

    private $em;
    private $entityClass;
    private $repository;
    private $formFactory;

    public function __construct(ObjectManager $em, $entityClass, FormFactoryInterface $formFactory)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->formFactory = $formFactory;
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
    public function all($offset = 0, $limit = 5)
    {
        return $this->repository->findAllConcerts($offset, $limit);
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
    public function patch(Concert $concert, array $parameters)
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
        //$method == "PATCH" ? $form = $this->formFactory->create(new ApiConcertPATCHType(), $concert, array('method' => $method)) : $form = $this->formFactory->create(new ApiConcertType(), $concert, array('method' => $method));
        $form = $this->formFactory->create(new ApiConcertType(), $concert, array('method' => $method));
        $form->submit($parameters[$form->getName()]);
        //dump($parameters);dump($concert);exit;
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
        if ($method == "POST")
            $form = $this->formFactory->create(new ApiConcertType(), $concert, array('action' => $url, 'method' => $method));
        if ($method == "PUT")
            $form = $this->formFactory->create(new ApiConcertType(), $concert, array('action' => $url, 'method' => $method));
//        $method == "PATCH" ? $action = $this->generateUrl('api_band_patch', array('slug' => $band->getSlug())) : $action = $this->generateUrl('api_band_update', array('slug' => $band->getSlug()));
//        $method == "PATCH" ?
//                        $form = $this->createForm(new ApiBandPATCHType(), $band, array('action' => $action, 'method' => $method)) : $form = $this->createForm(new ApiBandType(), $band, array('action' => $action, 'method' => $method));
        return $form;
    }

    private function createConcert()
    {
        return new $this->entityClass();
    }

}
