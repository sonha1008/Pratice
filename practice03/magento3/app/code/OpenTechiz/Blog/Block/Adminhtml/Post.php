<?php
namespace OpenTechiz\Blog\Block\Adminhtml;
class Post extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_post';
        $this->_blockGroup = 'OpenTechiz_Blog';
        $this->_headerText = __('Manage Blog Posts');
        parent::_construct();
        if ($this->_isAllowedAction('OpenTechiz_Blog::save')) {
            $this->buttonList->update('add', 'label', __('Add New Post'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}
