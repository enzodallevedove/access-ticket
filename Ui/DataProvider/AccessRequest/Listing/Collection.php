<?php

namespace Evedove\AccessTicket\Ui\DataProvider\AccessRequest\Listing;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;

class Collection extends SearchResult
{
    /** @inheritdoc */
    protected function _initSelect()
    {
        $this->addFilterToMap('entity_id', 'main_table.entity_id');
        $this->addFilterToMap('ticket_id', 'accessticket_access_request.ticket_id');
        $this->addFilterToMap('name', 'accessticket_access_request.name');
        $this->addFilterToMap('email', 'accessticket_access_request.email');
        parent::_initSelect();
    }
}
