<?php

namespace App\College;

class OnlineRoom
{
    public function __construct(private Group $group)
    {}

    public function connect(OnlineRoomConnectable $onlineRoomConnectable)
    {
        if (!in_array($onlineRoomConnectable->getRole(), ['admin', 'teacher', 'tool'])){
            echo "Osoba {$onlineRoomConnectable->getName()} nije spojen/a! \n";
            return;
        }

        echo "{$onlineRoomConnectable->getName()} je spojen/a! \n";
    }
}