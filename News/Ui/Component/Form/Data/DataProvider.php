<?php
namespace Jimit\News\Ui\Component\Form\Data;

use Magento\Store\Model\StoreManagerInterface;
use Jimit\News\Model\ResourceModel\Data\Collection;
class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var Collection
     */
    protected $collection;
	
    /**
     * @var array
     */
    protected $loadedData;
    /**
     * @var RequestInterface
     */
    protected $request;
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $storeManager;
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $collection,
        //FilterPool $filterPool,
        \Magento\Framework\App\RequestInterface $request,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collection;
        //$this->filterPool = $filterPool;
        $this->request = $request;
        $this->storeManager = $storeManager;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->loadedData) {
            $storeId = (int) $this->request->getParam('store');
            $this->collection->setStoreId($storeId)->addAttributeToSelect('*');
            $items = $this->collection->getItems();
            foreach ($items as $item) {
                $item->setStoreId($storeId);
                $itemData = $item->getData();
                if (isset($itemData['data_img'])) {
                    $imageName = explode('/', $itemData['data_img']);
                    $itemData['data_img'] = [
                        [
                            'name' => $imageName[3],
                            'url' => $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA) . 'logo/image' . $itemData['data_img'],
                        ],
                    ];
                } else {
                    $itemData['data_img'] = null;
                }
                
                $this->loadedData[$item->getEntityId()] = $itemData;
                break;
            }
        }
        return $this->loadedData;
    }
}
