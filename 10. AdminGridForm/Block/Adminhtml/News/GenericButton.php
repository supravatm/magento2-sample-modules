<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace SMG\News\Block\Adminhtml\News;

use Magento\Backend\Block\Widget\Context;
use SMG\News\Model\NewsFactory;
use SMG\News\Model\ResourceModel\News as ObjectResourceModel;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Class GenericButton
 */
class GenericButton
{
    /**
     * @var Context
     */
    protected $context;

    /**
     * @var NewsFactory
     */
    protected $newsFactory;

    /**
     * @var ObjectResourceModel
     */
    protected $objectResourceModel;

    /**
     * @param Context $context
     * @param NewsFactory $newsFactory
     */
    public function __construct(
        Context $context,
        NewsFactory $newsFactory,
        ObjectResourceModel $objectResourceModel
    ) {
        $this->context = $context;
        $this->newsFactory = $newsFactory;
        $this->objectResourceModel = $objectResourceModel;
    }

    /**
     * Return product News ID
     *
     * @return int|null
     */
    public function getNewsId()
    {
        try {
            $id = $this->context->getRequest()->getParam('comment_id');
            $newsObject = $this->newsFactory->create();
            $this->objectResourceModel->load($newsObject, $id);
            return $newsObject->getId();

        } catch (NoSuchEntityException $e) {
        }
        return null;
    }

    /**
     * Generate url by route and parameters
     *
     * @param   string $route
     * @param   array $params
     * @return  string
     */
    public function getUrl($route = '', $params = [])
    {
        return $this->context->getUrlBuilder()->getUrl($route, $params);
    }
}
