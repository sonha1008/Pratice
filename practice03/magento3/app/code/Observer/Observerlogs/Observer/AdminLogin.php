<?php

namespace Observer\Observerlogs\Observer;

use Magento\Framework\Event\ObserverInterface;

class AdminLogin implements ObserverInterface
{
	protected $_logger;
	public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	$data =[];
        $user = $observer->getEvent()->getUser();
        $user_id = $user->getId();
        $user_name = $user->getName();
        $user_email = $user->getEmail();
        $data = [$user_id, $user_name,$user_email];
        $this->_logger->addInfo('Info Admin',$data);
    }
}