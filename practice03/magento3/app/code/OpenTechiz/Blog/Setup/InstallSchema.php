<?php  
namespace OpenTechiz\Blog\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

/**
* 
*/
class InstallSchema implements InstallSchemaInterface
{
	
	public function install (SchemaSetupInterface $setup, ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		$table = $installer->getConnection()
		->newTable($installer->getTable('opentechiz_blog_post'))
		->addColumn(
			'post_id',
			Table::TYPE_SMALLINT,
			NULL,
			['identity' => true, 'nullable' => false, 'primary' => true],
			'Post_ID'
		)
		->addColumn(
			'url_key', 
			Table::TYPE_TEXT, 
			100, 
			['nullable' => true, 'default' => null])
		->addColumn(
			'title', 
			Table::TYPE_TEXT, 255, 
			['nullable' => false, 'Blog Title'])
		->addColumn(
			'content', 
			Table::TYPE_TEXT, 
			'2M', 
			[], 
			'Blog Content')
		->addColumn(
			'is_active', 
			Table::TYPE_SMALLINT, NULL, 
			['nullable' => false,'default' =>'1'], 'Is Post Active?')
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
			'Update Time')
		->addIndex($installer->getIdxName('blog_post', ['url_key']), ['url_key'])
		->setComment('Blog posts');
		$installer->getConnection() -> createTable($table);



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