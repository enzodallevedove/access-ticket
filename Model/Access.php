<?php

namespace Evedove\AccessTicket\Model;

use Evedove\AccessTicket\Api\Data\AccessInterface;
use Magento\Framework\Model\AbstractExtensibleModel;

class Access extends AbstractExtensibleModel implements AccessInterface
{

    /** @inheritdoc */
    public function getUserId(): ?int
    {
        return $this->getData(self::USER_ID);
    }

    /** @inheritdoc */
    public function setUserId(int $userId): AccessInterface
    {
        return $this->setData(self::USER_ID, $userId);
    }

    /** @inheritdoc */
    public function getTicketId(): ?int
    {
        return $this->getData(self::TICKET_ID);
    }

    /** @inheritdoc */
    public function setTicketId(int $ticketId): AccessInterface
    {
        return $this->setData(self::TICKET_ID, $ticketId);
    }

    /** @inheritdoc */
    public function getExpireDate(): ?string
    {
        return $this->getData(self::EXPIRE_DATE);
    }

    /** @inheritdoc */
    public function setExpireDate(string $expireDate): AccessInterface
    {
        return $this->setData(self::EXPIRE_DATE, $expireDate);
    }

    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(ResourceModel\Access::class);
    }
}
