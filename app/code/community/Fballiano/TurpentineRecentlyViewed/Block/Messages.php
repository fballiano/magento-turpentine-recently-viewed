<?php
/**
 * FBalliano
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this Module to
 * newer versions in the future.
 *
 * @category   FBalliano
 * @package    Fballiano_TurpentineRecentlyViewed
 * @copyright  Copyright (c) 2014 Fabrizio Balliano (http://fabrizioballiano.it)
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Fballiano_TurpentineRecentlyViewed_Block_Messages extends Nexcessnet_Turpentine_Block_Core_Messages
{
    public function _prepareLayout()
    {
        try {
            if (isset($_SERVER["HTTP_REFERER"]) and $_SERVER["HTTP_REFERER"]) {
                $vPath = $_SERVER["HTTP_REFERER"];
                $vPath = basename($vPath, ".html");
                $product_id = Mage::getModel('catalog/product')->getCollection()->addAttributeToFilter('url_key', $vPath)->getFirstItem()->getId();
                if ($product_id) {
                    Mage::getModel('reports/product_index_viewed')
                        ->setProductId($product_id)
                        ->save()
                        ->calculate();

                    $eventTypeId = Mage_Reports_Model_Event::EVENT_PRODUCT_VIEW;
                    $objectId = $product_id;
                    $subtype = 0;
                    if (Mage::getSingleton('customer/session')->isLoggedIn()) {
                        $customer = Mage::getSingleton('customer/session')->getCustomer();
                        $subjectId = $customer->getId();
                        Mage::getSingleton('enterprise_customersegment/customer')->processEvent("catalog_product_view", $customer, Mage::app()->getStore()->getWebsite());
                    }
                    else {
                        $subjectId = Mage::getSingleton('log/visitor')->getId();
                        $subtype = 1;
                    }

                    $eventModel = Mage::getModel('reports/event');
                    $storeId    = Mage::app()->getStore()->getId();
                    $eventModel
                        ->setEventTypeId($eventTypeId)
                        ->setObjectId($objectId)
                        ->setSubjectId($subjectId)
                        ->setSubtype($subtype)
                        ->setStoreId($storeId);
                    $eventModel->save();
                }
            }
        } catch (Exception $e) {}

        return parent::_prepareLayout();
    }
}