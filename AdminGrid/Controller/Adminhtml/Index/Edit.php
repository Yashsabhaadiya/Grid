<?php

namespace Webdev\AdminGrid\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Webdev\AdminGrid\Model\ReviewsFactory;

class Edit extends Action
{
    /**
     * @var PageFactory
     */
    private $pageFactory;

    /**
     * @var ReviewsFactory
     */
    protected $_reviewsFactory;

    /**
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry;

    /**
     * Edit constructor.
     * @param Context $context
     * @param PageFactory $rawFactory
     * @param ReviewsFactory $_reviewsFactory
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Context $context,
        PageFactory $rawFactory,
        ReviewsFactory $_reviewsFactory,
        \Magento\Framework\Registry $coreRegistry
    )
    {
        $this->pageFactory = $rawFactory;
        $this->_reviewsFactory = $_reviewsFactory;
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }


    /**
     * @return Page
     */
    public function execute(): Page
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Webdev_AdminGrid::reviews');
        $rowId = (int)$this->getRequest()->getParam('id');
        $rowData = '';

        if ($rowId) {
            $rowData = $this->_reviewsFactory->create()->load($rowId);
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('webdev_admingrid/index/index');
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        $title = $rowId ? __('Edit Reviews') : __('Add Reviews');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Webdev_AdminGrid::home');
    }
}
