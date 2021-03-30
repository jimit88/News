<?php
namespace Jimit\News\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();
        $tableName = $installer->getTable('jimit_news_data');

        if (!$installer->tableExists('jimit_news_data')) {
            $table = $installer->getConnection()
                ->newTable($tableName)
                ->addColumn(
                    'data_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity' => true,
                        'unsigned' => true,
                        'nullable' => false,
                        'primary' => true
                    ],
                    'Data ID'
                )
                ->addColumn(
                    'data_title',
                    Table::TYPE_TEXT,
                    255,
                    ['nullable' => false, 'default' => ''],
                    'Data Title'
                )
                ->addColumn(
                    'data_image',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => true, 'default' => ''],
                    'Data Image'
                )
                ->addColumn(
                    'data_description',
                    Table::TYPE_TEXT,
                    null,
                    ['nullable' => false, 'default' => ''],
                    'Data Description'
                )
                ->addColumn(
                    'is_active',
                    Table::TYPE_SMALLINT,
                    null,
                    ['unsigned' => true, 'nullable' => false, 'default' => '0'],
                    'Status'
                );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
