<?php

$num=153;

$sum=0;
$temp=$num;

while($temp>0){
    $digit=$temp%10;
    $sum += $digit*$digit*$digit;
    $temp=floor($temp/10);
}

echo ($sum==$num) ? "Yes":"No";