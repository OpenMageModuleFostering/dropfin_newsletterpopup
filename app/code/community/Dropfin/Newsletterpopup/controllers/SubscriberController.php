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

require_once(Mage::getModuleDir('controllers', 'Mage_Newsletter') . DS . 'SubscriberController.php');
class Dropfin_Newsletterpopup_SubscriberController extends Mage_Core_Controller_Front_Action
{
    public function newAction()
    {	
    	if ($this->getRequest()->isPost() && $this->getRequest()->getPost('email')) {
            $session = Mage::getSingleton('core/session');
            $customerSession = Mage::getSingleton('customer/session');
            $email = (string) $this->getRequest()->getPost('email');

            $subscribeErr = false;
            $isAajax = $this->getRequest()->getPost('is_ajax');

            try {
                if (!Zend_Validate::is($email, 'EmailAddress')) {
                    Mage::throwException($this->__('Please enter a valid email address.'));
                }

                if (Mage::getStoreConfig(Mage_Newsletter_Model_Subscriber::XML_PATH_ALLOW_GUEST_SUBSCRIBE_FLAG) != 1 && !$customerSession->isLoggedIn()) {
                    Mage::throwException($this->__('Sorry, but administrator denied subscription for guests. Please <a href="%s">register</a>.', Mage::helper('customer')->getRegisterUrl()));
                    $session->setMyMessage('Sorry, but administrator denied subscription for guests. Please <a href="%s">register</a>.', Mage::helper('customer')->getRegisterUrl());
                    $subscribeErr = true;
                }

                // $ownerId = Mage::getModel('customer/customer')
                //         ->setWebsiteId(Mage::app()->getStore()->getWebsiteId())
                //         ->loadByEmail($email)
                //         ->getId();
                $subscriberModel = Mage::getModel('newsletter/subscriber')->loadByEmail($email);
                $subbed = ($subscriberModel->isSubscribed() ? true : false);

                if ($subbed) {
                    Mage::throwException($this->__('This email address is already assigned to another user.'));
                    $session->setMyMessage('This email address is already assigned to another user.');
                    $subscribeErr = true;
                }

                $status = Mage::getModel('newsletter/subscriber')->subscribe($email);
                if ($status == Mage_Newsletter_Model_Subscriber::STATUS_NOT_ACTIVE) {
                    $session->addSuccess($this->__('Confirmation request has been sent.'));
                } else {
                    $session->addSuccess($this->__('Thank you for your subscription'));
                }
            } catch (Mage_Core_Exception $e) {
                $session->addException($e, $this->__('There was a problem with the subscription: %s', $e->getMessage()));
                $subscribeErr = true;
            } catch (Exception $e) {
                $session->addException($e, $this->__('There was a problem with the subscription.'));
                $subscribeErr = true;
            }
        }

        if ($isAajax == 1) {

            $subscribeAjaxMessage = array();
            $subscribeSuccess = ($subscribeErr == true) ? 'true' : 'false';
            $subscribeMessage = array();

            $successMessage = $this->__('Thank you for subscribing to our Newsletter.');

            $messages = Mage::getSingleton('core/session')->getMessages(true);
            foreach ($messages->getItems() as $message) {
                $subscribeMessage[] = $message->getText();
            }

            $subscribeAjaxMessage['success'] = $subscribeSuccess;
            $subscribeAjaxMessage['msg'] = implode('<br>', $subscribeMessage);

            $this->getResponse()->setHeader('Content-type', 'application/json');
            echo $this->getResponse()->setBody(json_encode($subscribeAjaxMessage));
            exit;
        }
        $this->_redirectReferer();
    }
}