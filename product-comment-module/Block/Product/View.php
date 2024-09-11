<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Certification\ProductComment\Block\Product;

use \Magento\Catalog\Api\ProductRepositoryInterface;
use \Certification\ProductComment\Model\ResourceModel\ProductComment\Collection as CommentCollection;

/**
 * Product Reviews Page
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class View extends \Magento\Catalog\Block\Product\View
{
    /**
     * Comment collection
     *
     * @var CommentCollection
     */
    protected $commentCollection;

    protected $_commentColFactory;


    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\EncoderInterface $urlEncoder,
        \Magento\Framework\Json\EncoderInterface $jsonEncoder,
        \Magento\Framework\Stdlib\StringUtils $string,
        \Magento\Catalog\Helper\Product $productHelper,
        \Magento\Catalog\Model\ProductTypes\ConfigInterface $productTypeConfig,
        \Magento\Framework\Locale\FormatInterface $localeFormat,
        \Magento\Customer\Model\Session $customerSession,
        ProductRepositoryInterface $productRepository,
        \Magento\Framework\Pricing\PriceCurrencyInterface $priceCurrency,
        \Certification\ProductComment\Model\ResourceModel\ProductComment\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_commentColFactory = $collectionFactory;
        parent::__construct(
            $context,
            $urlEncoder,
            $jsonEncoder,
            $string,
            $productHelper,
            $productTypeConfig,
            $localeFormat,
            $customerSession,
            $productRepository,
            $priceCurrency,
            $data
        );
    }

    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        $this->getProduct()->setShortDescription(null);

        return parent::_toHtml();
    }



    /**
     * Get collection of Comments
     *
     * @return CommentCollection
     */
    public function getCommentsCollection()
    {
        if (null === $this->commentCollection) {

            $collection = $this->_commentColFactory->create()->addFieldToFilter(
                'product_id',
                $this->getProductId()
            );

            $this->commentCollection = $this->_commentColFactory->create()->addFieldToFilter(
                'product_id',
                $this->getProduct()->getId()
            );
        }
        return $this->commentCollection;
    }
}
