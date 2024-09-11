<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */ 
namespace SMG\Blog\Model;

use Magento\Framework\Model\AbstractModel; 
use Magento\Framework\Model\AbstractExtensibleModel;
use SMG\Blog\Api\Data\PostExtensionInterface;
use SMG\Blog\Api\Data\PostInterface;

class Post extends AbstractExtensibleModel implements PostInterface
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }
    /**
     * Retrieve post id
     *
     * @return int
     */
    public function getId()
    {
        return $this->getData(PostInterface::POST_ID);
    }

    /**
     * Retrieve post title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(PostInterface::TITLE);
    }

    /**
     * Retrieve post content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData(PostInterface::CONTENT);
    }

    /**
     * Retrieve post creation time
     *
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(PostInterface::CREATION_TIME);
    }

    /**
     * Retrieve post update time
     *
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(PostInterface::UPDATE_TIME);
    }

    /**
     * Is active
     *
     * @return bool
     */
    public function isActive()
    {
        return (bool)$this->getData(PostInterface::IS_ACTIVE);
    }

    /**
     * Set ID
     *
     * @param int $id
     * @return PostInterface
     */
    public function setId($id)
    {
        return $this->setData(PostInterface::POST_ID, $id);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return PostInterface
     */
    public function setTitle($title)
    {
        return $this->setData(PostInterface::TITLE, $title);
    }

    /**
     * Set content
     *
     * @param string $content
     * @return PostInterface
     */
    public function setContent($content)
    {
        return $this->setData(PostInterface::CONTENT, $content);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return PostInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(PostInterface::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return PostInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(PostInterface::UPDATE_TIME, $updateTime);
    }

    /**
     * Set is active
     *
     * @param bool|int $isActive
     * @return PostInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(PostInterface::IS_ACTIVE, $isActive);
    }

    public function getExtensionAttributes()
    {
        return $this->getExtensionAttributes();
    }

    public function setExtensionAttributes(PostExtensionInterface $extensionAttributes)
    {
        $this->setExtensionAttributes($extensionAttributes);
    }

}