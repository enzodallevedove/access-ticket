<?php

namespace Evedove\AccessTicket\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface AccessRequestSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \Evedove\AccessTicket\Api\Data\AccessRequestInterface[]
     */
    public function getItems();

    /**
     * @param \Evedove\AccessTicket\Api\Data\AccessRequestInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
