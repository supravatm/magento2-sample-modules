<?php

namespace Certification\ServiceContract\Controller\Save;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\App\Action\Context;

use Certification\ServiceContract\Model\ServiceModelFactory;
use Certification\ServiceContract\Model\ServiceModelRepository;

class Index extends Action
{
    public function __construct(
        Context $context,
        ServiceModelFactory $modelFactory,
        ServiceModelRepository $modelRepository
    )
    {
        $this->modelFactory = $modelFactory;
        $this->modelRepository = $modelRepository;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = [
            "id" => null,
            "first_name" => "supravat",
            "last_name" => "Mondal",
            "email" => "supravat.mondal@gmail.com",
            "status" => 1,
            "store_id" => 1
        ];
        $obj = $this->modelFactory->create();
        $this->modelRepository->save($obj->addData($data)); // Service Contract
        die("Saved");
    }
}
