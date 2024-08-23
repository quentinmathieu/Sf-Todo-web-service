<?php

namespace App\DataFixtures;

use App\Entity\TaskList;
use App\Entity\Task;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $taskLists = [];
        // create 5 taskLists
        for ($i = 0; $i < 10; $i++) {
            $taskList = new TaskList();
            $taskList->setName('taskList '.$i);
            $manager->persist($taskList);
            $taskLists []= $taskList;
        }

        // create 20 tasks! Bam!
        for ($i = 0; $i < 800; $i++) {
            $task = new Task();
            $task->setContent('task '.$i);
            $task->settaskList($taskLists[mt_rand(0,9)]);
            $manager->persist($task);
        }
        $manager->flush();
    }
}
