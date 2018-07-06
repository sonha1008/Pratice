<?php
/**
 * OpenTechiz
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the OpenTechiz.com license that is
 * available through the world-wide-web at this URL:
 * https://www.OpenTechiz.com/LICENSE.txt
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @category    OpenTechiz
 * @package     OpenTechiz_Blog
 * @copyright   Copyright (c) 2018 OpenTechiz (http://www.OpenTechiz.com/)
 * @license     https://www.OpenTechiz.com/LICENSE.txt
 */
namespace OpenTechiz\Blog\Controller\Adminhtml\Post;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
/**
 * Class NewAction
 * @package OpenTechiz\Blog\Controller\Adminhtml\Post
 */
class NewAction extends Action
{
    /**
     * Redirect result factory
     *
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    public $resultForwardFactory;
    /**
     * constructor
     *
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Backend\App\Action\Context $context
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    )
    {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
    /**
     * forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        $resultForward->forward('edit');
        return $resultForward;
    }
}