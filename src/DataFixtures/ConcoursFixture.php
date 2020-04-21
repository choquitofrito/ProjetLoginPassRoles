<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\Concours;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ConcoursFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5 ; $i++){
            $concours = new Concours();
            $concours->setNom("nom".$i);
            $concours->setDateConcours(new DateTime());
            $manager->persist ($concours);
        }

        $manager->flush();
    }
}
