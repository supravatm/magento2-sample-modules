<?php

namespace SMG\Blog\Api\Data;

interface PostInterface
{
    const ID            = 'post_id';
    const AUTHOR        = 'author';
    const TITLE         = 'title';
    const CONTENT       = 'content';
    const IS_ACTIVE     = 'is_active';
    const CREATION_TIME   = 'creation_time';
    const UPDATE_TIME     = 'update_time';

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getAuthor();

    /**
     * @return string
     */
    public function getTitle();

    /**
     * @return string
     */
    public function getContent();

    /**
     * @return string
     */
    public function getCreationTime();

    /**
     * @return string
     */
    public function getUpdateTime();

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor($author);

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * @param string $creationTime
     * @return $this
     */
    public function setCreationTime($creationTime);

    /**
     * @param string $updateTime
     * @return $this
     */
    public function setUpdateTime($updateTime);
    
}