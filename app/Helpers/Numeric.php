<?php

namespace App\Helpers;

use App\Models\User;

class Numeric
{
    public static function admin(): array
    {
        $users = User::count('id');
        $ratings = User::sum('rating');
        $karma = User::sum('karma');

        return [
            'users'   => number_format($users),
            'ratings' => number_format($ratings),
            'karma'   => number_format($karma),
            //            'cache' => number_format(count($cache)),
        ];
    }

    public static function bcmul_alternative($n, $m, $dec = 0)
    {
        $value = $n * $m;
        if ($dec) {
            $value = round($value, $dec);
        }

        return $value;
    }

    public static function convert(int $size): string
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
