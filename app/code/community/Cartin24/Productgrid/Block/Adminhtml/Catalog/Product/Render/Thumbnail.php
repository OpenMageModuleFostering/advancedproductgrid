<?php
/**
 * Cartin24
 * @package    Cartin24_Productgrid
 * @copyright  Copyright (c) 2015-2016 Cartin24. (http://www.cartin24.com)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
 class Cartin24_Productgrid_Block_Adminhtml_Catalog_Product_Render_Thumbnail extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $width = 100;
        $product = Mage::getModel('catalog/product')->load($row->getEntityId());        
        if($product->getId())
            $image_url = Mage::getModel('catalog/product_media_config')->getMediaUrl($product->getImage());
        $out = "<img src=". $image_url ." width='". $width ."px' title='". $product->getName() ."'/>"; 
        return $out;
    }

}
