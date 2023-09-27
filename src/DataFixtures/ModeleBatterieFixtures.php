<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\ModeleBatterie;

class ModeleBatterieFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $modeleB = new ModeleBatterie();
            $modeleB->setCapacite($this->faker->randomNumber(5, true));
            $modeleB->setFabricant($this->faker->company());
            $manager->persist($modeleB);
        }
        $manager->flush();
    }
}