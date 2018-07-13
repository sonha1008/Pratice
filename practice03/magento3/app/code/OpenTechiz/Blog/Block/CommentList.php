<?php
namespace OpenTechiz\Blog\Block;
use OpenTechiz\Blog\Api\Data\CommentInterface;
use OpenTechiz\Blog\Model\ResourceModel\Comment\Collection as CommentCollection;
class CommentList extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * @var \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory
     */
    protected $_CommentCollectionFactory;
    protected $_request;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory $CommentCollectionFactory,
        \Magento\Framework\App\RequestInterface $request,
        array $data = []
    ) {
        $this->_request = $request;
        parent::__construct($context, $data);
        $this->_CommentCollectionFactory = $CommentCollectionFactory;
    }

    public function getPostID()
  {
       return $this->_request->getParam('post_id', false);
  }
    public function getComments()
    {
        $post_id = $this->getPostId();
        if (!$this->hasData('Comments')) {
            $Comments = $this->_CommentCollectionFactory
                ->create()
                ->addFilter('post_id', $post_id)
                ->addOrder(
                    CommentInterface::CREATION_TIME,
                    CommentCollection::SORT_ORDER_DESC
                );
            $this->setData('Comments', $Comments);
        }
        return $this->getData('Comments');
    }

    public function getIdentities()
    {
        return [\OpenTechiz\Blog\Model\Comment::CACHE_TAG . '_' . 'list'];
    }
}