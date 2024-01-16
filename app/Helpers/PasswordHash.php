<?php

use Illuminate\Support\Facades\Hash;


if (!function_exists('PasswordHash')) {
   function PasswordHash($param)
   {
      return Hash::make($param);
   }
}
