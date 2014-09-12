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
class Fballiano_TurpentineRecentlyViewed_Model_Esi extends Nexcessnet_Turpentine_Model_Observer_Esi
{
    public function addMessagesBlockRewrite($eventObject)
    {
        if (Mage::helper('turpentine/esi')->shouldFixFlashMessages()) {
            Varien_Profiler::start('turpentine::observer::esi::addMessagesBlockRewrite');
            Mage::getSingleton('turpentine/shim_mage_core_app')
                ->shim_addClassRewrite(
                    'block',
                    'core',
                    'messages',
                    'Fballiano_TurpentineRecentlyViewed_Block_Messages'
                );
            Varien_Profiler::stop('turpentine::observer::esi::addMessagesBlockRewrite');
        }
    }
}