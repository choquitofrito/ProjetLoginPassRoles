<?php

namespace App\DataFixtures;

use App\Entity\User;

use App\Entity\GroupeMusique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RajouterGroupesUsers extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3 ; $i++){
            
            $user = new User();
            $user->setNom("autre user" . $i);
            $user->setEmail("user".$i."liegroupe@gmx.com");
            $user->setPassword($this->passwordEncoder->encodePassword(
                $user,
                'unpass' 
            ));
            $manager->persist ($user);

            for ($j = 0; $j < 5; $j++){
                $groupeMusique = new GroupeMusique();
                $groupeMusique->setNom("le groupe ".$j." de ".$user->getNom());

                $user->addGroupeGere($groupeMusique);
                $manager->persist ($groupeMusique);
            }
            // dans ce cas on aurait pu faire aussi $groupeMusique->setUser($user);            
        }

        $manager->flush();
    }
}
