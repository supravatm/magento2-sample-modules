<?php

namespace Learning\FrontendCrud\Controller\service;

use Learning\FrontendCrud\Model\ItemRepository;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

class Index extends Action
{
    public function __construct(
        Context $context,
        ItemRepository $itemRepository,
        SearchCriteriaBuilder $searchCriteriaBuilder
    ) {
        $this->itemRepository = $itemRepository;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        parent::__construct($context);
    }

    public function execute()
    {
        // TODO: Get Collection.
        $data = $this->itemRepository->getById(4);
        echo "<pre>";
        print_r($data->getData());

        $searchCriteria = $this->searchCriteriaBuilder->addFilter(
            'id',
            0,
            'gt'
        )->create();

        $items = $this->itemRepository->getList($searchCriteria);
        foreach ($items->getItems() as $value) {
            print_r($value->getData());
        }

        die;
    }
}
