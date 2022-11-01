<?php

namespace Evedove\AccessTicket\Block\Adminhtml\Ticket\Edit;

use Magento\Backend\Block\Widget\Context;
use Magento\Framework\Registry;
use Magento\Framework\UrlInterface;

class GenericButton
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected UrlInterface $urlBuilder;

    /**
     * @var \Magento\Framework\Registry
     */
    protected Registry $registry;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        Context  $context,
        Registry $registry
    )
    {
        $this->urlBuilder = $context->getUrlBuilder();
        $this->registry = $registry;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        $ticket = $this->registry->registry('accessticket_ticket');
        return $ticket ? $ticket->getId() : null;
    }

    /**
     * @param string $route
     * @param array $params
     * @return string
     */
    public function getUrl(string $route = '', array $params = []): string
    {
        return $this->urlBuilder->getUrl($route, $params);
    }
}
