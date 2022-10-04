<?php

namespace App\Repositories\Blog;

use App\Entities\Blog\Post;
use App\Repositories\AbstractRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectRepository;

class PostRepository extends AbstractRepository
{
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findById(int $id): ?Post
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param Post $post
     * @return void
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function store(Post $post)
    {
        $this->entityManager->persist($post);
        $this->entityManager->flush();
    }

    public function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository(Post::class);
    }
}
