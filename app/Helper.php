<?php

namespace App;

class Helper
{
    const bg = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
    public static function getBG()
    {
        return self::bg;
    }
}
