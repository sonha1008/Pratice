<?php

namespace Observer\Observerlogs\Observer;

use Magento\Framework\Event\ObserverInterface;

class CustomerLogin implements ObserverInterface
{
	protected $_logger;
	public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->_logger = $logger;
    }
    public function execute(\Magento\Framework\Event\Observer $observer)
    {
    	$data =[];
        $customer = $observer->getEvent()->getCustomer();
        $customer_name = $customer->getName();
        $customer_email = $customer->getEmail();
        $data[] = $customer_name;
        $data[] = $customer_email;
        $this->_logger->addInfo('Info Customer',$data);
        echo "Customer LoggedIn<br>";
        echo $customer_name."<br>";
        echo $customer_email; //Get customer name
        exit;
    }
}