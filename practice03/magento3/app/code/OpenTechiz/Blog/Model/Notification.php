<?php 
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\PostInterface;
use Magento\Framework\DataObject\IdentityInterface;
class Notification  extends \Magento\Framework\Model\AbstractModel implements NotificationInterface, IdentityInterface
{

    const CACHE_TAG = 'blog_notification';
 
    
    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Notification');
    }
    
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    
    public function getId()
    {
        return $this->getData(self::NOTI_ID);
    }
    
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }
    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }
    public function getCommentId()
    {
        return $this->getData(self::COMMENT_ID);
    }
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }
    
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }
    
    public function setId($id)
    {
        return $this->setData(self::NOTI_ID, $id);
    }
    
    public function setUserId($user_id)
    {
        return $this->setData(self::USER_ID, $user_id);
    }
     public function setPostId($post_id)
    {
        return $this->setData(self::POST_ID, $post_id);
    }
     public function setCommentId($comment_id)
    {
        return $this->setData(self::COMMENT_ID, $comment_id);
    }
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }
    
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }
}