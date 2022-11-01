<?php

namespace Evedove\AccessTicket\Model;

use Evedove\AccessTicket\Api\Data\TicketInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Ticket extends AbstractExtensibleModel implements TicketInterface
{
    /** @inheritdoc */
    public function getTitle(): ?string
    {
        return $this->getData(self::TITLE);
    }

    /** @inheritdoc */
    public function setTitle(string $title): TicketInterface
    {
        return $this->setData(self::TITLE, $title);
    }

    /** @inheritdoc */
    public function getDescription(): ?string
    {
        return $this->getData(self::DESCRIPTION);
    }

    /** @inheritdoc */
    public function setDescription(string $description): TicketInterface
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /** @inheritdoc */
    public function getExternalId(): ?string
    {
        return $this->getData(self::EXTERNAL_ID);
    }

    /** @inheritdoc */
    public function setExternalId(?string $externalId): TicketInterface
    {
        return $this->setData(self::EXTERNAL_ID, $externalId);
    }

    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\Ticket::class);
    }
}
