<?php

class Dull_Addressfields_Block_Widget_Postcode extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('dull/addressfields/customer/widget/postcode.phtml');
    }

    /**
     * Check if postcode attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfig('postcode_show');
    }

    /**
     * Check if postcode attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return 'req' == $this->getConfig('postcode_show');
    }
}
