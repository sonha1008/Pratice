<?php  
namespace OpenTechiz\Blog\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
* 
*/
class UpgradeSchema implements UpgradeSchemaInterface
{
	
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();

		//create comment table
		$table = $installer->getConnection()
		->newTable($installer->getTable('opentechiz_blog_comment'))
		->addColumn(
			'comment_id',
			Table::TYPE_SMALLINT,
			null,
			['identity' => true, 'nullable' => false, 'primary' => true],
			'Comment_ID'
			)
		->addColumn(
			'user_id',
			Table::TYPE_SMALLINT,
			null,
			['nullable' => false],
			'User_ID'
			)
		->addColumn(
			'post_id',
			Table::TYPE_SMALLINT,
			null,
			['nullable' => false],
			'Post_ID'
			)
		->addColumn(
			'comment',
			Table::TYPE_TEXT,
			'2M',
			[], 
			'Comment Content'
			)
		->addColumn(
			'email',
			Table::TYPE_TEXT,
			'2M',
			[], 
			'email'
			)
		->addColumn(
			'pending',
			Table::TYPE_SMALLINT,
			[], 
			'Pending'
			)
		->addColumn(
			'creation_time', 
			Table::TYPE_DATETIME, null , 
			['nullable' => false], 
			'Creation Time')
		->addColumn(
			'update_time', 
			Table::TYPE_DATETIME, 
			null, 
			['nullable' =>false], 
			'Update Time');
		$installer->getConnection() -> createTable($table);
		$installer->endSetup();
	}
}