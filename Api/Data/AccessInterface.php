<?php

namespace Evedove\AccessTicket\Api\Data;

interface AccessInterface
{
    const ENTITY_ID = 'entity_id';
    const USER_ID = 'user_id';
    const TICKET_ID = 'ticket_id';
    const EXPIRE_DATE = 'expire_date';

    /**
     * @return mixed
     */
    public function getId();

    /**
     * Identifier setter
     *
     * @param mixed $value
     * @return $this
     */
    public function setId($value);

    /**
     * @return int|null
     */
    public function getUserId(): ?int;

    /**
     * @param int $userId
     * @return $this
     */
    public function setUserId(int $userId): AccessInterface;

    /**
     * @return int|null
     */
    public function getTicketId(): ?int;

    /**
     * @param int $ticketId
     * @return $this
     */
    public function setTicketId(int $ticketId): AccessInterface;

    /**
     * @return string|null
     */
    public function getExpireDate(): ?string;

    /**
     * @param string $expireDate
     * @return $this
     */
    public function setExpireDate(string $expireDate): AccessInterface;
}
