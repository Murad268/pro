<?php

if (!function_exists('GetLinkAdmin')) {
   function GetLinkAdmin($url)
   {
      return asset('assets/admin_panel/' . $url);
   }
}
