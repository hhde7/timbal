<?php
// src//LFP/TimbalBundle/Entity/Course

namespace LFP\TimbalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="timbal_course")
 * @ORM\Entity(repositoryClass="LFP\TimbalBundle\Repository\CourseRepository")
 */
class Course
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="day", type="string", length=15)
     */
    private $day;

    /**
     * @var int
     *
     * @ORM\Column(name="chosen_hour", type="smallint")
     */
    private $chosenHour;

    /**
     * @var int
     *
     * @ORM\Column(name="chosen_minute", type="smallint")
     */
    private $chosenMinute;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_hour", type="smallint")
     */
    private $durationHour;

    /**
     * @var int
     *
     * @ORM\Column(name="duration_minute", type="smallint")
     */
    private $durationMinute;

    /**
     * @var string
     *
     * @ORM\Column(name="teacher", type="string", length=30, nullable=true)
     */
    private $teacher;

    /**
     * @var string
     *
     * @ORM\Column(name="course", type="string", length=50)
     */
    private $course;

    /**
     * @var string
     *
     * @ORM\Column(name="building", type="string", length=10, nullable=true)
     */
    private $building;

    /**
     * @var string
     *
     * @ORM\Column(name="room", type="string", length=30)
     */
    private $room;

    /**
     * @ORM\ManyToOne(targetEntity="LFP\TimbalBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
     private $user;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set day
     *
     * @param string $day
     *
     * @return Course
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return string
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set chosenHour
     *
     * @param integer $chosenHour
     *
     * @return Course
     */
    public function setChosenHour($chosenHour)
    {
        $this->chosenHour = $chosenHour;

        return $this;
    }

    /**
     * Get chosenHour
     *
     * @return integer
     */
    public function getChosenHour()
    {
        return $this->chosenHour;
    }

    /**
     * Set chosenMinute
     *
     * @param integer $chosenMinute
     *
     * @return Course
     */
    public function setChosenMinute($chosenMinute)
    {
        $this->chosenMinute = $chosenMinute;

        return $this;
    }

    /**
     * Get chosenMinute
     *
     * @return integer
     */
    public function getChosenMinute()
    {
        return $this->chosenMinute;
    }

    /**
     * Set durationHour
     *
     * @param integer $durationHour
     *
     * @return Course
     */
    public function setDurationHour($durationHour)
    {
        $this->durationHour = $durationHour;

        return $this;
    }

    /**
     * Get durationHour
     *
     * @return integer
     */
    public function getDurationHour()
    {
        return $this->durationHour;
    }

    /**
     * Set durationMinute
     *
     * @param integer $durationMinute
     *
     * @return Course
     */
    public function setDurationMinute($durationMinute)
    {
        $this->durationMinute = $durationMinute;

        return $this;
    }

    /**
     * Get durationMinute
     *
     * @return integer
     */
    public function getDurationMinute()
    {
        return $this->durationMinute;
    }

    /**
     * Set teacher
     *
     * @param string $teacher
     *
     * @return Course
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return string
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set course
     *
     * @param string $course
     *
     * @return Course
     */
    public function setCourse($course)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return string
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * Set building
     *
     * @param string $building
     *
     * @return Course
     */
    public function setBuilding($building)
    {
        $this->building = $building;

        return $this;
    }

    /**
     * Get building
     *
     * @return string
     */
    public function getBuilding()
    {
        return $this->building;
    }

    /**
     * Set room
     *
     * @param string $room
     *
     * @return Course
     */
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get room
     *
     * @return string
     */
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set user
     *
     * @param \LFP\TimbalBundle\Entity\User $user
     *
     * @return Course
     */
    public function setUser(\LFP\TimbalBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \LFP\TimbalBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
