<?php

namespace Evedove\AccessTicket\Model;

use Evedove\AccessTicket\Api\Data\TicketInterface;
use Evedove\AccessTicket\Api\Data\TicketSearchResultsInterfaceFactory;
use Evedove\AccessTicket\Api\TicketRepositoryInterface;
use Evedove\AccessTicket\Model\ResourceModel\Ticket as TicketResourceModel;
use Evedove\AccessTicket\Model\ResourceModel\Ticket\CollectionFactory as TicketCollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class TicketRepository implements TicketRepositoryInterface
{
    /**
     * @var \Evedove\AccessTicket\Model\TicketFactory
     */
    protected TicketFactory $ticketFactory;

    /**
     * @var \Evedove\AccessTicket\Model\ResourceModel\Ticket
     */
    protected TicketResourceModel $resource;

    /**
     * @var \Evedove\AccessTicket\Model\ResourceModel\Ticket\CollectionFactory
     */
    protected TicketCollectionFactory $ticketCollectionFactory;

    /**
     * @var \Evedove\AccessTicket\Api\Data\TicketSearchResultsInterfaceFactory
     */
    protected TicketSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    /**
     * @param \Evedove\AccessTicket\Model\TicketFactory $ticketFactory
     * @param \Evedove\AccessTicket\Model\ResourceModel\Ticket $ticketResourceModel
     * @param \Evedove\AccessTicket\Model\ResourceModel\Ticket\CollectionFactory $ticketCollectionFactory
     * @param \Evedove\AccessTicket\Api\Data\TicketSearchResultsInterfaceFactory $searchResultsFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        TicketFactory                       $ticketFactory,
        TicketResourceModel                 $ticketResourceModel,
        TicketCollectionFactory             $ticketCollectionFactory,
        TicketSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface        $collectionProcessor
    )
    {
        $this->ticketFactory = $ticketFactory;
        $this->resource = $ticketResourceModel;
        $this->ticketCollectionFactory = $ticketCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /** @inheritdoc */
    public function getById($id)
    {
        $ticket = $this->ticketFactory->create();
        $this->resource->load($ticket, $id);

        if (!$ticket->getId())
            throw new NoSuchEntityException(__('Unable to find ticket with ID "%1"', $id));

        return $ticket;
    }

    /** @inheritdoc */
    public function save(TicketInterface $ticket)
    {
        try {
            $this->resource->save($ticket);
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
    }

    /** @inheritdoc */
    public function delete(TicketInterface $ticket)
    {
        try {
            $this->resource->delete($ticket);
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
    }

    /** @inheritdoc */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->ticketCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}
