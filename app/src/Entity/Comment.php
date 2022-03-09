<?php

namespace App\Entity;

use App\Core\Factory\PDOFactory;
use App\Manager\UserManager;
use DateTime;
use Exception;

class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private DateTime $createdAt;
    private int $authorId;
    private int $postId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    protected function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param string $createdAt
     * @return Comment
     * @throws Exception
     */
    public function setCreatedAt(string $createdAt): self
    {
        $this->createdAt = new DateTime($createdAt);
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        $manager = new UserManager(PDOFactory::getInstance());
        return $manager->findById($this->authorId);
    }

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return Comment
     */
    public function setAuthorId(int $authorId): self
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return Comment
     */
    public function setPostId(int $postId): self
    {
        $this->postId = $postId;
        return $this;
    }


}