<?php

class Dull_Addressfields_Block_Widget_Fax extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('dull/addressfields/customer/widget/fax.phtml');
    }

    /**
     * Check if fax attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfig('fax_show');
    }

    /**
     * Check if fax attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return 'req' == $this->getConfig('fax_show');
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
