<?php

namespace LFP\TimbalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CourseType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('day', TextType::class, array(
    'required' => false))
        ->add('chosenHour', NumberType::class, array(
    'required' => false))
        ->add('chosenMinute', NumberType::class, array(
    'required' => false))
        ->add('durationHour', NumberType::class, array(
    'required' => false))
        ->add('durationMinute', NumberType::class, array(
    'required' => false))
        ->add('teacher', TextType::class, array(
    'required' => false))
        ->add('course', ChoiceType::class, array(
          'required'=> true,
          'choices' =>array(
             'Choose One' => '',
             'Geography' => 'geography',
             'History' => 'history',
             'Sport' => 'sport',
             'Maths' => 'maths',
             'French' => 'french',
             'English' => 'english',
             'Sociology' => 'sociology',
             'Psychology' => 'psychology',
             'Litterature' => 'litterature',
             'Biology' => 'biology',
             'Physics' => 'physics',
             'Chemistry' => 'chemistry',
             'BabyFoot' => 'babyFoot',
             'Anthropology' => 'anthropology',
             'Anthropology' => 'archaeology',
             'Accounting & Finance' => 'accountingFinance',
             'Criminology' => 'criminology',
             'Film Making' => 'filmMaking',
             'Education' => 'education',
             'East & South Asian Studies' => 'eastSouthAsianStudies',
             'Geology' => 'geology',
             'History of Art, Architecture & Design' => 'historyOfArtArchitectureDesign',
             'Land & Property Management' => 'landPropertyManagement',
             'Law' => 'law',
             'Librarianship & Information Management' => 'librarianshipInformationManagement',
             'BabyFoot' => 'babyFoot',
             'Marketing' => 'marketing',
             'Linguistics' => 'linguistics',
             'English' => 'english',
             'French' => 'french',
             'General Engineering' => 'generalEngineering',
             'Music' => 'music',
             'Social Work' => 'socialWork',
             'Robotics' => 'robotics',
             'Youth Work' => 'youthWork',
             'Politics' => 'politics',
             'Medicine' => 'medicine',
          )
        ))
        ->add('building', TextType::class, array(
    'required' => false))
        ->add('room', TextType::class)
        //->add('user', Text::class)
        ->add('save', SubmitType::class);
    }
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'LFP\TimbalBundle\Entity\Course'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lfp_timbalbundle_course';
    }
}
