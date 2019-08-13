<?php
/**
 * Cartin24
 * @package    Cartin24_Productgrid
 * @copyright  Copyright (c) 2015-2016 Cartin24. (http://www.cartin24.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Cartin24_Productgrid_Model_Source_Category  extends Mage_Core_Model_Abstract
{
    public function toOptionArray($addEmpty = true)
    {
        $options = array();
        foreach ($this->getCategory() as $category) {
            $options[$category['value']] =  $category['label'];
        }
        return $options;
    }
    
     public function getCategory( $root,$values,$level = 0)     
     {
		 $level++;    
		if(! $root){
			$store = Mage::app()->getFrontController()->getRequest()->getParam('store', 0);
			$parentCategoryId = $store ? Mage::app()->getStore($store)->getRootCategoryId() : 1; 
		}else
			$parentCategoryId = $root;
		$categories = Mage::getModel('catalog/category')->getCollection()
			  ->addFieldToFilter('parent_id', array('eq'=>$parentCategoryId))
			  ->addAttributeToSelect('*');		
		
		foreach($categories as $cats){
			
				$values[$cats->getEntityId()]['value'] =  $cats->getEntityId();
				$values[$cats->getEntityId()]['label'] = str_repeat("--", $level) . $cats->getName();	
				
				$values = $this->getCategory($cats->getEntityId(),$values, $level);
			}
		return $values;
     }
    
}
