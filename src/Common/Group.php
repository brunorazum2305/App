<?php

namespace App\Common;

class Group
{
    private array $persons = [];

    public function addPerson(Person $person)
    {
        $this->persons[] = $person;
    }

    public function printInfo()
    {
        foreach ($this->persons as $person) {
            $person->sayHello();
        }
    }
}
