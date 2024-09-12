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
    const CACHE_TAG = 'smg_blog_post_item';
    protected $_cacheTag = 'smg_blog_post_item';
    protected $_eventPrefix = 'smg_blog_post_item';

    protected function _construct()
    {
        $this->_init(ResourceModel\Post::class);
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getData(PostInterface::ID);
    }

    /**
     * Retrieve post author
     * @inheritdoc
     * @return string
     */
    public function getAuthor()
    {
        return $this->getData(PostInterface::AUTHOR);
    }
    /**
     * Retrieve post title
     * @inheritdoc
     * @return string
     */
    public function getTitle()
    {
        return $this->getData(PostInterface::TITLE);
    }

    /**
     * Retrieve post content
     * @inheritdoc
     * @return string
     */
    public function getContent()
    {
        return $this->getData(PostInterface::CONTENT);
    }

    /**
     * Retrieve post creation time
     * @inheritdoc
     * @return string
     */
    public function getCreationTime()
    {
        return $this->getData(PostInterface::CREATION_TIME);
    }

    /**
     * Retrieve post update time
     * @inheritdoc
     * @return string
     */
    public function getUpdateTime()
    {
        return $this->getData(PostInterface::UPDATE_TIME);
    }

    /**
     * Is active
     * @inheritdoc
     * @return bool
     */
    public function isActive()
    {
        return (bool)$this->getData(PostInterface::IS_ACTIVE);
    }

    /**
     * Set ID
     * @inheritdoc
     * @param int $id
     * @return PostInterface
     */
    public function setId($id)
    {
        return $this->setData(PostInterface::ID, $id);
    }

    /**
     * set author
     * @inheritdoc
     * @param string $author
     * @return PostInterface
     */
    public function setAuthor($author)
    {
        return $this->setData(PostInterface::AUTHOR, $author);
    }

    /**
     * Set title
     * @inheritdoc
     * @param string $title
     * @return PostInterface
     */
    public function setTitle($title)
    {
        return $this->setData(PostInterface::TITLE, $title);
    }

    /**
     * Set content
     * @inheritdoc
     * @param string $content
     * @return PostInterface
     */
    public function setContent($content)
    {
        return $this->setData(PostInterface::CONTENT, $content);
    }

    /**
     * Set creation time
     * @inheritdoc
     * @param string $creationTime
     * @return PostInterface
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(PostInterface::CREATION_TIME, $creationTime);
    }

    /**
     * Set update time
     * @inheritdoc
     * @param string $updateTime
     * @return PostInterface
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(PostInterface::UPDATE_TIME, $updateTime);
    }

    /**
     * Set is active
     * @inheritdoc
     * @param bool|int $isActive
     * @return PostInterface
     */
    public function setIsActive($isActive)
    {
        return $this->setData(PostInterface::IS_ACTIVE, $isActive);
    }

    public function getExtensionAttributes()
    {
        return $this->_getExtensionAttributes();
    }

    public function setExtensionAttributes(HamburgerExtensionInterface $extensionAttributes)
    {
        $this->_setExtensionAttributes($extensionAttributes);
    }

    public function afterDeleteCommit()
    {
        $this->getResource()->deleteStores($this->getId());
        parent::afterDeleteCommit();
    }

    public function afterSave()
    {
        $this->getResource()->saveRelationStore($this->getId(), $this->getStoreId());
    }
}