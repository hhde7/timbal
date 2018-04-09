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
// use LFP\UserBundle\Entity\User;

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
             'Geography' => 'Geography',
             'History' => 'History',
             'Sport' => 'Sport',
             'Maths' => 'Maths',
             'French' => 'French',
             'English' => 'English',
             'Sociology' => 'Sociology',
             'Psychology' => 'Psychology',
             'Litterature' => 'Litterature',
             'Biology' => 'Biology',
             'Physics' => 'Physics',
             'Chemistry' => 'Chemistry',
             'BabyFoot' => 'BabyFoot',
             'Anthropology' => 'Anthropology',
             'Anthropology' => 'Anthropology',
             'Accounting & Finance' => 'Accounting & Finance',
             'Criminology' => 'Criminology',
             'Film Making' => 'Film Making',
             'Education' => 'Education',
             'East & South Asian Studies' => 'East & South Asian Studies',
             'Geology' => 'Geology',
             'History of Art, Architecture & Design' => 'History of Art, Architecture & Design',
             'Land & Property Management' => 'Land & Property Management',
             'Law' => 'Law',
             'Librarianship & Information Management' => 'Librarianship & Information Management',
             'BabyFoot' => 'BabyFoot',
             'Marketing' => 'Marketing',
             'Linguistics' => 'Linguistics',
             'English' => 'English',
             'French' => 'French',
             'General Engineering' => 'General Engineering',
             'Music' => 'Music',
             'Social Work' => 'Social Work',
             'Robotics' => 'Robotics',
             'Youth Work' => 'Youth Work',
             'Politics' => 'Politics',
             'Medicine' => 'Medicine',
          )
        ))
        ->add('building', TextType::class, array(
          'required' => false))
        ->add('room', TextType::class)
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
