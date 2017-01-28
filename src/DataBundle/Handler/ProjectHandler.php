<?php

namespace DataBundle\Handler;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Response;
use DataBundle\Model\ProjectInterface;
use DataBundle\Form\Api\ApiProjectType;
use DataBundle\Exception\InvalidFormException;
use DataBundle\Handler\HandlerInterface\ProjectHandlerInterface;

class ProjectHandler
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
     * Get a Project.
     *
     * @param mixed $slug
     *
     * @return ProjectInterface
     */
    public function get($slug)
    {
        if (preg_match('/^[0-9]+$/', $slug)) {
            return $this->repository->find($slug);
        } else {
            $project = $this->repository->findBy(array('slug' => $slug));
            (count($project) < 1) ?: $project = $project[0];
            return $project;
        }
    }

    /**
     * Get a list of Projects.
     *
     * @param int $limit  the limit of the result
     * @param int $offset starting from the offset
     *
     * @return array
     */
    public function all($offset = 1, $limit = 10)
    {
        return $this->repository->findAllEntities($offset, $limit);
    }

    /**
     * Create a new Project.
     *
     * @param array $parameters
     *
     * @return ProjectInterface
     */
    public function post(array $parameters)
    {
        $project = $this->createProject();
        return $this->processForm($project, $parameters, 'POST');
    }

    /**
     * Edit a Project.
     *
     * @param ProjectInterface $project
     * @param array         $parameters
     *
     * @return ProjectInterface
     */
    public function put(ProjectInterface $project, array $parameters)
    {
        return $this->processForm($project, $parameters, 'PUT');
    }

    /**
     * Partially update a Project.
     *
     * @param ProjectInterface $project
     * @param array         $parameters
     *
     * @return ProjectInterface
     */
    public function patch(ProjectInterface $project, array $parameters)
    {
        return $this->processForm($project, $parameters, 'PATCH');
    }

    public function delete(ProjectInterface $project)
    {
        $this->em->remove($project);
        $this->em->flush();
    }

    /**
     * Processes the form.
     *
     * @param ProjectInterface $project
     * @param array         $parameters
     * @param String        $method
     *
     * @return ProjectInterface
     *
     * @throws \DataBundle\Exception\InvalidFormException
     */
    private function processForm(ProjectInterface $project, $parameters, $method = "PUT")
    {
//        $method == "PATCH" ? $form = $this->formFactory->create(new ApiProjectPATCHType(), $project, array('method' => $method)) : $form = $this->formFactory->create(new ApiProjectType(), $project, array('method' => $method)); 
//        $form->submit($parameters);
        $form = $this->formFactory->create(new ApiProjectType(), $project, array('method' => $method));
        dump($form);
        //var_dump($form);
        $form->submit($parameters[$form->getName()]);
        //$form->submit($parameters);
        if ($form->isValid()) {
            $project = $form->getData();
            $this->em->persist($project);
            $this->em->flush($project);

            return $project;
        }

        throw new InvalidFormException($form->getErrors(), $form);
    }

    private function createProject()
    {
        return new $this->entityClass();
    }

}
