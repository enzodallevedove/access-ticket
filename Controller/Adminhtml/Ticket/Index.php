<?php

namespace Evedove\AccessTicket\Controller\Adminhtml\Ticket;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private PageFactory $pageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $rawFactory
     */
    public function __construct(
        Context     $context,
        PageFactory $rawFactory
    )
    {
        $this->pageFactory = $rawFactory;
        parent::__construct($context);
    }

    /** @inheritdoc */
    public function execute(): Page
    {
        $resultPage = $this->pageFactory->create();
        $resultPage->setActiveMenu('Evedove_AccessTicket::ticket');
        $resultPage->getConfig()->getTitle()->prepend(__('Tickets'));

        return $resultPage;
    }
}
