<?php

class Infortis_CloudZoom_Helper_Data extends Mage_Core_Helper_Abstract
{	
	public function getCfgGeneral($optionString)
	{
        return Mage::getStoreConfig('cloudzoom/general/' . $optionString);
    }
}
