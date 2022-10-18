<?php

namespace Evedove\AccessTicket\Api;

use Evedove\AccessTicket\Api\Data\TicketInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface TicketRepositoryInterface
{
    /**
     * @param int $id
     * @return \Evedove\AccessTicket\Api\Data\TicketInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById(int $id);

    /**
     * @param \Evedove\AccessTicket\Api\Data\TicketInterface $ticket
     * @return \Evedove\AccessTicket\Api\Data\TicketInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(TicketInterface $ticket);

    /**
     * @param \Evedove\AccessTicket\Api\Data\TicketInterface $ticket
     * @return bool
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(TicketInterface $ticket);

    /**
     * @param int $id
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById(int $id);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Evedove\AccessTicket\Api\Data\TicketSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
