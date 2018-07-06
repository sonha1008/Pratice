<?php
namespace OpenTechiz\Blog\Block;
class PostView extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
    /**
     * Construct
     *
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \OpenTechiz\Blog\Model\Post $post
     * @param \OpenTechiz\Blog\Model\PostFactory $postFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \OpenTechiz\Blog\Model\Post $post,
        \OpenTechiz\Blog\Model\PostFactory $postFactory,
        array $data = []
    )
    {
        parent::__construct($context, $data);
        $this->_post = $post;
        $this->_postFactory = $postFactory;
    }
    /**
     * @return \OpenTechiz\Blog\Model\Post
     */
    public function getPost()
    {
        if (!$this->hasData('post')) {
            if ($this->getPostId()) {
                /** @var \OpenTechiz\Blog\Model\Post $page */
                $post = $this->_postFactory->create();
            } else {
                $post = $this->_post;
            }
            $this->setData('post', $post);
        }
        return $this->getData('post');
    }
    public function _prepareLayout()
    {
       //set page title
        $post = $this->getPost();
       $this->pageConfig->getTitle()->set(__($post->getTitle()));
       return parent::_prepareLayout();
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [\OpenTechiz\Blog\Model\Post::CACHE_TAG . '_' . $this->getPost()->getId()];
    }
}