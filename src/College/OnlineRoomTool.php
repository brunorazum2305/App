<?php

namespace App\College;

class OnlineRoomTool implements OnlineRoomConnectable
{
    public function __construct(private string $name)
    {}

    public function getRole(): string
    {
        return 'tool';
    }

    public function getName(): string
    {
        return $this->name;
    }
}