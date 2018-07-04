<?php 

namespace OpenTechiz\Blog\Block;

 
use OpenTechiz\Blog\Api\Data\PostInterface;
use OpenTechiz\Blog\Model\ResourceModel\Post\Collection as PostCollection;

/**
* 
*/
class PostList extends \Magento\Framework\View\Element\Template
{

	protected $_postCollectionFatory;

	
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\OpenTechiz\Blog\Model\ResourceModel\Post\CollectionFatory $postCollectionFatory,
		array $data = [])
	{
		parent::__construct($context, $data);
		$this->_postCollectionFatory = $postCollectionFatory;

	}
	public function getPosts()
	{
		if(!$this->hasData('posts')) {
			$posts = $this->_postCollectionFatory
			->create()
			->addFilter('is_active',1)
			->addOrder(
				PostInterface::CREATION_TIME,
				PostCollection::SORT_ORDER_DESC
				);
			$this->setData('posts',$posts);
		}
		return $this->getData('posts');
	}
}
