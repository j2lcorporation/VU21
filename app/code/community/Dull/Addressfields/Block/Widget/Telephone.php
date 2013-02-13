<?php

class Dull_Addressfields_Block_Widget_Telephone extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('dull/addressfields/customer/widget/telephone.phtml');
    }

    /**
     * Check if telephone attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfig('telephone_show');
    }

    /**
     * Check if telephone attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return 'req' == $this->getConfig('telephone_show');
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
