<?php

namespace App\Helpers;

class Numeric
{
    static function number_format_short( $number ) {
        if ($number >= 0 && $number < 1000) {
            // 1 - 999
            $number_format = floor($number);
            $suffix = '';
        } else if ($number >= 1000 && $number < 1000000) {
            // 1k-999k
            $number_format = floor($number / 1000);
            $suffix = 'K+';
        } else if ($number >= 1000000 && $number < 1000000000) {
            // 1m-999m
            $number_format = floor($number / 1000000);
            $suffix = 'M+';
        } else if ($number >= 1000000000 && $number < 1000000000000) {
            // 1b-999b
            $number_format = floor($number / 1000000000);
            $suffix = 'B+';
        } else if ($number >= 1000000000000) {
            // 1t+
            $number_format = floor($number / 1000000000000);
            $suffix = 'T+';
        }

        return empty($number_format . $suffix) ? 0 : $number_format . $suffix ;
    }
}
