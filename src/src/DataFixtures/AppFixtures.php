<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\ProductFactory;
use App\Factory\RoleFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
//        $user1 = new User();
//
//        $user1->setMail('maxime@40-60studio.com');
//        $user1->setPassword('123456');
//        $user1->setPicture('https://images.unsplash.com/photo-1664894364785-90a4f1eab09b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80');
//        $user1->setRole('admin');
//        $user1->setUsername('Maxime');
//
//
//
//        $manager->persist($user1);
//        $manager->flush();

        RoleFactory::createMany(4);
        UserFactory::createMany(10);

    }
}