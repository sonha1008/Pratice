<?php
namespace OpenTechiz\Blog\Model\Comment\Source;
class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
 
    protected $Comment;
   
    public function __construct(\OpenTechiz\Blog\Model\Comment $Comment)
    {
        $this->Comment = $Comment;
    }
    
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->Comment->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}