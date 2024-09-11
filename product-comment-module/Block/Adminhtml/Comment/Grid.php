<?php
namespace Certification\ProductComment\Block\Adminhtml\Comment;

class Grid extends \Magento\Backend\Block\Widget\Grid\Container
{

    protected function _construct()
    {
        $this->_controller = 'adminhtml_comment_grid';
        $this->_blockGroup = 'Certification_ProductComment';
        $this->_headerText = __('Comment');
        parent::_construct();
        $this->removeButton('add');
    }
}
