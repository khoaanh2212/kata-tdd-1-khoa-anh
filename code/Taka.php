<?php

/**
 * Created by PhpStorm.
 * User: Ka
 * Date: 7/24/15
 * Time: 3:58 PM
 */
class Taka
{
    public function Add($string, $delimiter = ",")
    {
        if (trim($string) == "") {
            return 0;
        } else {
            $arr = explode("$delimiter", $string);
            $sum = 0;
            foreach ($arr as $number) {
                if (strpos($number, "\n")) {
                    $arrNumber = explode("\n", $number);
                    foreach ($arrNumber as $subNumber) {
                        if (is_numeric($subNumber)) {
                            $sum += $subNumber;
                        }
                    }
                }
                if (is_numeric($number)) {
                    $sum += $number;
                }
            }
            return $sum;
        }

    }

}