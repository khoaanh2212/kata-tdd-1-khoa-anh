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
            $delimiter = ",";
            $has_delimiter = false;
            $arrDelimiter = [];
            //get delimiter
            if (strpos($string, "//") === 0) {
                $end_define_delimiter = strpos($string, "\n");
                if ($end_define_delimiter !== false) {
                    $str_delimiter = substr($string, 2, $end_define_delimiter - 2);
                    if (is_null($str_delimiter)) {
                        return false;
                    } else {

                        if (strpos($str_delimiter, "[") !== false) {
                            $start = -1;
                            $end = -1;
                            for ($i = 0; $i < strlen($str_delimiter); $i++) {
                                if ($str_delimiter[$i] == "[") {
                                    $start = $i;
                                }
                                if ($str_delimiter[$i] == "]" && $start >= 0) {
                                    $delimiter = substr($str_delimiter, $start + 1, $i - $start - 1);
                                    if (in_array($delimiter, $arrDelimiter) === false) {
                                        $arrDelimiter[] = $delimiter;
                                    }
                                    $start = -1;
                                }
                            }
                        } else {
                            $arrDelimiter[] = $str_delimiter;
                        }

                    }
                }
                $has_delimiter = true;
            }
            if ($has_delimiter) {
                if (!is_null($end_define_delimiter)) {
                    $string = substr($string, $end_define_delimiter + 1);
                }
            } else {
                $arrDelimiter[] = $delimiter;
            }
            //sort by string lenght delimiter
            array_multisort(array_map('strlen', $arrDelimiter), SORT_DESC, $arrDelimiter);
            foreach ($arrDelimiter as $item) {
                $string = str_replace($item, ",", $string);
            }
            $arr = explode(",", $string);
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