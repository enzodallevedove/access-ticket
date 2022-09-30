<?php

namespace Evedove\AccessTicket\Model\ResourceModel\Ticket;

use Evedove\AccessTicket\Model\ResourceModel\Ticket as ResourceModel;
use Evedove\AccessTicket\Model\Ticket as Model;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
