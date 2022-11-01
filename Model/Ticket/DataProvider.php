<?php

namespace Evedove\AccessTicket\Model\Ticket;

use Evedove\AccessTicket\Model\ResourceModel\Ticket\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Ui\DataProvider\Modifier\PoolInterface;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var \Evedove\AccessTicket\Model\ResourceModel\Ticket\Collection
     */
    protected $collection;

    /**
     * @var \Magento\Framework\App\Request\DataPersistorInterface
     */
    protected $dataPersistor;

    /**
     * @var array
     */
    protected $loadedData;

    /**
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Evedove\AccessTicket\Model\ResourceModel\Ticket\CollectionFactory $ticketCollectionFactory
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        string $name,
        string $primaryFieldName,
        string $requestFieldName,
        CollectionFactory $ticketCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    )
    {
        $this->collection = $ticketCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        /** @var \Evedove\AccessTicket\Model\Ticket $ticket */
        foreach ($items as $ticket) {
            $this->loadedData[$ticket->getId()]['general'] = $ticket->getData();
        }

//        $data = $this->dataPersistor->get('accessticket_ticket');
//        if (!empty($data)) {
//            $ticket = $this->collection->getNewEmptyItem();
//            $ticket->setData($data);
//            $this->loadedData[$ticket->getId()] = $ticket->getData();
//            $this->dataPersistor->clear('accessticket_ticket');
//        }

        return $this->loadedData;
    }
}
