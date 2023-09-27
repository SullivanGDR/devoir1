<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Usager;

class UsagerFixtures extends Fixture
{
    private $faker;

    public function __construct(){
        $this->faker=Factory::create("fr_FR");
    }
    public function load(ObjectManager $manager): void
    {
        for($i=0;$i<10;$i++){
            $usager = new Usager();
            $usager->setNom($this->faker->lastName());
            $usager->setPrenom($this->faker->firstName());
            $usager->setAdresse($this->faker->streetAddress());
            $usager->setVille($this->faker->city());
            $usager->setCodePostal(substr($this->faker->postcode(), 0, 5));
            $usager->setTelFixe($this->faker->phoneNumber());
            $usager->setTelMobile($this->faker->phoneNumber());
            $usager->setMel(strtolower($usager->getPrenom()).'.'.strtolower($usager->getNom()).'@'.$this->faker->freeEmailDomain());
            $manager->persist($usager);
        }
        $manager->flush();
    }
}