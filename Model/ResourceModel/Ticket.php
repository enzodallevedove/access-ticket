<?php

namespace Evedove\AccessTicket\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;

class Ticket extends AbstractDb
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init('accessticket_ticket', 'entity_id');
    }
}
