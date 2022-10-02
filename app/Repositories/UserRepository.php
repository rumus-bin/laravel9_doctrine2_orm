<?php

namespace App\Repositories;

use App\Entities\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends AbstractRepository
{
    public function create(string $name, string $email, string $password): User
    {
        $user = new User($name, $email, bcrypt($password));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }

    public function index(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findById(int $id): User
    {
        return $this->getRepository()->find($id);
    }

    public function getRepository(): EntityRepository
    {
        return $this->entityManager->getRepository(User::class);
    }
}
