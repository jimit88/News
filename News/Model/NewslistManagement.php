<?php
namespace Jimit\News\Model;
use Jimit\News\Api\NewslistInterface;
class NewslistManagement implements NewslistInterface
{
    /**
     * {@inheritdoc}
     */
    public function getNewsListData()
    {
		/*
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('jimit_news_data');

        $sql = "SELECT * FROM `" . $tableName . "`";
		
        $result = $connection->query($sql);       
		print_r(json_encode($result));
		die; 	*/
		

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$model=$objectManager->create('Jimit\News\Model\Data');
		$datacollection=$model->getCollection();
		//print_r($datacollection->getData());		
        return json_encode($datacollection->getData());
		
		/*
        try{
            $response = [
                    'storeid' => $storeid,
                    'name' =>$name
            ];
        }catch(\Exception $e) {
            $response=['error' => $e->getMessage()];
        }

        return json_encode($response);*/
    }
	
    /**
     * {@inheritdoc}
     */
    public function getNewsListDataById($data_id)
    {
		/*
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
        $resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();
        $tableName = $resource->getTableName('jimit_news_data');

        $sql = "SELECT * FROM `" . $tableName . "`";
		
        $result = $connection->query($sql);       
		print_r(json_encode($result));
		die; 	*/
		

		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$model=$objectManager->create('Jimit\News\Model\Data');
		$datacollection=$model->getCollection();
		$datacollection->addFieldToFilter('data_id', ['eq' => "$data_id"]);

		//print_r($datacollection->getData());		
        return json_encode($datacollection->getData());
		
		/*
        try{
            $response = [
                    'storeid' => $storeid,
                    'name' =>$name
            ];
        }catch(\Exception $e) {
            $response=['error' => $e->getMessage()];
        }

        return json_encode($response);*/
    }
    /**
     * {@inheritdoc}
     */
    public function customPostMethod($storeid,$name,$city)
    {
        try{
            $response = [
                'storeid' => $storeid,
                'name' =>$name,
                'city'=>$city
            ];
        }catch(\Exception $e) {
            $response=['error' => $e->getMessage()];
        }
        return json_encode($response);
    }
}
