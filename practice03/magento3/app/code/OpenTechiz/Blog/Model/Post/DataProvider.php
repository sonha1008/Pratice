<?php

namespace OpenTechiz\Blog\Model\Post;

use OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\App\Request\DataPersistorInterface;


class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
 
    protected $collection;

    protected $dataPersistor;

    protected $loadedData;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        CollectionFactory $PostCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $PostCollectionFactory->create();
        $this->dataPersistor = $dataPersistor;
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->meta = $this->prepareMeta($this->meta);
    }

 
    public function prepareMeta(array $meta)
    {
        return $meta;
    }

    public function getData()
    {
        if (isset($this->loadedData)) {
            return $this->loadedData;
        }
        $items = $this->collection->getItems();
        /** @var $Post \OpenTechiz\Blog\Model\Post */
        foreach ($items as $Post) {
            $this->loadedData[$Post->getId()] = $Post->getData();
        }

        $data = $this->dataPersistor->get('blog_post');
        if (!empty($data)) {
            $Post = $this->collection->getNewEmptyItem();
            $Post->setData($data);
            $this->loadedData[$Post->getId()] = $Post->getData();
            $this->dataPersistor->clear('blog_post');
        }

        return $this->loadedData;
    }
}
