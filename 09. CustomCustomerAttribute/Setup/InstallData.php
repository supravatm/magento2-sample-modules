<?php


namespace SMG\CustomCustomerAttribute\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{
    private $_eavSetupFactory;
    private $_attributeRepository;

    const ATTRIBUTE_CODE = 'order_limit';

    public function __construct(
        \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        \Magento\Eav\Model\AttributeRepository $attributeRepository
	)
	{
		$this->_eavSetupFactory = $eavSetupFactory;
		$this->_attributeRepository = $attributeRepository;
	}

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->_eavSetupFactory->create(['setup' => $setup]);

        $customer_attribute = 'order_limit';

        // add order_limit to customer
        $eavSetup->removeAttribute(\Magento\Customer\Model\Customer::ENTITY, self::ATTRIBUTE_CODE);
        $eavSetup->addAttribute(
            \Magento\Customer\Model\Customer::ENTITY, self::ATTRIBUTE_CODE, [
                'type' => 'varchar',
                'label' => 'Order Limit',
                'input' => 'text',
                'required' => false,
                'system' => 0,
                'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
                'sort_order' => '200'
            ]
        );

        // allow attribute to be saved in the specific areas
        $attribute = $this->_attributeRepository->get(\Magento\Customer\Model\Customer::ENTITY, self::ATTRIBUTE_CODE);
        $setup->getConnection()
            ->insertOnDuplicate(
                $setup->getTable('customer_form_attribute'),
                [
                    ['form_code' => 'adminhtml_customer', 'attribute_id' => $attribute->getId()],
                    ['form_code' => 'customer_account_create', 'attribute_id' => $attribute->getId()],
                    ['form_code' => 'customer_account_edit', 'attribute_id' => $attribute->getId()],
                ]
            );
    }
}