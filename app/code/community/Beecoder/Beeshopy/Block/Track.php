<?php
class Beecoder_Beeshopy_Block_Track extends Mage_Core_Block_Template {
 
  public function getOrder()
  {
      if ($this->_order === null) {
          $orderId = Mage::getSingleton('checkout/session')->getLastOrderId();
          if ($orderId) {
              $order = Mage::getModel('sales/order')->load($orderId);
              if ($order->getId()) {
                  $this->_order = $order;
              }
          }
      }
      return $this->_order;
  }

  public function trackingCode(){
    $shop = Mage::getModel('core/cookie')->get("beetailer_shop");
    $checkout = Mage::getModel('core/cookie')->get("beetailer_checkout");

    if($order = $this->getOrder()){
      $res = '<script type="text/javascript" src=\'//www.beetailer.com/s.js'.
              '?p[order_number]='.$order->getIncrementId().
              '&p[amount]='.urlencode(sprintf("%.2f", $order->getSubtotal())).
              '&p[order_date]='.urlencode($order->getCreatedAt()).
              '&p[email]='.urlencode($order->getCustomerEmail()).
              '&p[checkout_token]='.urlencode($checkout).
              '&p[shop_token]='.urlencode($shop).
              '&p[shop_domain]='.urlencode(Mage::getBaseURL()).
              '\'></script>';

      // Mage::getModel('core/cookie')->delete("beetailer_shop");
      Mage::getModel('core/cookie')->delete("beetailer_checkout");
    }
    return $res;
  }

}
?>
