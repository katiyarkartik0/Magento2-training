<?php

namespace UserStory8\Module1\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
   public $FIRST_NAME = "First Name";
   public $LAST_NAME = "Last Name";

   public function getActionUrl()
   {
      return $this->getUrl("userstory8module1/form/save");
   }

}