<?php

class Dull_Addressfields_Block_Widget_Region extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('dull/addressfields/customer/widget/region.phtml');
    }

    /**
     * Check if region attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfig('region_show');
    }

    /**
     * Check if region attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return 'req' == $this->getConfig('region_show');
    }

    /**
     * Get current customer from session
     *
     * @return Mage_Customer_Model_Customer
     */
    public function getCustomer()
    {
        return Mage::getSingleton('customer/session')->getCustomer();
    }
}
