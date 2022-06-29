<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Project;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en_EN');
        for ($i = 0; $i < 10; $i++) {
            $project = new Project();
            $project->setName($faker->firstname);
            $project->setSummary($faker->realtext(100));
            $project->setDescription($faker->text);
            $project->setImage($faker->imageUrl(640, 480, 'people'));
            $project->setFiles($faker->text);
            $project->setCreatedAt($faker->dateTime);
            $project->setDeadlineAt($faker->dateTime);
            $project->setSkills($faker->text);
            $project->setAgency($this->getReference('agency_' . $i));
            $manager->persist($project);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AgencyFixtures::class,
        ];
    }
}
