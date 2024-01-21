<?php

if (!function_exists('GetImage')) {
    function GetImage($url)
    {
        return asset($url);
    }
}
