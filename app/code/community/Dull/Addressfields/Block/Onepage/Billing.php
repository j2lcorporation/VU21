<?php 

class Dull_Addressfields_Block_Onepage_Billing extends Mage_Checkout_Block_Onepage_Billing
{
    /**
     * Returns the position of the given @a field.
     *
     * @param field string The field.
     *
     * @return int
     */
    public function getAddressPosition($field)
    {
        
        if (!Mage::helper('customer/address')->getConfig('address_order')) {
            
            if ($field == 'city') {
                return 1;
            } else {
                return 2;
            }
            
        } else {
        
            if ($field == 'city') {
                return 2;
            } else {
                return 1;
            }
        
        }

    }
}