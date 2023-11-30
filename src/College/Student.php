<?php

namespace App\College;

use App\Common\Person;

class Student extends Person
{
    public function sayHello(): void
    {
        echo "Ime: {$this->name}, godine: {$this->years} \n";
    }

    public function getRole(): string
    {
        return 'student';
    }
}
