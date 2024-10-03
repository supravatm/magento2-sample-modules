<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace SMG\Blog\Model;

use SMG\Blog\Api\Data\PostSearchResultsInterface;
use Magento\Framework\Api\SearchResults;

/**
 * Service Data Object with Block search results.
 */
class PostSearchResults extends SearchResults implements PostSearchResultsInterface
{
}