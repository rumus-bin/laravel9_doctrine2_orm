<?php

namespace App\Entities;

use App\Entities\Blog\Post;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Support\Carbon;

#[Entity]
#[Table(name: 'users')]
class User
{
    public const TABLE_NAME = 'users';

    public function __construct(
        string $name,
        string $email,
        string $password
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    #[Id, Column(type: 'integer'), GeneratedValue()]
    protected int $id;

   #[Column(type: 'string')]
    protected string $name;

   #[Column(type: 'string')]
    protected string $email;

    #[Column(type: 'datetime')]
    protected Carbon $emailVerifiedAt;

    #[Column(type: 'string')]
    protected string $password;

    #[Column(type: 'string')]
    protected string $rememberToken;

    #[Column(type: 'datetime')]
    protected Carbon $createdAt;

    #[Column(type: 'datetime')]
    protected Carbon $updatedAt;

    #[OneToMany(mappedBy: 'author', targetEntity: Post::class, cascade: ['persist'])]
    /**
     * @var Collection<Post> $posts
     */
    protected Collection $posts;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Carbon
     */
    public function getEmailVerifiedAt(): Carbon
    {
        return $this->emailVerifiedAt;
    }

    /**
     * @param Carbon $emailVerifiedAt
     */
    public function setEmailVerifiedAt(Carbon $emailVerifiedAt): void
    {
        $this->emailVerifiedAt = $emailVerifiedAt;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getRememberToken(): string
    {
        return $this->rememberToken;
    }

    /**
     * @param string $rememberToken
     */
    public function setRememberToken(string $rememberToken): void
    {
        $this->rememberToken = $rememberToken;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     */
    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     */
    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function addPost(Post $post): self
    {
        if (! $this->posts->contains($post)) {
            $post->setAuthor($this);
            $this->posts->add($post);
        }

        return $this;
    }
}
