<?php

namespace Evedove\AccessTicket\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;

class Access extends AbstractDb
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init('accessticket_access', 'entity_id');
    }
}
