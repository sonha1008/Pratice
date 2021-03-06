<?php
namespace OpenTechiz\Blog\Model\Post\Source;
class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
 
    protected $Post;
   
    public function __construct(\OpenTechiz\Blog\Model\Post $Post)
    {
        $this->Post = $Post;
    }
    
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->Post->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}