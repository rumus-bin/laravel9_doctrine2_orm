<?php

namespace App\Entities\Blog;

use App\Entities\User;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;

#[Entity]
#[Table('posts')]
class Post
{
    public const TABLE_NAME = 'posts';

    public const CONTENT = 'content';
    public const TITLE = 'title';
    public const AUTHOR_ID = 'author_id';
    public const COMMENTS = 'comments';

    #[Id]
    #[GeneratedValue]
    #[Column(type: 'integer')]
    protected int $id;

    #[Column(type: 'string')]
    protected string $title;

    #[Column(type: 'string')]
    protected string $content;

    #[ManyToOne(targetEntity: User::class, inversedBy: 'posts')]
    protected User $author;

    #[OneToMany(mappedBy: 'post', targetEntity: Comment::class, cascade: ['persist'])]
    protected Collection $comments;

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

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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

    /**
     * @return Collection
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }
}
