<?php

namespace Evedove\AccessTicket\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\VersionControl\AbstractDb;

class AccessRequest extends AbstractDb
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init('accessticket_access_request', 'entity_id');
    }
}
