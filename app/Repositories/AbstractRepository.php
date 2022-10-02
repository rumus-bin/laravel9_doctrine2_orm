<?php

namespace App\Repositories;

use Doctrine\ORM\EntityManager;

abstract class AbstractRepository
{
    public function __construct(
        protected EntityManager $entityManager
    ) {
    }

    abstract public function getRepository();
}
