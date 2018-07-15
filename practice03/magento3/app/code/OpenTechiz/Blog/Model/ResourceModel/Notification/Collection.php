<?php 
namespace OpenTechiz\Blog\Model\ResourceModel\Notification;
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{

    protected $_idFieldName = 'noti_id';
    
    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\Notification', 'OpenTechiz\Blog\Model\ResourceModel\Notification');
    }
}