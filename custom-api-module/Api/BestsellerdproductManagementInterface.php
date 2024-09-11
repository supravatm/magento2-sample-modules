<?php

/**
 * Product type provider
 *
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Stackexchange\CustomAPI\Api;

/**
 * @api
 */

interface BestsellerdproductManagementInterface
{

    /**
     * Get product list
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Catalog\Api\Data\ProductSearchResultsInterface
     */

    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

}