<?php

namespace App\Entities\Blog;

use App\Entities\EntityInterface;
use App\Entities\User;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('comments')]
class Comment implements EntityInterface
{
    public const TABLE_NAME = 'comments';

    public const CONTENT = 'content';
    public const AUTHOR_ID = 'author_id';
    public const POST_ID = 'post_id';

    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    protected int $id;

    #[Column(type: 'string')]
    protected string $content;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'comments')]
    protected User $author;

    #[ManyToOne(targetEntity: Post::class, inversedBy: 'comments')]
    protected Post $post;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }

    public function setAuthor(User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): self
    {
        $this->post = $post;

        return $this;
    }
}
