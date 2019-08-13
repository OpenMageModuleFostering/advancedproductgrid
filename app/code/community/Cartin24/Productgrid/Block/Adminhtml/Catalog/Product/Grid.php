<?php
/**
 * Cartin24
 * @package    Cartin24_Productgrid
 * @copyright  Copyright (c) 2015-2016 Cartin24. (http://www.cartin24.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Cartin24_Productgrid_Block_Adminhtml_Catalog_Product_Grid extends Mage_Adminhtml_Block_Catalog_Product_Grid
{      
    protected function _prepareColumns()
    {
        $helper = Mage::helper('productgrid');
       if($helper->isCategoryEnabled() == 1){
      
            $this->addColumnAfter('category', array(
                    'header'	=> Mage::helper('catalog')->__('Category'),
                    'sortable'	=> false,
                    'width' => '250px',
                    'type'  => 'options',
                    'options'	=> Mage::getSingleton('productgrid/source_category')->toOptionArray(),
                    'renderer'	=> 'Cartin24_Productgrid_Block_Adminhtml_Catalog_Product_Render_Category',
                    'filter_condition_callback' => array($this, 'filterCallback'),
            ),"type");
        }
       if($helper->isThumbnailEnabled()==1){
		   
        $this->addColumnAfter('thumbnail', array(
            'header' => Mage::helper('catalog')->__('Thumbnail'),
            'align' => 'left',
            'index' => 'thumbnail',
            'renderer' => 'Cartin24_Productgrid_Block_Adminhtml_Catalog_Product_Render_Thumbnail',
            'width' => '107'
        ),"entity_id");
    }
        
      
       return parent::_prepareColumns();
    }
    public function filterCallback($collection, $column)
    {
            $value = $column->getFilter()->getValue();
            $_category = Mage::getModel('catalog/category')->load($value);
            $collection->addCategoryFilter($_category);
            return $collection;
    }
   
}
?>
