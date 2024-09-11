<?php

namespace Learning\FrontendCrud\Helper;

use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\Request\DataPersistorInterface;
use Psr\Log\LoggerInterface;

class Data extends AbstractHelper
{
    protected $_customerSession;
    private $postData = null;
    private $dataPersistor;

    public function __construct(
        Context $context,
        CustomerSession $customerSession,
        LoggerInterface $logger = null
    ) {
        $this->_customerSession = $customerSession;
        $this->_logger = $logger ?: ObjectManager::getInstance()->get(LoggerInterface::class);
        parent::__construct($context);
    }

    public function getUserName()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return '';
        }
        /**
         * @var CustomerInterface $customer
         */
        $customer = $this->_customerSession->getCustomerDataObject();
        return $customer->getFirstname() . " " . $customer->getLastname();
    }

    public function getUserEmail()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            $this->_logger->debug("Customer is not logged");
            return '';
        }
        /**
         * @var CustomerInterface $customer
         */
        $customer = $this->_customerSession->getCustomerDataObject();
        $this->_logger->debug($customer->getEmail());
        return $customer->getEmail();
    }

    public function getPostValue($key)
    {
        $this->_logger->debug($key);
        if (null === $this->postData) {
            $this->postData = (array)$this->getDataPersistor()->get('crud_form');
            $this->getDataPersistor()->clear('crud_form');
        }

        if (isset($this->postData[$key])) {
            return (string)$this->postData[$key];
        }

        return '';
    }

    private function getDataPersistor()
    {
        if ($this->dataPersistor === null) {
            $this->dataPersistor = ObjectManager::getInstance()
                ->get(DataPersistorInterface::class);
        }

        return $this->dataPersistor;
    }
}
