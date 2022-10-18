<?php

namespace Evedove\AccessTicket\Ui\DataProvider\Ticket\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /** @inheritdoc */
    protected function _initSelect()
    {
        $this->addFilterToMap('entity_id', 'main_table.entity_id');
        $this->addFilterToMap('title', 'accessticket_ticket.title');
        $this->addFilterToMap('description', 'accessticket_ticket.description');
        $this->addFilterToMap('external_id', 'accessticket_ticket.external_id');
        parent::_initSelect();
    }
}
