<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Form\Api\ApiLocationType;
use DataBundle\Entity\Location;

class LocationHandler
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
     * Get a Location.
     *
     * @param mixed $id
     *
     * @return Location
     */
    public function get($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Get a list of Locations.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($offset = 0, $limit = 5)
    {
        return $this->repository->findAllEntities($offset, $limit);
    }

    /**
     * Create a new Location.
     *
     * @param array $parameters
     *
     * @return Location
     */
    public function post(array $parameters)
    {
        $location = $this->createLocation();
        return $this->processForm($location, $parameters, 'POST');
    }

    /**
     * Edit a Location.
     *
     * @param Location $location
     * @param array         $parameters
     *
     * @return Location
     */
    public function put($location, array $parameters)
    {

        return $this->processForm($location, $parameters, 'PUT');
    }

    /**
     * Partially update a Location.
     *
     * @param Location $location
     * @param array         $parameters
     *
     * @return Location
     */
    private function patch(Location $location, array $parameters)
    {
        return $this->processForm($location, $parameters, 'PATCH');
    }

    public function delete(Location $location)
    {
        $this->em->remove($location);
        $this->em->flush();
    }

    /**
     * Processes the form.
     *
     * @param Location $location
     * @param array         $parameters
     * @param String        $method
     *
     * @return Location
     *
     * @throws \DataBundle\Exception\InvalidFormException
     */
    private function processForm(Location $location, $parameters, $method = "PUT")
    {
        $form = $this->formFactory->create(new ApiLocationType(), $location, array('method' => $method));
        $form->submit($parameters[$form->getName()]);
        if ($form->isValid()) {
            $location = $form->getData();
            $this->em->persist($location);
            $this->em->flush($location);
            return $location;
        }

        throw new InvalidFormException($form->getErrors(), $form);
    }

    /**
     * Create Form view.
     *
     * @param String        $method
     * @param Location       $location 
     * @param String        $url
     *
     * @return ApiLocationFrorm
     *
     */
    public function createLocationForm($method, $location, $url)
    {
        $form = null;
        if ($method == "POST") {
            $form = $this->formFactory->create(new ApiLocationType(), $location, array('action' => $url, 'method' => $method));
        } elseif ($method == "PUT") {
            $form = $this->formFactory->create(new ApiLocationType(), $location, array('action' => $url, 'method' => $method));
        } elseif ($method == "PATCH") {
            $form = $this->formFactory->create(new ApiLocationType(), $location, array('action' => $url, 'method' => $method));
        }
        return $form;
    }

    private function createLocation()
    {
        return new $this->entityClass();
    }

    public function patchBand($location, $newName)
    {
        $band = $this->bandManager->get($newName);
        if (!$band)
            return null;
        $location->setBand($band);
        $this->em->persist($location);
        $this->em->flush($location);
        return $location;
    }

}
