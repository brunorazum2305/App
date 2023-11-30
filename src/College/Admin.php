<?php

namespace App\College;

use App\Common\Person;

class Admin extends Person
{
    public function sayHello(): void
    {
        echo "Ja sam administrator \n";
    }

    public function getRole(): string
    {
        return 'admin';
    }
}
