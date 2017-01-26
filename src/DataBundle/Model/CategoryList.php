<?php

namespace DataBundle\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryList
{

    private $em;
    private $entityClass;
    private $repository;
    private $categories;

    public function __construct(ObjectManager $em, $entityClass)
    {
        $this->em = $em;
        $this->entityClass = $entityClass;
        $this->repository = $this->em->getRepository($this->entityClass);
        $this->categories = [];
    }

    public function getCategoryList()
    {
        $parents = $this->getParentCategory();
        foreach ($parents as $parent) {
            $this->categories[$parent->getName()] = [$parent->getId()];
            foreach ($this->repository->getChildren($parent) as $child) {
                $this->categories[$parent->getName()][] = $child;
            }
        }
        return $this->categories;
    }

    private function getParentCategory()
    {
        return $this->repository->getParents();
    }

}
