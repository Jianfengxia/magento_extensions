<?php
/*
 * Arcanum Dev PayPal Enabler
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to arcanumdev@wafunotamago.com so we can send you a copy immediately.
 *
 * @category	Magento Checkout/Shopping Cart Extension
 * @package		Paypal Currency Enabler
 * @author		Amon Antiga 2012/02/26
 * @copyright	Copyright (c) 2012 Arcanum Dev. Y.K.
 * @license		http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Arcanumdev_Paypalenabler_Model_Hostedpro_Request extends Mage_Paypal_Model_Hostedpro_Request{protected $_order;protected $_paymentMethod;protected $_buttonVarFormat='L_BUTTONVAR%d';protected $_notButtonVars=array('METHOD','BUTTONCODE','BUTTONTYPE');public function getRequestData(){$requestData=array();if(!empty($this->_data)){$i=0;foreach($this->_data as $key=>$value){if(in_array($key, $this->_notButtonVars)){$requestData[$key]=$value;}else{$varKey=sprintf($this->_buttonVarFormat, $i);$requestData[$varKey]=$key.'='.$value;$i++;}}}return $requestData;}public function setPaymentMethod($paymentMethod){$this->_paymentMethod=$paymentMethod;$requestData=$this->_getPaymentData($paymentMethod);$this->addData($requestData);return $this;}public function setOrder($order){$this->_order=$order;$requestData=$this->_getOrderData($order);$this->addData($requestData);return $this;}protected function _getPaymentData(Mage_Paypal_Model_Hostedpro $paymentMethod){$request=array('paymentaction'=>strtolower($paymentMethod->getConfigData('payment_action')),'notify_url'=>$paymentMethod->getNotifyUrl(),'cancel_return'=>$paymentMethod->getCancelUrl(),'return'=>$paymentMethod->getReturnUrl(),'lc'=>$paymentMethod->getMerchantCountry(),'template'=>'templateD','showBillingAddress'=>'false','showShippingAddress'=>'false','showBillingEmail'=>'false','showBillingPhone'=>'false','showCustomerName'=>'false','showCardInfo'=>'true','showHostedThankyouPage'=>'false' );return $request;}protected function _getOrderData(Mage_Sales_Model_Order $order){$request=array('subtotal'=>$this->_formatPrice($this->_formatPrice($order->getPayment()->getAmountAuthorized()) - $this->_formatPrice($order->getTaxAmount()) - $this->_formatPrice($order->getShippingAmount()) ),'tax'=>$this->_formatPrice($order->getTaxAmount()),'shipping'=>$this->_formatPrice($order->getShippingAmount()),'invoice'=>$order->getIncrementId(),'address_override'=>'false','currency_code'=>$order->getOrderCurrencyCode(),'buyer_email'=>$order->getCustomerEmail() );if($billingAddress=$order->getBillingAddress()){$request=array_merge($request, $this->_getBillingAddress($billingAddress));}if($shippingAddress=$order->getShippingAddress()){$request=array_merge($request, $this->_getShippingAddress($shippingAddress));}return $request;}protected function _getShippingAddress(Varien_Object $address){$request=array('first_name'=>$address->getFirstname(),'last_name'=>$address->getLastname(),'city'=>$address->getCity(),'state'=>$address->getRegion(),'zip'=>$address->getPostcode(),'country'=>$address->getCountry(), );$street=Mage::helper('customer/address') ->convertStreetLines($address->getStreet(), 2);$request['address1']=isset($street[0]) ? $street[0]: '';$request['address2']=isset($street[1]) ? $street[1]: '';return $request;}protected function _getBillingAddress(Varien_Object $address){$request=array('billing_first_name'=>$address->getFirstname(),'billing_last_name'=>$address->getLastname(),'billing_city'=>$address->getCity(),'billing_state'=>$address->getRegion(),'billing_zip'=>$address->getPostcode(),'billing_country'=>$address->getCountry(), );$street=Mage::helper('customer/address') ->convertStreetLines($address->getStreet(), 2); $request['billing_address1']=isset($street[0]) ? $street[0]: '';$request['billing_address2']=isset($street[1])?$street[1]: '';return $request;}protected function _formatPrice($string){return sprintf('%.2F', $string);}}