<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Message;
use App\Entity\User;
use App\Factory\ProductFactory;
use App\Factory\RoleFactory;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher) {

    }
    
    public function load(ObjectManager $manager): void
    {
        $user1 = new User();
        $user1->setEmail('test@test.tes');
        $user1->setPassword(
            $this->userPasswordHasher->hashPassword(
                $user1,
                '1234'
            )
        );
        $user1->setUsername('John Doe');
        $user1->setProfilePicture('https://images.unsplash.com/photo-1666644611406-b67537c5ead9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80');
        $user1->setRating(5);
        $user1->setDescription('lorem ipsum');
//      $user1->setRoles(['ROLE_ADMIN']);
        $manager->persist($user1);

        $message1 = new Message();
        $message1->setMessageDesc('lorem ipsum');
        $message1->setAuthor($user1);

        $manager->persist($message1);

        $manager->flush();



    }
}