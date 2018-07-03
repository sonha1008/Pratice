<?php
 
namespace Son\Helloworld\Controller\Index;
 
use Magento\Framework\App\Action\Context;
 
class Index extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
    protected $_logger;
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory,\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
        
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        /*$this->_logger->addDebug('My debug log');
        $this->_logger->addInfo('My info log');
        $this->_logger->addNotice('My notice log');
        $this->_logger->addWarning('My warning log');
        $this->_logger->addError('My error log');
        $this->_logger->addCritical('My critical log');
        $this->_logger->addAlert('My alert log');
        $this->_logger->addEmergency('My emergency log');
 
        $this->_view->loadLayout();
        $this->_view->getLayout()->initMessages();
        $this->_view->renderLayout();*/
        /*$debugBackTrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        foreach ($debugBackTrace as $item) {
            echo @$item['class'] . @$item['type'] . @$item['function'] . "<br>";
        }
        print_r($this);
        die();*/
        $resultPage = $this->_resultPageFactory->create();
        return $resultPage;
    }
}