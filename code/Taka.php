<?php

/**
 * Created by PhpStorm.
 * User: Ka
 * Date: 7/24/15
 * Time: 3:58 PM
 */
class Taka
{
    public function Add($string)
    {
        if (trim($string) == "") {
            return 0;
        } else {
            $arr = explode(",", $string);
            $sum = 0;
            foreach ($arr as $number) {
                if (is_numeric($number)) {
                    $sum += $number;
                }
            }
            return $sum;
        }

    }

}