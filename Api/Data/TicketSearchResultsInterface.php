<?php

namespace Evedove\AccessTicket\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface TicketSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Evedove\AccessTicket\Api\Data\TicketInterface[]
     */
    public function getItems();

    /**
     * @param \Evedove\AccessTicket\Api\Data\TicketInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
