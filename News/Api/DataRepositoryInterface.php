<?php
namespace Jimit\News\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Jimit\News\Api\Data\DataInterface;

interface DataRepositoryInterface
{

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function save(DataInterface $data);

    /**
     * @param $dataId
     * @return mixed
     */
    public function getById($dataId);

    /**
     * @param DataInterface $data
     * @return mixed
     */
    public function delete(DataInterface $data);

    /**
     * @param $dataId
     * @return mixed
     */
    public function deleteById($dataId);
}
