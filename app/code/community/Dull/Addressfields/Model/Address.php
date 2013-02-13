<?php

class Dull_Addressfields_Model_Address extends Mage_Customer_Model_Address
{
    
    public function validate()
    {
        $errors = array();
        $helper = Mage::helper('customer');
        $this->implodeStreetAddress();
        if (!Zend_Validate::is($this->getFirstname(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter first name.');
        }

        if (!Zend_Validate::is($this->getLastname(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter last name.');
        }
        
        if (('req' === Mage::helper('customer/address')->getConfig('company_show'))
            && !Zend_Validate::is($this->getCompany(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter company.');
        }

        if (!Zend_Validate::is($this->getStreet(1), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter street.');
        }

        if (!Zend_Validate::is($this->getCity(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter city.');
        }

        if (('req' === Mage::helper('customer/address')->getConfig('telephone_show'))
            && !Zend_Validate::is($this->getTelephone(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter telephone.');
        }
        
        if (('req' === Mage::helper('customer/address')->getConfig('fax_show'))
            && !Zend_Validate::is($this->getFax(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter fax.');
        }

        $_havingOptionalZip = Mage::helper('directory')->getCountriesWithOptionalZip();
        if (!in_array($this->getCountryId(), $_havingOptionalZip) && !Zend_Validate::is($this->getPostcode(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter zip/postal code.');
        }

        if (!Zend_Validate::is($this->getCountryId(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter country.');
        }

        if (('req' === Mage::helper('customer/address')->getConfig('region_show'))
            && !Zend_Validate::is($this->getRegion(), 'NotEmpty')) {
            $errors[] = $helper->__('Please enter state/province.');
        }

        if (empty($errors) || $this->getShouldIgnoreValidation()) {
            return true;
        }
        return $errors;
    }
}
