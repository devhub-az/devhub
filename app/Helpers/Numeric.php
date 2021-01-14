<?php

namespace App\Helpers;

class Numeric
{
    public static function bcmul_alternative($n, $m, $dec = 0)
    {
        $value = $n * $m;
        if ($dec) {
            $value = round($value, $dec);
        }

        return $value;
    }

    public static function convert($size): string
    {
        $unit = ['b', 'kb', 'mb', 'gb', 'tb', 'pb'];

        return @round($size / (1024 ** ($i = floor(log($size, 1024)))), 2).' '.$unit[$i];
    }

    public static function number_format_short($number)
    {
        if ($number >= 0 && $number < 1000) {
            // 1 - 999
            $number_format = floor($number);
            $suffix = '';
        } elseif ($number >= 1000 && $number < 1000000) {
            // 1k-999k
            $number_format = floor($number / 1000);
            $suffix = 'K+';
        } elseif ($number >= 1000000 && $number < 1000000000) {
            // 1m-999m
            $number_format = floor($number / 1000000);
            $suffix = 'M+';
        } elseif ($number >= 1000000000 && $number < 1000000000000) {
            // 1b-999b
            $number_format = floor($number / 1000000000);
            $suffix = 'B+';
        } elseif ($number >= 1000000000000) {
            // 1t+
            $number_format = floor($number / 1000000000000);
            $suffix = 'T+';
        }

        return empty($number_format.$suffix) ? 0 : $number_format.$suffix;
    }
}
