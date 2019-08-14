<?php
/**
 * Dropfin
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Academic Free License (AFL 3.0)
 * that is bundled with this package in the file LICENSE_AFL.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/afl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magento.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade 
 * this extension to newer versions in the future. 
 *
 * @category    Dropfin
 * @package     Newsletter Popup
 * @copyright   Copyright (c) Dropfin (http://www.dropfin.com)
 */

class Dropfin_Newsletterpopup_Block_Adminhtml_System_Config_Color extends Mage_Adminhtml_Block_System_Config_Form_Field {

	protected function _getElementHtml( Varien_Data_Form_Element_Abstract $element ) {
		
		$color = new Varien_Data_Form_Element_Text();
		$data = array(
			'name'      => $element->getName(),
			'html_id'   => $element->getId(),
		);
		$color->setData( $data );
		$color->setValue( $element->getValue(), $format );
		$color->setForm( $element->getForm() );
		$color->addClass( 'jscolor ' . $element->getClass() );

		return $color->getElementHtml();
	}

}
