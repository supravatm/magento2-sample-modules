<?php

namespace Learning\FrontendCrud\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Learning\FrontendCrud\Model\Item;
use Magento\Framework\Message\ManagerInterface;

class Delete extends Action
{
    private $dataPersistor;

    public function __construct(Context $context, DataPersistorInterface $dataPersistor, LoggerInterface $logger = null, Item $item , ManagerInterface $manager)
    {
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
        $this->item = $item;
        $this->manager = $manager;
        parent::__construct($context);
    }

    public function execute()
    {
        //$this->dataPersistor->set('crud_form', $this->getRequest()->getParams());

        $this->item->load($this->getRequest()->getParam('id'));
        $this->item->delete();
        
        $this->logger->debug(print_r($this->getRequest()->getParams(),true));
        $this->manager->addSuccess('Deleted');
        return $this->resultRedirectFactory->create()->setPath('*/*/');
    }
}
