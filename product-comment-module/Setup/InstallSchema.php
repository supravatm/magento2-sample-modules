<?php

namespace Certification\ProductComment\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable('product_comment')
        )->addColumn(
            'comment_id',
            Table::TYPE_SMALLINT,
            null,
            ['identity' => true, 'nullable' => false, 'primary' => true],
            'Product Comment ID'
        )->addColumn(
            'product_id',
            Table::TYPE_SMALLINT,
            255,
            [],
            'Product ID'
        )->addColumn(
            'customer_id',
            Table::TYPE_SMALLINT,
            255,
            [],
            'Customer ID'
        )->addColumn(
            'customer_guest',
            Table::TYPE_TEXT,
            '2M',
            [],
            'Guest Customer'
        )->addColumn(
            'customer_email',
            Table::TYPE_TEXT,
            '2M',
            [],
            'customer email'
        )->addColumn(
            'customer_comment',
            Table::TYPE_TEXT,
            '2M',
            [],
            'customer_comment'
        )->addColumn(
                'created_at',
                Table::TYPE_DATE,
                255,
                ['nullable' => false],
                'Created At'
            )
            ->setComment(
                'Product Comment Table'
            );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}
