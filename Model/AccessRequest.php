<?php

namespace Evedove\AccessTicket\Model;

use Evedove\AccessTicket\Api\Data\AccessRequestInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class AccessRequest extends AbstractExtensibleModel implements AccessRequestInterface
{
    /** @inheritdoc */
    public function getTicketId(): ?int
    {
        return $this->getData(self::TICKET_ID);
    }

    /** @inheritdoc */
    public function setTicketId(int $ticketId): AccessRequestInterface
    {
        return $this->setData(self::TICKET_ID, $ticketId);
    }

    /** @inheritdoc */
    public function getName(): ?string
    {
        return $this->getData(self::NAME);
    }

    /** @inheritdoc */
    public function setName(string $name): AccessRequestInterface
    {
        return $this->setData(self::NAME, $name);
    }

    /** @inheritdoc */
    public function getEmail(): ?string
    {
        return $this->getData(self::EMAIL);
    }

    /** @inheritdoc */
    public function setEmail(string $email): AccessRequestInterface
    {
        return $this->setData(self::EMAIL, $email);
    }

    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\AccessRequest::class);
    }
}
