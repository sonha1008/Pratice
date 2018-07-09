<?php
namespace OpenTechiz\Blog\Controller\Comment;

use \Magento\Framework\App\Action\Action;
use \Magento\Framework\Controller\ResultFactory;
use \Magento\Framework\Controller\Result\JsonFactory;
use \Magento\Framework\View\Result\PageFactory;

class Save extends Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;
    protected $resultPageFactory;
    protected $resultJsonFactory;
    protected $_inlineTranslation;

    function __construct(
        \Magento\Framework\App\Action\Context $context,
        \OpenTechiz\Blog\Model\Post $post,
        JsonFactory $resultJsonFactory,
        \Magento\Framework\Translate\Inline\StateInterface $inlineTranslation
    )
    {
        $this->_resultFactory = $context->getResultFactory();
        parent::__construct($context);
        $this->_post = $post;
        $this->_inlineTranslation = $inlineTranslation;
        $this->resultJsonFactory = $resultJsonFactory;
    }
    public function execute()
    {

        $errors = false;
        $message = '';
        $post = (array) $this->getRequest()->getPostValue();

        if (!$post) {
            $errors = true;
            $message = "Your submission is not valid. Please try again!";  
        }
        $this->_inlineTranslation->suspend();
        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($post);
        if (!\Zend_Validate::is(trim($post['comment']), 'NotEmpty')) {
                $errors = true;
                $message = "Content can not be empty!";
           }
 
        if (!\Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
               $errors = true;
               $message = "Email can not be empty!";
           }

        $result = $this->resultJsonFactory->create();
        if ($errors) {
            $message = "Wrong input field";
            $result->setData(['result' => 'fail', 'message' => $message]);
        }   else {
            $message = "submit success";
            $user_id   = $post['user_id'];
            $content    = $post['comment'];
            $post_id = $post['post_id'];
            $email = $post['email'];
            $comment = $this->_objectManager->create('OpenTechiz\Blog\Model\Comment');

            $comment->setUserId($user_id);
            $comment->setComment($content);
            $comment->setPostId($post_id);
            $comment->setEmail($email);
            $comment->setPending(0);
            $comment->save();
            $result->setData(['result' => 'success', 'message' => $message]);
        }
        return $result;
    }
}