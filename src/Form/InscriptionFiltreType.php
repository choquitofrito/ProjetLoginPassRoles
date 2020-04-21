<?php

namespace App\Form;

use App\Entity\Concours;
use App\Entity\Inscription;
use App\Entity\GroupeMusique;
use App\Repository\ConcoursRepository;
use Symfony\Component\Form\AbstractType;
use App\Repository\GroupeMusiqueRepository;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class InscriptionFiltreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        //dd($options['user']);
        $builder
            ->add('dateInscription', DateType::class, [
                'required' => false,
            ])
            ->add('groupeMusique', EntityType::class, [
                'class' => GroupeMusique::class,
                'query_builder' => function (GroupeMusiqueRepository $repo) use ($options) {
                    // dd ($options['user']); // attention au "use" car fonction anonyme
                    // afficher le SQL
                    // dd ($repo->createQueryBuilder('g')->getQuery()->getSql());
                    return $repo->createQueryBuilder('g')
                                ->select ('g')
                                ->innerJoin('g.user','u','WITH','u.id=:idUser')
                                ->setParameter ('idUser',$options['user']);
                                // doc exemples join : https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/reference/query-builder.html
                },
                'choice_label' => function ($groupeMusique) {
                    return $groupeMusique->getNom();
                },

            ])
            ->add('concours', EntityType::class, [
                'class' => Concours::class,
                'query_builder' => function (ConcoursRepository $repo) {
                    
                    return $repo->createQueryBuilder('c');
                },
                'choice_label' => function ($concours) {
                    return $concours->getNom();
                },

            ]);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'user' => null, // valeur de l'option par défaut, car c'est optionnel
            'data_class' => Inscription::class,
        ]);
    }
}
