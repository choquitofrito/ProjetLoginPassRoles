<?php

namespace App\DataFixtures;

use DateTime;
use App\Entity\GroupeMusique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GroupeMusiqueFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5 ; $i++){
            $groupeMusique = new GroupeMusique();
            $groupeMusique->setNom("le groupe".$i);
            $manager->persist ($groupeMusique);
            
        }

        $manager->flush();
    }
}
