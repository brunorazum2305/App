<?php

namespace App\College;

use App\College\Admin;
use App\College\Student;
use App\College\Teacher;
use App\Common\Person;

class Group
{
    private const MAX_NUMBER_OF_STUDENTS = 5;

    private string $name;
    private array $students = [];

    public function __construct(
        private Teacher $teacher = new Teacher('Ana Anic', 28, 'Senior Developer'),
        private Admin $admin = new Admin('Admin98 98', 30)
        )
    {}

    public function printInfo() 
    {
        echo "Ime grupe: $this->name \n";
        echo "Polaznici: \n";
        foreach ($this->students as $student) {
            $this->sayHello($student);
        }
        echo "Broj polaznika: {$this->getNumberOfStudents()} \n";
        $this->sayHello($this->teacher);
        $this->sayHello($this->admin);
    }

    private function sayHello(Person $person): void
    {
        $person->sayHello();
    }

    public function setName(string $name) 
    {
        $this->name = $name;
    }

    public function setTeacher(Teacher $teacher) 
    {
        $this->teacher = $teacher;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function getAdmin(): Admin
    {
        return $this->admin;
    }

    public function addStudent(Student $student) 
    {
        if ($this->getNumberOfStudents() >= self::MAX_NUMBER_OF_STUDENTS) {
            return;
        }

        $this->students[] = $student;
    }

    public function getNumberOfStudents() 
    {
        return count($this->students);
    }
}
