<?php

if (!function_exists('customErrorBlock')) {
   function customErrorBlock($fieldName)
   {
       return "@error('$fieldName')
            <div class='alert alert-danger mt-2' role='alert'>
                {!! \$message !!}
            </div>
        @enderror";
   }
}
