<?php

namespace App\College;

use App\Common\Person;

class Teacher extends Person
{
    public function __construct(
        string $name, int $years = 18, private string $title
        )
    {
        parent::__construct($name, $years);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function sayHello(): void
    {
        echo "Predavac: {$this->getName()} \n";
        echo "Titula: {$this->getTitle()} \n";
        echo "Broj godina: {$this->getYears()} \n";
    }

    public function getRole(): string
    {
        return 'teacher';
    }
}