<?php
  class Beecoder_Beeshopy_AdminController extends Mage_Adminhtml_Controller_Action
  {
      public function indexAction(){
        $this->loadLayout();
        $this->_setActiveMenu('menu1');  

        /* Load bitnami Passwd */
        $passw = $this->loadApiKey();
        $host = str_replace("/index.php", "", Mage::getBaseURL());

        $block = $this->getLayout()
        ->createBlock('core/text', 'beetailer-admin')
        ->setText("<iframe 
src='https://www.beetailer.com?from=iframe&api[key]=".$passw."&api[user]=beetailer&api[url]=".$host."' 
width=1124 height='2350' frameborder='0' scrolling='no' style='margin:0px 
auto;display:block;'></iframe>");

        $this->_addContent($block);
        $this->renderLayout();
      }

      public function loadApiKey(){
        try { 
          return file_get_contents(Mage::getBaseDir() . '/../conf/beetailer_api_key.txt'); 
        }
        catch(Exception $e){
          return "";
        }
      }
  }
?>
