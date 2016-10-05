<?php

namespace DataBundle\Manager;

use DataBundle\Repository\ProverbRepository;

/**
 * Class ProverbManager
 */
class ProverbManager extends AbstractEntityManager
{
    /**
     * @var ProverbRepository
     */
    protected $repository;
}
