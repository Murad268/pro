<?php

if (!function_exists('ActivateCode')) {
   function ActivateCode()
   {
      // Your helper function logic here
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $code = substr(str_shuffle($characters), 0, 10);
      return $code;
   }
}
