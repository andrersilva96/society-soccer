<?php

namespace App\Enums;

enum Level: string
{
    use UsefulEnums;

    case Excelent = 1;
    case Good = 2;
    case Regular = 3;
    case Bad = 4;
    case TooBad = 5;
}
