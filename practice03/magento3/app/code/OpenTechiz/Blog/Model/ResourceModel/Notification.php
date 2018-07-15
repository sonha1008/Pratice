<?php
namespace OpenTechiz\Blog\Model\ResourceModel;
class Notification extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	protected function _construct()
	{
        $this->_init('opentechiz_blog_notification', 'noti_id');
    }
}