<?php
namespace Jimit\News\Api;
interface NewslistInterface {
	
    /**
     * GET for Get api
     * @return string
     */
    public function getNewsListData();
    /**
     * GET for Post api
     * @param string $data_id
     * @return string
     */
    public function getNewsListDataById($data_id);
}
