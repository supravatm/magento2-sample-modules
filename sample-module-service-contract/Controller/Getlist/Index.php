<?php

namespace Certification\ServiceContract\Controller\Getlist;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

use \Magento\Framework\Api\SearchCriteriaBuilder;

use Certification\ServiceContract\Model\ServiceModelFactory;
use Certification\ServiceContract\Model\ServiceModelRepository;

class Index extends Action
{
    public function __construct(
        Context $context,
        SearchCriteriaBuilder $searchCriteriaBuilder,
        ServiceModelRepository $modelRepository
    )
    {
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
        $this->modelRepository = $modelRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $_filter = $this->searchCriteriaBuilder
            ->addFilter("status", 1, "eq")->create();
        $list = $this->modelRepository->getList($_filter);
        $results = $list->getItems();
        foreach ($results as $result) {
            var_dump($result->getData());
        }

    }
}
