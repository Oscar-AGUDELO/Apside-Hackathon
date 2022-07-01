<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Agency;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class AgencyFixtures extends Fixture 
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en_EN');
        for ($i = 0; $i < 30; $i++) {
            $agency = new Agency();
            $agency->setName($faker->firstname);
            $agency->setAdress($faker->address);
            $agency->setZipcode($faker->postcode);
            $agency->setCity($faker->city);
            $agency->setCountry($faker->country);
            $agency->setDescription($faker->text);
            $agency->setImage($faker->imageUrl(640, 480, 'people'));
            $this->addReference('agency_' . $i, $agency);
            $this->addReference('project_' . $i, $agency);
            $manager->persist($agency);
        }
    $manager->flush();
    }
}
