<?php


function persianNumber($number)
{
    $persian = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];

    $num = range(0, 9);
    $convertedPersianNums = str_replace($num, $persian, $number);
    
    return $convertedPersianNums;
}