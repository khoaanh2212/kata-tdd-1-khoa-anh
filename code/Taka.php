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
                            if ($subNumber >= 0 && $subNumber <= 1000) {
                                $sum += $subNumber;
                            } elseif ($subNumber < 0) {
                                $arrException[] = $subNumber;
                            }

                        }
                    }
                }
                if (is_numeric($number)) {
                    if ($number >= 0 && $number <= 1000) {
                        $sum += $number;
                    } elseif ($number < 0) {
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