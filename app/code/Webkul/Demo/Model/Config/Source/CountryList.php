<?php 
namespace Webkul\Demo\Model\Config\Source;

class CountryList implements \Magento\Framework\Option\ArrayInterface
{
public function toOptionArray()
{
return [
['value' => 'USA', 'label' => __('USA')],
['value' => 'India', 'label' => __('India')],
['value' => 'UK', 'label' => __('UK')] ,
];
}
}
