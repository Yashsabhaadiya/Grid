<?php

namespace Webdev\AdminGrid\Controller\Adminhtml\Index;

class MassDelete extends \Magento\Backend\App\Action
{
    protected $_reviewsFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Webdev\AdminGrid\Model\ReviewsFactory $reviewsFactory
    )
    {
        $this->_reviewsFactory = $reviewsFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $selectedIds = $data['selected'];
        try {
            foreach ($selectedIds as $selectedId) {
                $deleteData = $this->_reviewsFactory->create()->load($selectedId);
                $deleteData->delete();
            }
            $this->messageManager->addSuccess(__('Data has been successfully deleted.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('webdev_adminGrid/index/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webdev_AdminGrid::home');
    }
}