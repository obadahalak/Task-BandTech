<?php

namespace App\Enums;

enum UserType: string
{
     const NORMAL = 'normal';
     const GOLD = 'gold';
     const SILVER = 'silver';

     public static function toArray(): array
     {
         return [
         self::NORMAL,
         self::GOLD,
         self::SILVER
     ];
     }
}
