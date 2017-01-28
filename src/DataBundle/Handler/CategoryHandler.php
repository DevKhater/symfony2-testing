<?php

namespace DataBundle\Handler;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryHandler
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
            foreach ($this->getChildrenCategory($parent) as $child) {
                $this->categories[$parent->getName()][] = $child;
            }
        }
        return $this->categories;
    }
    
    public function get($id)
    {
        return $this->repository->find($id);
    }

    public function addParentCategory($name)
    {
        $cat = $this->createCategory();
        $cat->setName($name);
        $cat->setParent(0);
        $this->em->persist($cat);
        $this->em->flush($cat);
        return $cat;
    }

    public function addChildCategory($parent, $child)
    {
        
        $cat = $this->createCategory();
        $cat->setName($child);
        $cat->setParent($parent);
        $this->em->persist($cat);
        $this->em->flush($cat);
        return $cat;
    }
    
    
    public function delete($category)
    {
        $children = $this->getChildrenCategory($category);
        if ($children) {
            foreach ($children as $child){
                $this->em->remove($child);
                $this->em->flush();
            }
        }
        $this->em->remove($category);
        $this->em->flush();
        return $this->getCategoryList();
    }
    
    private function createCategory()
    {
        return new $this->entityClass();
    }
    
    private function getParentCategory()
    {
        return $this->repository->getParents();
    }

    private function getChildrenCategory($parent)
    {
        return $this->repository->getChildren($parent);
    }
}
