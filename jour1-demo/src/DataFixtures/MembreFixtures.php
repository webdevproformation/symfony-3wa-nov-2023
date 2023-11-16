<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Membre;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class MembreFixtures extends Fixture
{
    private $hasher ; 

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for($i= 0 ; $i <= 5 ; $i++){
            $membre = new Membre();
            $membre->setEmail( $faker->email() )
                    ->setPseudo($faker->name());

            $hashedPassword = $this->hasher->hashPassword($membre , "demo");
        
            $membre->setPassword($hashedPassword);

            $manager->persist($membre);
            $manager->flush();

            $this->addReference("membre_{$i}", $membre);
        }
    }
}
