<?php

if (!function_exists('PasswordHash')) {
   function PasswordHash($param)
   {
      return hash('sha256', $param);
   }
}
