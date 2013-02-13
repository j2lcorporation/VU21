<?php

class Dull_Addressfields_Block_Widget_City extends Mage_Customer_Block_Widget_Abstract
{
    /**
     * Initialize block
     */
    public function _construct()
    {
        parent::_construct();
        $this->setTemplate('dull/addressfields/customer/widget/city.phtml');
    }

    /**
     * Check if city attribute enabled in system
     *
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->getConfig('city_show');
    }

    /**
     * Check if city attribute marked as required
     *
     * @return bool
     */
    public function isRequired()
    {
        return 'req' == $this->getConfig('city_show');
    }
}
