<?php
/**
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @category   BL
 * @package    BL_CustomGrid
 * @copyright  Copyright (c) 2011 Benoît Leulliette <benoit.leulliette@gmail.com>
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class BL_CustomGrid_Model_System_Config_Source_Exceptions_Handling_Mode
{
    public function toOptionArray()
    {
        $helper = Mage::helper('customgrid');
        return array(
            array(
                'value' => BL_CustomGrid_Helper_Config::GRID_EXCEPTION_HANDLING_EXCLUDE,
                'label' => $helper->__('Exclude'),
            ),
            array(
                'value' => BL_CustomGrid_Helper_Config::GRID_EXCEPTION_HANDLING_ALLOW,
                'label' => $helper->__('Allow'),
            ),
         );
    }
}