<?php

namespace Evedove\AccessTicket\Controller\Adminhtml\Ticket;

use Evedove\AccessTicket\Model\Ticket;
use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\Registry;

class Edit extends Action implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\Registry
     */
    private Registry $coreRegistry;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     */
    public function __construct(
        Context  $context,
        Registry $coreRegistry
    )
    {
        $this->coreRegistry = $coreRegistry;
        parent::__construct($context);
    }

    /** @inheritdoc */
    public function execute()
    {
        // 1. Get ID and create model
        $id = $this->getRequest()->getParam('entity_id');
        $model = $this->_objectManager->create(Ticket::class);

        // 2. Initial checking
        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addErrorMessage(__('This ticket no longer exists.'));
                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        $this->coreRegistry->register('accessticket_ticket', $model);

        // 3. Build edit form
        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}
