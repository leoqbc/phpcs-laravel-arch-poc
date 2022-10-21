<?php

namespace App\Domain\Model\Enum;

enum Motorcycle: string
{
    case OPEN  = 'open';
    case CLOSED = 'closed';
}