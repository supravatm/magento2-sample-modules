<?php
namespace Stackexchange\CustomModule\Setup;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
class InstallSchema implements InstallSchemaInterface {
    public function install( SchemaSetupInterface $setup, ModuleContextInterface $context ) {
        $installer = $setup;
        $installer->startSetup();
        $table = $installer->getConnection()->newTable(
            $installer->getTable( 'ad_shipping_quote' )
        )->addColumn(
            'entity_id',
            Table::TYPE_SMALLINT,
            null,
            [ 'identity' => true, 'nullable' => false, 'primary' => true ],
            'Post ID'
        )->addColumn(
            'product_id',
            Table::TYPE_SMALLINT,
            255,
            [ ],
            'Post ID'
        )
            ->addColumn(
            'customer_name',
            Table::TYPE_TEXT,
            255,
            [ 'nullable' => false ],
            'Post Title'
        )

            ->addColumn(
            'customer_email',
            Table::TYPE_TEXT,
            '2M',
            [ ],
            'Post Content'
        ) ->addColumn(
                'customer_comments',
                Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Post Title'
            )->addColumn(
                'date_added',
                Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Post Title'
            )->addColumn(
                'date_updated',
                Table::TYPE_TEXT,
                255,
                [ 'nullable' => false ],
                'Post Title'
            )
            ->setComment(
            'Ad Shipping Quote Table'
        );
        $installer->getConnection()->createTable( $table );
        $installer->endSetup();
    }
}
