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
            'Accounting' => 'Accounting',
            'Accounting & Finance' => 'Accounting & Finance',
            'Acting' => 'Acting',
            'Aesthetics' => 'Aesthetics',
            'Akkadian' => 'Akkadian',
            'Ancient History' => 'Ancient History',
            'Anthropology' => 'Anthropology',
            'Arabic' => 'Arabic',
            'Archaeology' => 'Archaeology',
            'Architecture' => 'Architecture',
            'Art' => 'Art',
            'Asian Studies' => 'Asian Studies',
            'Assyriology' => 'Assyriology',
            'Astrophysics' => 'Astrophysics',
            'BabyFoot' => 'BabyFoot',
            'Bible Studies' => 'Bible Studies',
            'Biochemistry' => 'Biochemistry',
            'Biological Sciences' => 'Biological Sciences',
            'Biology' => 'Biology',
            'Biomedical Engineering' => 'Biomedical Engineering',
            'Biomedical Sciences' => 'Biomedical Sciences',
            'Botany' => 'Botany',
            'Business Studies' => 'Business Studies',
            'Catalan' => 'Catalan',
            'Cells and Systems Biology' => 'Cells and Systems Biology',
            'Celtic' => 'Celtic',
            'Chemical Engineering' => 'Chemical Engineering',
            'Chemistry' => 'Chemistry',
            'Chinese' => 'Chinese',
            'Civil Engineering' => 'Civil Engineering',
            'Classical Archaeology' => 'Classical Archaeology',
            'Classics' => 'Classics',
            'Classics and English' => 'Classics and English',
            'Classics and Oriental Studies' => 'Classics and Oriental Studies',
            'Computer Science' => 'Computer Science',
            'Computer Science and Philosophy' => 'Computer Science and Philosophy',
            'Creative Writing' => 'Creative Writing',
            'Criminology' => 'Criminology',
            'Czech' => 'Czech',
            'Dentistry' => 'Dentistry',
            'Development Studies' => 'Development Studies',
            'Divinity' => 'Divinity',
            'Drama' => 'Drama',
            'Earth Sciences' => 'Earth Sciences',
            'East & South Asian Studies' => 'East & South Asian Studies',
            'Ecology' => 'Ecology',
            'Economics' => 'Economics',
            'Economics and Management' => 'Economics and Management',
            'Education' => 'Education',
            'Egyptology' => 'Egyptology',
            'Electrical Engineering' => 'Electrical Engineering',
            'Engineering Science' => 'Engineering Science',
            'English' => 'English',
            'English and Modern Languages' => 'English and Modern Languages',
            'English Language and Literature' => 'English Language and Literature',
            'Environmental Science' => 'Environmental Science',
            'European and Middle Eastern Languages' => 'European and Middle Eastern Languages',
            'Experimental Psychology' => 'Experimental Psychology',
            'Film Making' => 'Film Making',
            'Film Studies' => 'Film Studies',
            'Finance' => 'Finance',
            'Fine Art' => 'Fine Art',
            'Forensics' => 'Forensics',
            'French' => 'French',
            'Galician' => 'Galician',
            'General Engineering' => 'General Engineering',
            'Genetics' => 'Genetics',
            'Geography' => 'Geography',
            'Geology' => 'Geology',
            'German' => 'German',
            'Greek (Ancient)' => 'Greek (Ancient)',
            'Greek (Biblical)' => 'Greek (Biblical)',
            'Greek (Modern)' => 'Greek (Modern)',
            'Hebrew' => 'Hebrew',
            'History (Ancient and Modern)' => 'History (Ancient and Modern)',
            'History' => 'History',
            'History and Economics' => 'History and Economics',
            'History and English' => 'History and English',
            'History and Modern Languages' => 'History and Modern Languages',
            'History and Politics' => 'History and Politics',
            'History of Art' => 'History of Art',
            'History of Art, Architecture & Design' => 'History of Art, Architecture & Design',
            'Human Sciences' => 'Human Sciences',
            'International Relations' => 'International Relations',
            'Irish' => 'Irish',
            'Islamic Art' => 'Islamic Art',
            'Islamic Studies' => 'Islamic Studies',
            'IT  ' => 'IT  ',
            'Italian' => 'Italian',
            'Japanese' => 'Japanese',
            'Jewish Studies' => 'Jewish Studies',
            'Journalism' => 'Journalism',
            'Jurisprudence' => 'Jurisprudence',
            'Land & Property Management' => 'Land & Property Management',
            'Languages' => 'Languages',
            'Latin' => 'Latin',
            'Law' => 'Law',
            'Librarianship & Information Management' => 'Librarianship & Information Management',
            'Life Sciences' => 'Life Sciences',
            'Linguistics' => 'Linguistics',
            'Literature' => 'Literature',
            'LLB' => 'LLB',
            'Management' => 'Management',
            'Marketing' => 'Marketing',
            'Materials Science' => 'Materials Science',
            'Mathematics' => 'Mathematics',
            'Mathematics and Computer Science' => 'Mathematics and Computer Science',
            'Mathematics and Philosophy' => 'Mathematics and Philosophy',
            'Mathematics and Statistics' => 'Mathematics and Statistics',
            'Mechanical Engineering' => 'Mechanical Engineering',
            'Media' => 'Media',
            'Medicine' => 'Medicine',
            'Middle Eastern Languages' => 'Middle Eastern Languages',
            'Middle Eastern Studies' => 'Middle Eastern Studies',
            'Midwifery' => 'Midwifery',
            'Modern Languages' => 'Modern Languages',
            'Modern Languages and Linguistics' => 'Modern Languages and Linguistics',
            'Molecular and Cellular Biochemistry' => 'Molecular and Cellular Biochemistry',
            'Museum Studies' => 'Museum Studies',
            'Music' => 'Music',
            'Nanotechnology' => 'Nanotechnology',
            'Natural Sciences' => 'Natural Sciences',
            'Neuroscience' => 'Neuroscience',
            'Nursing' => 'Nursing',
            'Oriental Studies' => 'Oriental Studies',
            'Pathology' => 'Pathology',
            'Persian' => 'Persian',
            'Pharmacology' => 'Pharmacology',
            'Philology' => 'Philology',
            'Philosophy' => 'Philosophy',
            'Philosophy and Modern Languages' => 'Philosophy and Modern Languages',
            'Philosophy and Theology' => 'Philosophy and Theology',
            'Philosophy, Politics and Economics (PPE)' => 'Philosophy, Politics and Economics',
            'Physical Education (PE)' => 'Physical Education (PE)',
            'Physics' => 'Physics',
            'Physics and Philosophy' => 'Physics and Philosophy',
            'Physiology' => 'Physiology',
            'Plant Sciences   ' => 'Plant Sciences   ',
            'Polish' => 'Polish',
            'Politics' => 'Politics',
            'Portuguese' => 'Portuguese',
            'Psychology (Experimental)' => 'Psychology (Experimental)',
            'Psychology' => 'Psychology',
            'Psychology, Philosophy and Linguistics' => 'Psychology, Philosophy and Linguistics',
            'Religion and Oriental Studies' => 'Religion and Oriental Studies',
            'Religious Studies' => 'Religious Studies',
            'Robotics' => 'Robotics',
            'Russian' => 'Russian',
            'Sanskrit' => 'Sanskrit',
            'Slovak' => 'Slovak',
            'Social Work' => 'Social Work',
            'Sociology' => 'Sociology',
            'Spanish' => 'Spanish',
            'Sport' => 'Sport',
            'Sport Science' => 'Sport Science',
            'Statistics' => 'Statistics',
            'Teaching' => 'Teaching',
            'Theatre Studies' => 'Theatre Studies',
            'Theology' => 'Theology',
            'Theology and Religion' => 'Theology and Religion',
            'Turkish' => 'Turkish',
            'Veterinary Science' => 'Veterinary Science',
            'Welsh' => 'Welsh',
            'Yiddish' => 'Yiddish',
            'Youth Work' => 'Youth Work',
            'Zoology' => 'Zoology',
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
