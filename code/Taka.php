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
            $arrException = array();
            foreach ($arr as $number) {
                if (strpos($number, "\n")) {
                    $arrNumber = explode("\n", $number);
                    foreach ($arrNumber as $subNumber) {
                        if (is_numeric($subNumber)) {
                            if ($subNumber >= 0) {
                                $sum += $subNumber;
                            } else {
                                $arrException[] = $subNumber;
                            }

                        }
                    }
                }
                if (is_numeric($number)) {
                    if ($number >= 0) {
                        $sum += $number;
                    } else {
                        $arrException[] = $number;
                    }
                }
            }
            if (count($arrException) > 0) {
                var_dump($arrException);
            }

            return $sum;
        }

    }

}