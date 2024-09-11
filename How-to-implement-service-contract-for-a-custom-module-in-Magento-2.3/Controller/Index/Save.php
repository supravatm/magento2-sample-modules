<?php

namespace Learning\FrontendCrud\Controller\Index;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Request\DataPersistorInterface;
use Psr\Log\LoggerInterface;
use Magento\Framework\App\ObjectManager;
use Learning\FrontendCrud\Model\Item;
use Magento\Framework\Message\ManagerInterface;

class Save extends Action
{
    private $dataPersistor;

    public function __construct(Context $context, DataPersistorInterface $dataPersistor, LoggerInterface $logger = null, Item $item, ManagerInterface $manager)
    {
        $this->dataPersistor = $dataPersistor;
        $this->logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
        $this->item = $item;
        $this->manager = $manager;
        parent::__construct($context);
    }

    public function execute()
    {
        if (!$this->getRequest()->isPost()) {
            $this->dataPersistor->clear('crud_form');
            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }
        try {
            if($id = $this->getRequest()->getParam('id')){
                $this->item->load($id);
                $this->item->addData($this->getRequest()->getParams());
                $this->item->save();
                $this->manager->addSuccessMessage('Successfuly Updated');
            } else {
                $this->item->addData($this->getRequest()->getParams());
                $this->item->save();
                $this->manager->addSuccessMessage('Successfuly Saved');
            }
            $this->dataPersistor->clear('crud_form');
        } catch (Exception $ex) {
            $this->dataPersistor->set('crud_form', $this->getRequest()->getParams());
            $this->manager->addErrorMessage('Unable to save');
        }
        $this->logger->debug(print_r($this->getRequest()->getParams(), true));

        return $this->resultRedirectFactory->create()->setPath('*/*/');
    }
}
