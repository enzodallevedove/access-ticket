<?php

namespace Evedove\AccessTicket\Model\ResourceModel\Ticket;

use Evedove\AccessTicket\Model\ResourceModel\Ticket as ResourceModel;
use Evedove\AccessTicket\Model\Ticket as Model;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';

    /**
     * Event prefix
     *
     * @var string
     */
    protected $_eventPrefix = 'accessticket_ticket_collection';

    /**
     * Event object
     *
     * @var string
     */
    protected $_eventObject = 'ticket_collection';

    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
