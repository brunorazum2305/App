<?php

namespace App;

use App\Common\Car;
use App\College\Group;
use App\College\OnlineRoom;
use App\College\OnlineRoomTool;
use App\College\Student;
use App\Common\Group as CommonGroup;

require __DIR__ . '/vendor/autoload.php';

$group = new CommonGroup();
$group->addPerson(new Student(name: 'Marko Markovic', years: 23));
$group->addPerson(new Student('Ivan Ivic'));
$group->printInfo();

echo "\n";

$group = new Group();
$group->setName('OL-OBE_DEV_H-04/23');

$marko = new Student(name: 'Marko Markovic', years: 23);
$ivan = new Student('Ivan Ivic');
$petar = new Student('Petar Peric');

$group->addStudent($marko);
$group->addStudent($ivan);
$group->addStudent($petar);

$chatGPT = new OnlineRoomTool('ChatGPT');

$onlineRoom = new OnlineRoom($group);
$onlineRoom->connect($group->getTeacher());
$onlineRoom->connect($group->getAdmin());
$onlineRoom->connect($marko);
$onlineRoom->connect($ivan);
$onlineRoom->connect($petar);
$onlineRoom->connect($chatGPT);

echo "\n";

$car = new Car();
$car->honk();
