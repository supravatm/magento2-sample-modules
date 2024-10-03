<?php

namespace SMG\CustomCache\Model\Cache;

class Type extends \Magento\Framework\Cache\Frontend\Decorator\TagScope
{
    /**
     * Type Code for Cache. It should be unique
     */
    const TYPE_IDENTIFIER = 'smg_custom_cache';

    /**
     * Tag of Cache
     */
    const CACHE_TAG = 'SMG_CUSTOM_CACHE';

    /**
     * @param \Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool
     */
    public function __construct(    
        \Magento\Framework\App\Cache\Type\FrontendPool $cacheFrontendPool
    ){
        parent::__construct(    
            $cacheFrontendPool->get(self::TYPE_IDENTIFIER), 
            self::CACHE_TAG
        );
    }
}