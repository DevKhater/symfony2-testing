<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use DataBundle\Model\BandInterface;
use DataBundle\Model\MediaInterface;
use DataBundle\Form\Api\ApiBandType;
use DataBundle\Form\Api\ApiBandPATCHType;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Handler\HandlerInterface\BandHandlerInterface;

class BandHandler implements BandHandlerInterface
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
     * Get a Band.
     *
     * @param mixed $id
     *
     * @return BandInterface
     */
    public function get($slug)
    {
        return $this->repository->findBy(array('slug' => $slug));
    }

    /**
     * Get a list of Bands.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($limit = 5, $offset = 0)
    {
        return $this->repository->findBy(array(), null, $limit, $offset);
    }

    /**
     * Create a new Band.
     *
     * @param array $parameters
     *
     * @return BandInterface
     */
    public function post(array $parameters)
    {
        $band = $this->createBand();

        return $this->processForm($band, $parameters, 'POST');
    }

    /**
     * Edit a Band.
     *
     * @param BandInterface $band
     * @param array         $parameters
     *
     * @return BandInterface
     */
    public function put(BandInterface $band, array $parameters)
    {
        return $this->processForm($band, $parameters, 'PUT');
    }

    /**
     * Partially update a Band.
     *
     * @param BandInterface $band
     * @param array         $parameters
     *
     * @return BandInterface
     */
    public function patch(BandInterface $band, array $parameters)
    {
        return $this->processForm($band, $parameters, 'PATCH');
    }

    public function delete(BandInterface $band)
    {
        $this->em->remove($band);
        $this->em->flush();
    }

    public function setImage(BandInterface $band, MediaInterface $image)
    {
        $band->setImage($image);
        $this->em->persist($band);
        try {
            $this->em->flush();
        } catch (\Doctrine\DBAL\Exception\UniqueConstraintViolationException $e) {
            if ($e->getErrorCode() === 1062)
                throw new HttpException(Response::HTTP_BAD_REQUEST, "Image is Already Assigned to Other Entity");
        }

        return $band;
    }

    /**
     * Processes the form.
     *
     * @param BandInterface $band
     * @param array         $parameters
     * @param String        $method
     *
     * @return BandInterface
     *
     * @throws \DataBundle\Exception\InvalidFormException
     */
    private function processForm(BandInterface $band, $parameters, $method = "PUT")
    {
//        $method == "PATCH" ? $form = $this->formFactory->create(new ApiBandPATCHType(), $band, array('method' => $method)) : $form = $this->formFactory->create(new ApiBandType(), $band, array('method' => $method)); 
//        $form->submit($parameters);
        $form = $this->formFactory->create(new ApiBandType(), $band, array('method' => $method));
        $form->submit($parameters[$form->getName()]);
        //dump($parameters);dump($band);exit;
        if ($form->isValid()) {
            $band = $form->getData();
            $this->em->persist($band);
            $this->em->flush($band);

            return $band;
        }

        throw new InvalidFormException($form->getErrors(), $form);
    }

    private function createBand()
    {
        return new $this->entityClass();
    }

}
