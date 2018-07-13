<?php 
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\CommentInterface;
use Magento\Framework\DataObject\IdentityInterface;
class Comment  extends \Magento\Framework\Model\AbstractModel implements CommentInterface, IdentityInterface
{
    const STATUS_PENDING = 2;
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    const CACHE_TAG = 'blog_comment';
    
    protected $_cacheTag = 'blog_comment';
    protected $_eventPrefix = 'blog_comment';
    protected $_urlBuilder;
   
    function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = [])
    {
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }
   
    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled'),self::STATUS_PENDING => __('Pending')];
    }
    
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
  
    public function getId()
    {
        return $this->getData(self::COMMENT_ID);
    }
    
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }
    
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }


    public function getPending()
    {
        return $this->getData(self::PENDING);
    }
    
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }
    
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }
    
    public function setId($id)
    {
        return $this->setData(self::COMMENT_ID, $id);
    }
    
    public function setUserId($user_id)
    {
        return $this->setData(self::USER_ID, $user_id);
    }

    public function setPostId($post_id)
    {
        return $this->setData(self::POST_ID, $post_id);
    }
    
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }

    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }

     public function setPending($pending)
    {
        return $this->setData(self::PENDING, $pending);
    }
    
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }
    
    public function setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATE_TIME, $update_time);
    }
}