<?php

class Dull_Addressfields_Model_System_Config_Source_Addressorder
{

    public function toOptionArray()
    {
        return array(
            array('value'=>0, 'label'=>Mage::helper('adminhtml')->__('City, Postal code')),
            array('value'=>1, 'label'=>Mage::helper('adminhtml')->__('Postal code, City')),
        );
    }
    
}