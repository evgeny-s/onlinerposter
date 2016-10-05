<?php

namespace DataBundle\Manager;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

abstract class AbstractEntityManager
{
    /**
     * @var EntityRepository
     */
    protected $repository;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param EntityRepository $repository
     */
    public function __construct(EntityRepository $repository)
    {
        $this->repository = $repository;

    }

    /**
     * @param EntityManager $em
     */
    public function setEntityManager($em)
    {
        $this->em = $em;
    }

    //public function

    /**
     * @return object
     */
    public function create()
    {
        $class = $this->repository->getClassName();

        return new $class;
    }

    /**
     * @param object $entity
     * @param bool   $flush
     *
     * @throws \Exception
     */
    public function save($entity, $flush = true)
    {
        $this->em->persist($entity);
        $this->em->flush();
    }

    /**
     * @param object|array|int $entity
     *
     * @throws \Exception
     */
    public function remove($entity)
    {
        $this->em->remove($entity);
        $this->em->flush();
    }
}
