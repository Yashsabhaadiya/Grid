<?php

namespace Webdev\AdminGrid\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
   
    protected $_reviewsFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Webdev\AdminGrid\Model\ReviewsFactory $_reviewsFactory
    )
    {
        $this->_reviewsFactory = $_reviewsFactory;
        parent::__construct($context);
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $reviewId = isset($data['id']) ? $data['id'] : '';
        if (!$data) {
            $this->_redirect('webdev_adminGrid/index/index');
        }
        try {
            $rowData = $this->_reviewsFactory->create()->load($reviewId);
            if (!$rowData->getId() && $reviewId) {
                $this->messageManager->addError(__('Data no longer exist.'));
                $this->_redirect('webdev_admingrid/index/index');
            }
            $rowData->setData($data);
            $rowData->save();
            $this->messageManager->addSuccess(__('Data has been successfully edited and saved.'));
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