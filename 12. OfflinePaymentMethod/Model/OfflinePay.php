<?php
namespace SMG\OfflinePaymentMethod\Model;

class OfflinePay extends \Magento\Payment\Model\Method\AbstractMethod
{
    /**
     * Payment Method code
     *
     * @var string
     */
    protected $_code = 'offlinepay';
}