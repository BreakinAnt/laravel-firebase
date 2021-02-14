<?php
    namespace App\Http\Helpers;

    use Illuminate\Support\Facades\Log;

    class BodyChecker {
        public static function checkBodyAll(){
            $args = func_get_args();
            foreach($args as &$value){
                if(!$value){                   
                    return false;
                }
            }
            return true;
        }

        public static function checkBodyOne(){
            $args = func_get_args();
            foreach($args as &$value){
                if($value){
                    return $value;
                }
            }
            return false;
        }
    }