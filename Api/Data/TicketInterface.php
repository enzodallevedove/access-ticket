<?php

namespace Evedove\AccessTicket\Api\Data;

interface TicketInterface
{
    const ENTITY_ID = 'entity_id';
    const TITLE = 'title';
    const DESCRIPTION = 'description';
    const EXTERNAL_ID = 'external_id';

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
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): TicketInterface;

    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): TicketInterface;

    /**
     * @return string|null
     */
    public function getExternalId(): ?string;

    /**
     * @param string|null $externalId
     * @return $this
     */
    public function setExternalId(?string $externalId): TicketInterface;
}
