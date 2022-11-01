<?php

namespace Evedove\AccessTicket\Model;

use Evedove\AccessTicket\Api\AccessRequestRepositoryInterface;
use Evedove\AccessTicket\Api\Data\AccessRequestInterface;
use Evedove\AccessTicket\Api\Data\AccessRequestSearchResultsInterfaceFactory;
use Evedove\AccessTicket\Model\ResourceModel\AccessRequest as AccessRequestResourceModel;
use Evedove\AccessTicket\Model\ResourceModel\AccessRequest\CollectionFactory as AccessRequestCollectionFactory;
use Exception;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;

class AccessRequestRepository implements AccessRequestRepositoryInterface
{
    /**
     * @var \Evedove\AccessTicket\Model\AccessRequestFactory
     */
    protected AccessRequestFactory $accessTicketFactory;

    /**
     * @var \Evedove\AccessTicket\Model\ResourceModel\AccessRequest
     */
    protected AccessRequestResourceModel $resource;

    /**
     * @var \Evedove\AccessTicket\Model\ResourceModel\AccessRequest\CollectionFactory
     */
    protected AccessRequestCollectionFactory $accessTicketCollectionFactory;

    /**
     * @var \Evedove\AccessTicket\Api\Data\AccessRequestSearchResultsInterfaceFactory
     */
    protected AccessRequestSearchResultsInterfaceFactory $searchResultsFactory;

    /**
     * @var \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface
     */
    protected CollectionProcessorInterface $collectionProcessor;

    /**
     * @param \Evedove\AccessTicket\Model\AccessRequestFactory $accessTicketFactory
     * @param \Evedove\AccessTicket\Model\ResourceModel\AccessRequest $resource
     * @param \Evedove\AccessTicket\Model\ResourceModel\AccessRequest\CollectionFactory $accessTicketCollectionFactory
     * @param \Evedove\AccessTicket\Api\Data\AccessRequestSearchResultsInterfaceFactory $searchResultsFactory
     * @param \Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        AccessRequestFactory                       $accessTicketFactory,
        AccessRequestResourceModel                 $resource,
        AccessRequestCollectionFactory             $accessTicketCollectionFactory,
        AccessRequestSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface               $collectionProcessor
    )
    {
        $this->accessTicketFactory = $accessTicketFactory;
        $this->resource = $resource;
        $this->accessTicketCollectionFactory = $accessTicketCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /** @inheritdoc */
    public function getById($id)
    {
        $accessTicket = $this->accessTicketFactory->create();
        $this->resource->load($accessTicket, $id);

        if (!$accessTicket->getId())
            throw new NoSuchEntityException(__('Unable to find accessTicket with ID "%1"', $id));

        return $accessTicket;
    }

    /** @inheritdoc */
    public function save(AccessRequestInterface $accessTicket)
    {
        try {
            $this->resource->save($accessTicket);
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
    }

    /** @inheritdoc */
    public function delete(AccessRequestInterface $accessTicket)
    {
        try {
            $this->resource->delete($accessTicket);
        } catch (Exception $e) {
            throw new LocalizedException(__($e->getMessage()));
        }
    }

    /** @inheritdoc */
    public function getList(SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->accessTicketCollectionFactory->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());

        return $searchResults;
    }
}
