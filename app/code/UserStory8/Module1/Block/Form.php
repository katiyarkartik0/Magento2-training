<?php

namespace UserStory8\Module1\Block;

use Magento\Framework\View\Element\Template;

class Form extends Template
{
   public static $FIRST_NAME = "First Name";
   public static $LAST_NAME = "Last Name";
   public static $EMAIL_ID = "Email";
   public static $ADDRESS = "Address";
   public static $PHONE_NUMBER = "Phone Number";

   public function getActionUrl()
   {
      return $this->getUrl("userstory8module1/form/save");
   }
   public function getFirstName()
   {
      return self::$FIRST_NAME;
   }
   public function getLastName()
   {
      return self::$FIRST_NAME;
   }

   public function getEmailId()
   {
      return self::$EMAIL_ID;
   }
   public function getAddress()
   {
      return self::$ADDRESS;
   }
   public function getPhoneNumber()
   {
      return self::$PHONE_NUMBER;
   }

}