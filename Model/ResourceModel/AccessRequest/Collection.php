<?php

namespace Evedove\AccessTicket\Model\ResourceModel\AccessRequest;

use Evedove\AccessTicket\Model\AccessRequest as Model;
use Evedove\AccessTicket\Model\ResourceModel\AccessRequest as ResourceModel;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
