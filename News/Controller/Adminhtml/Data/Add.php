<?php
namespace Jimit\News\Controller\Adminhtml\Data;

use Jimit\News\Controller\Adminhtml\Data;

class Add extends Data
{
    /**
     * Forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {
        $resultForward = $this->resultForwardFactory->create();
        return $resultForward->forward('edit');
    }
}
