<?php
 
namespace Webdev\AdminGrid\Controller\Adminhtml\Index;
 
class Delete extends \Magento\Backend\App\Action
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
 
    public function execute()
    {
        $reviewId = $this->getRequest()->getParam('id');
        if (!$reviewId) {
            $this->messageManager->addError(__('Invalid review ID'));
        } else {
            try {
                $rowData = $this->_reviewsFactory->create()->load($reviewId);
                if (!$rowData->getId()) {
                    $this->messageManager->addError(__('Review does not exist.'));
                } else {
                    $rowData->delete();
                    $this->messageManager->addSuccess(__('Review has been deleted successfully.'));
                }
            } catch (\Exception $e) {
                $this->messageManager->addError(__($e->getMessage()));
            }
        }
        $this->_redirect('webdev_adminGrid/index/index');
    }
 
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webdev_AdminGrid::home');
    }
}