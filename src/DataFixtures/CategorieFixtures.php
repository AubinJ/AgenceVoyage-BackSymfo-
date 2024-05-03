<?php

namespace App\DataFixtures;

use App\Entity\AvCategorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CategorieFixtures extends Fixture
{
    private $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; $i++) {
            $categorie = new AvCategorie;
            $categorie->setNom($this->faker->words(2, true));

            $manager->persist($categorie);
            $manager->flush();
        }
    }
}
