<?php

namespace Certification\SampleAdminForm\Controller\Adminhtml\Index;

use \Magento\Backend\App\Action;
use \Magento\Framework\Controller\ResultFactory;

class Index extends Action
{
    public function __construct(
        Action\Context $context,
        ResultFactory $resultFactory
    )
    {
        $this->resultFactory = $resultFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
