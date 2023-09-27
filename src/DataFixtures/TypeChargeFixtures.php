<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\TypeCharge;

class TypeChargeFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $typeCharge = new TypeCharge();
            $typeCharge->setLibelleTypeCharge($this->faker->word());
            $typeCharge->setPuissanceTypeCharge($this->faker->randomNumber(5, true));
            $manager->persist($typeCharge);
        }
        $manager->flush();
    }
}