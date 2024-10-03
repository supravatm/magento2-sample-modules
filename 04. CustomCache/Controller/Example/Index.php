<?php
namespace SMG\CustomCache\Controller\Example;

class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \SMG\CustomCache\Helper\Cache
     */
    protected $customCacheHepler;

    /**
     * @var \Magento\Framework\Serialize\SerializerInterface
     */
    protected $serializer;

    /**
     * Construct CacheExample
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \SMG\CustomCache\Helper\Cache $customCacheHepler
     * @param \Magento\Framework\Serialize\SerializerInterface $serializer
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \SMG\CustomCache\Helper\Cache $customCacheHepler,
        \Magento\Framework\Serialize\SerializerInterface $serializer
    ) {
        $this->resultPageFactory    = $resultPageFactory;
        $this->customCacheHepler   = $customCacheHepler;
        $this->serializer           = $serializer;
        parent::__construct($context);
    }

    /**
     * Loads page content
     *
     * @return \Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        /*
         * Check if menu is saved in cache
         */
        $cacheId = $this->customCacheHepler->getId("smgcache");
        if($cache = $this->customCacheHepler->load($cacheId)){
            echo "Check if cache is saved in custom cache tag <br/>";
            print_r($cache);
        }
        if(!$cache = $this->customCacheHepler->load($cacheId))
        {
            $html = "<h4>Magento 2 custom cache type for improving the page load time</h4>";
            /*
            * Save HTML to cache
            */
            $this->customCacheHepler->save($html, $cacheId);
            echo "Save HTML to custom cache tag <br/>";
            print_r($cache);
        }
        return $this->resultPageFactory->create('raw');
    }
}