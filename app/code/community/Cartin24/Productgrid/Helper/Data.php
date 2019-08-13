<?php
/**
 * Cartin24
 * @package    Cartin24_Productgrid
 * @copyright  Copyright (c) 2015-2016 Cartin24. (http://www.cartin24.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Cartin24_Productgrid_Helper_Data extends Mage_Core_Helper_Abstract {

	public function isCategoryEnabled(){
        return Mage::getStoreConfig('productgrid/settings/category_column_enabled');
    }
     public function isThumbnailEnabled(){
		return Mage::getStoreConfig('productgrid/settings/thumbnail_column_enabled');
    }

}
