<?php
namespace Galaxy\CRUD\Model\Item\Source;

class IsActive implements \Magento\Framework\Data\OptionSourceInterface
{
    /**
     * @var \Galaxy\Item\Model\Item
     */
    protected $item;

    /**
     * Constructor
     *
     * @param \Galaxy\Item\Model\Item $item
     */
    public function __construct(\Galaxy\CRUD\Model\Item $item)
    {
        $this->item = $item;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->item->getAvailableStatuses();
        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }
        return $options;
    }
}
