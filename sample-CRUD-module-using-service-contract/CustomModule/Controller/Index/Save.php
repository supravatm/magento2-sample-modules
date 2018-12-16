<?php

namespace Stackexchange\CustomModule\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;

class Save extends \Magento\Framework\App\Action\Action
{

    /**
     * Index resultPageFactory
     * @var PageFactory
     */
    private $resultPageFactory;
    /**
     * @var
     */
    private $modelFactory;
    /**
     * @var
     */
    private $modelRepository;


    /**
     * Index constructor.
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param \Stackexchange\CustomModule\Model\ModelFactory $modelFactory
     * @param \Stackexchange\CustomModule\Model\ModelRepository $modelRepository
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Stackexchange\CustomModule\Model\ModelFactory $modelFactory,
        \Stackexchange\CustomModule\Model\ModelRepository $modelRepository
) {
        $this->resultPageFactory = $resultPageFactory;
        $this->modelFactory = $modelFactory;
        $this->modelRepository = $modelRepository;
        return parent::__construct($context);


    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = [

            "product_id" => 201,
            "customer_name" => "Katrina",
            "customer_email" => "karina@kapoor.com",
            "spouse" => 1
        ];

        $obj = $this->modelFactory->create();

        $this->modelRepository->save($obj->addData($data)); // Service Contract


        //$obj->addData($data)->save(); // Model / Resource Model

        $this->resultFactory->create("raw");
    }
}
