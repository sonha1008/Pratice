<?php

namespace OpenTechiz\Blog\Model\Comment;

use OpenTechiz\Blog\Model\ResourceModel\Comment\CollectionFactory;
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
        CollectionFactory $CommentCollectionFactory,
        DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->collection = $CommentCollectionFactory->create();
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
        /** @var $Comment \OpenTechiz\Blog\Model\Comment */
        foreach ($items as $Comment) {
            $this->loadedData[$Comment->getId()] = $Comment->getData();
        }

        $data = $this->dataPersistor->get('blog_comment');
        if (!empty($data)) {
            $Comment = $this->collection->getNewEmptyItem();
            $Comment->setData($data);
            $this->loadedData[$Comment->getId()] = $Comment->getData();
            $this->dataPersistor->clear('blog_comment');
        }

        return $this->loadedData;
    }
}
