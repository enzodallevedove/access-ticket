<?php

namespace Evedove\AccessTicket\Model\ResourceModel\Access;

use Evedove\AccessTicket\Model\Access as Model;
use Evedove\AccessTicket\Model\ResourceModel\Access as ResourceModel;
use Magento\Eav\Model\Entity\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /** @inheritdoc */
    protected function _construct(): void
    {
        $this->_init(Model::class, ResourceModel::class);
    }
}
