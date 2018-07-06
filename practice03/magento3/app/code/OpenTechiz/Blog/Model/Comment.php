<?php 
namespace OpenTechiz\Blog\Model;
use OpenTechiz\Blog\Api\Data\CommentInterface;
use Magento\Framework\DataObject\IdentityInterface;
class Comment  extends \Magento\Framework\Model\AbstractModel implements CommentInterface, IdentityInterface
{
    /**#@+
     * Post's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;
    /**#@-*/
    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'blog_comment';
    /**
     * @var string
     */
    protected $_cacheTag = 'blog_comment';
    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'blog_comment';
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;
    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $data
     */
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
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('OpenTechiz\Blog\Model\ResourceModel\Comment');
    }
    /**
     * Check if post url key exists
     * return post id if post exists
     *
     * @param string $url_key
     * @return int
     */
    /**
     * Prepare post's statuses.
     * Available event blog_post_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }
    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }
    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::COMMENT_ID);
    }
    /**
     * Get URL Key
     *
     * @return string
     */
    /**
     * Return the desired URL of a post
     *  eg: /blog/view/index/id/1/
     * @TODO Move to a PostUrl model, and make use of the
     * @TODO rewrite system, using url_key to build url.
     * @TODO desired url: /blog/my-latest-blog-post-title
     *
     * @return string
     */
    /**
     * Get title
     *
     * @return string|null
     */
    public function getUserId()
    {
        return $this->getData(self::USER_ID);
    }

    public function getPostId()
    {
        return $this->getData(self::POST_ID);
    }
    /**
     * Get content
     *
     * @return string|null
     */
    public function getComment()
    {
        return $this->getData(self::COMMENT);
    }
    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }
    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }
    /**
     * Is active
     *
     * @return bool|null
     */
    /**
     * Set ID
     *
     * @param int $id
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setId($id)
    {
        return $this->setData(self::COMMENT_ID, $id);
    }
    /**
     * Set URL Key
     *
     * @param string $url_key
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    /**
     * Set title
     *
     * @param string $title
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setUserId($user_id)
    {
        return $this->setData(self::USER_ID, $user_id);
    }

    public function setPostId($post_id)
    {
        return $this->setData(self::POST_ID, $post_id);
    }
    /**
     * Set content
     *
     * @param string $content
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setComment($comment)
    {
        return $this->setData(self::COMMENT, $comment);
    }
    /**
     * Set creation time
     *
     * @param string $creation_time
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }
    /**
     * Set update time
     *
     * @param string $update_time
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
    public function setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATE_TIME, $update_time);
    }
    /**
     * Set is active
     *
     * @param int|bool $is_active
     * @return \OpenTechiz\Blog\Api\Data\PostInterface
     */
}