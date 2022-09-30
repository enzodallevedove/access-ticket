<?php

namespace Evedove\AccessTicket\Api\Data;

interface AccessRequestInterface
{
    const ENTITY_ID = 'entity_id';
    const TICKET_ID = 'ticket_id';
    const NAME = 'name';
    const EMAIL = 'email';

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
    public function getTicketId(): ?int;

    /**
     * @param int $ticketId
     * @return $this
     */
    public function setTicketId(int $ticketId): AccessRequestInterface;

    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): AccessRequestInterface;

    /**
     * @return string|null
     */
    public function getEmail(): ?string;

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): AccessRequestInterface;
}
