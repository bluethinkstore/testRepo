<?php
    namespace Webkul\Demo\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Products implements ArrayInterface
{

    /*
     * Option getter
     * @return array
     */
    public function toOptionArray()
    {
        $arr = $this->toArray();
        $ret = [];
        foreach ($arr as $key => $value) {
            $ret[] = [
                'value' => $key,
                'label' => $value
            ];
        }
        return $ret;
    }

    /*
     * Get options in "key-value" format
     * @return array
     */
    public function toArray()
    {
        $valList = [
            '0' => 'Select',
            '1' => 'Java',
            '2' => 'Magento',
            '3' => 'Python',
            '4' => 'React',
            '5' => 'PHP',
            '6' => 'UI',
            '7' =>'WordPress',

        ];
        return $valList;
    }
}