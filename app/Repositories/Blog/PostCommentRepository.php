<?php

namespace App\Repositories\Blog;

use App\Entities\Blog\Comment;
use App\Repositories\AbstractRepository;
use Doctrine\Persistence\ObjectRepository;

class PostCommentRepository extends AbstractRepository
{
    public function findAll(): array
    {
        return $this->getRepository()->findAll();
    }

    public function findById(int $id): ?Comment
    {
        return $this->getRepository()->find($id);
    }

    /**
     * @param Comment $comment
     * @return void
     * @throws \Doctrine\ORM\Exception\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function store(Comment $comment)
    {
        $this->entityManager->persist($comment);
        $this->entityManager->flush();
    }

    public function getRepository(): ObjectRepository
    {
        return $this->entityManager->getRepository(Comment::class);
    }
}
