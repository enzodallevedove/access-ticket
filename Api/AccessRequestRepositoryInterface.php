<?php

namespace Evedove\AccessTicket\Api;

use Evedove\AccessTicket\Api\Data\AccessRequestInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface AccessRequestRepositoryInterface
{
    /**
     * @param int $id
     * @return \Evedove\AccessTicket\Api\Data\AccessRequestInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * @param \Evedove\AccessTicket\Api\Data\AccessRequestInterface $accessTicket
     * @return \Evedove\AccessTicket\Api\Data\AccessRequestInterface
     */
    public function save(AccessRequestInterface $accessTicket);

    /**
     * @param \Evedove\AccessTicket\Api\Data\AccessRequestInterface $accessTicket
     * @return bool
     */
    public function delete(AccessRequestInterface $accessTicket);

    /**
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Evedove\AccessTicket\Api\Data\AccessRequestSearchResultsInterface
     */
    public function getList(SearchCriteriaInterface $searchCriteria);
}
