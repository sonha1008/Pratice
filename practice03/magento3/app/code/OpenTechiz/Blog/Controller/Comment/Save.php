<?php
namespace OpenTechiz\Blog\Controller\Comment;

use \Magento\Framework\App\Action\Action;
use Magento\Framework\Controller\ResultFactory;

class Save extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
    function __construct(
        \Magento\Framework\App\Action\Context $context,
        \OpenTechiz\Blog\Model\Post $post
    )
    {
        $this->_resultFactory = $context->getResultFactory();
        parent::__construct($context);
        $this->_post = $post;
    }
    public function execute()
    {
        $post = (array) $this->getRequest()->getPost();
        $resultRedirect = $this->_resultFactory->create(ResultFactory::TYPE_REDIRECT);
        if (!empty($post)) {
            // Retrieve your form data
            $user_id   = $post['user_id'];
            $content    = $post['comment'];
            $post_id = $post['post_id'];
            $comment = $this->_objectManager->create('OpenTechiz\Blog\Model\Comment');
            
            $comment->setUserId($user_id);
            $comment->setComment($content);
            $comment->setPostId($post_id);
            $comment->save();
            // Display the succes form validation message
            $this->messageManager->addSuccessMessage('Comment added succesfully!');
            $resultRedirect->setUrl($this->_redirect->getRefererUrl());
            return $resultRedirect;

        }
        $resultRedirect->setUrl('/magento3/blog/');
        return $resultRedirect;
    }
}