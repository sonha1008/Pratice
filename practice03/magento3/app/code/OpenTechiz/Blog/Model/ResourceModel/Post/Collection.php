<?php 
namespace OpenTechiz\Blog\Model\ResourceModel\Post;
/**
* 
*/
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	
	protected function _construct(argument)
	{
			$this->_init('Opentechiz\Blog\Model\Post', 'OPenTechiz\Blog\Model\ResourceModel\Post');
	}

}