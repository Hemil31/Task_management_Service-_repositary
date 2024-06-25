<?php

namespace App\Enums;

enum Status: int
{
    case TODO = 0;
    case IN_PROGRESS = 1;
    case DONE = 2;

    public function label(): string
    {
        return match ($this) {
            self::TODO => 'To Do',
            self::IN_PROGRESS => 'In Progress',
            self::DONE => 'Completed',
        };
    }
}
