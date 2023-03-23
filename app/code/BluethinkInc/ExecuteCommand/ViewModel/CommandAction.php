<?php

namespace BluethinkInc\ExecuteCommand\ViewModel;

use Magento\Framework\Data\Form\FormKey;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class CommandAction implements ArgumentInterface
{

    /**
     * @var FormKey
     */
    protected $formKey;

    /**
     * @var UrlInterface
     */
    protected $urlBuilder;

    /**
     * Constructor
     *
     * @param FormKey $formKey
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        FormKey $formKey,
        UrlInterface $urlBuilder,
    ) {
        $this->formKey = $formKey;
        $this->urlBuilder = $urlBuilder;
    }
    /**
     * Build URL
     *
     * @return string
     */
    public function getFormAction()
    {
        return $this->urlBuilder->getUrl('execommad/index/runcommand', ['_secure' => true]);
    }
    /**
     * Form key
     *
     * @return string
     */
    public function getFormKey()
    {
        return $this->formKey->getFormKey();
    }
}
