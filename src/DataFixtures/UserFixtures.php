<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en_EN');
        for ($i = 0; $i < 30; $i++) {
            $user = new User();
            $user->setPseudo($faker->lastname);
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);
            $user->setFirstname($faker->firstName);
            $user->setLastname($faker->lastName);
            $user->setPhone($faker->phoneNumber);
            $user->setSkills($faker->text);
            $user->setImage('https://picsum.photos/id/' . $i . '/300/300');
            $user->setBio($faker->realText(200));
            $user->setRole($faker->randomElement(['ROLE_USER', 'ROLE_ADMIN']));
            $user->setType($faker->randomElement(['Apsiders', 'Customers']));
            $user->setAgency($this->getReference('agency_' . $i));
            $manager->persist($user);
          }
        $manager->flush();
    }
}
