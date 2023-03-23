<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

/**
 * Created By : Rohan Hapani
 */
declare (strict_types = 1);

namespace Testimonial\BtPatch\Setup\Patch\Data;

use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;

/**
 * Class CreateCustomAttr for Create Custom Product Attribute using Data Patch.
 */
class MakeAttributeMultiselect implements DataPatchInterface {

    /**
     * ModuleDataSetupInterface
     *
     * @var ModuleDataSetupInterface
     */
    private $moduleDataSetup;

    /**
     * EavSetupFactory
     *
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * @param ModuleDataSetupInterface $moduleDataSetup
     * @param EavSetupFactory          $eavSetupFactory
     */
    public function __construct(
        ModuleDataSetupInterface $moduleDataSetup,
        EavSetupFactory $eavSetupFactory
    ) {
        $this->moduleDataSetup = $moduleDataSetup;
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function apply() {
        /** @var EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
        $eavSetup->addAttribute('catalog_product', 'manufacturer', [
        'label' => 'Mnufacturer',
        'input' => 'multiselect',
        'type' => 'text',
        'source' => 'Magento\Eav\Model\Entity\Attribute\Source\Table',
        'required' => false,
        'position' => 666,
        'visible' => true,
        'system' => false,
        'is_used_in_grid' => true,
        'is_visible_in_grid' => true,
        'is_filterable_in_grid' => true,
        'is_searchable_in_grid' => true,
        'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
        'option' => ['value' =>
            [
                'option_1'=>[
                    0 => 'Test 1'
                ],
                'option_2'=>[
                    0 => 'Test 2'
                ],
                'option_3'=>[
                    0 => 'Test 3'
                ],
            ],
            'order'=>
                [
                    'option_1' => 1,
                    'option_2' => 2,
                    'option_3' => 3
                ]
        ],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function getDependencies() {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases() {
        return [];
    }
}