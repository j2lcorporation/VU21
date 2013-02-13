<?php

class Dull_Addressfields_Model_Customer extends Mage_Customer_Model_Customer
{

    public function validate()
    {
        $errors = array();

        if (!Zend_Validate::is( trim($this->getFirstname()) , 'NotEmpty')) {
            $errors[] = Mage::helper('customer')->__('First name can\'t be empty');
        }

        if (!Zend_Validate::is( trim($this->getLastname()) , 'NotEmpty')) {
            $errors[] = Mage::helper('customer')->__('Last name can\'t be empty');
        }

        if (!Zend_Validate::is($this->getEmail(), 'EmailAddress')) {
            $errors[] = Mage::helper('customer')->__('Invalid email address "%s"', $this->getEmail());
        }

        $password = $this->getPassword();
        if (!$this->getId() && !Zend_Validate::is($password , 'NotEmpty')) {
            $errors[] = Mage::helper('customer')->__('Password can\'t be empty');
        }
        if ($password && !Zend_Validate::is($password, 'StringLength', array(6))) {
            $errors[] = Mage::helper('customer')->__('Password minimal length must be more %s', 6);
        }
        $confirmation = $this->getConfirmation();
        if ($password != $confirmation) {
            $errors[] = Mage::helper('customer')->__('Please make sure your passwords match.');
        }

        if($this->getShowAddressFields()) {
            if (('req' === Mage::helper('customer/address')->getConfig('company_show'))
                && '' == trim($this->getCompany())) {
                $errors[] = Mage::helper('customer')->__('Company is required.');
            }
            if (('req' === Mage::helper('customer/address')->getConfig('region_show'))
                && '' == trim($this->getRegion())) {
                $errors[] = Mage::helper('customer')->__('State/Province is required.');
            }
            if (('req' === Mage::helper('customer/address')->getConfig('telephone_show'))
                && '' == trim($this->getTelephone())) {
                $errors[] = Mage::helper('customer')->__('Telephone is required.');
            }
            if (('req' === Mage::helper('customer/address')->getConfig('fax_show'))
                && '' == trim($this->getFax())) {
                $errors[] = Mage::helper('customer')->__('Fax is required.');
            }
        }
        if (('req' === Mage::helper('customer/address')->getConfig('dob_show'))
            && '' == trim($this->getDob())) {
            $errors[] = Mage::helper('customer')->__('Date of Birth is required.');
        }
        if (('req' === Mage::helper('customer/address')->getConfig('taxvat_show'))
            && '' == trim($this->getTaxvat())) {
            $errors[] = Mage::helper('customer')->__('TAX/VAT number is required.');
        }
        if (('req' === Mage::helper('customer/address')->getConfig('gender_show'))
            && '' == trim($this->getGender())) {
            $errors[] = Mage::helper('customer')->__('Gender is required.');
        }

        if (empty($errors)) {
            return true;
        }
        return $errors;
    }

}
