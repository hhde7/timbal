<?php

namespace LFP\TimbalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Course
 *
 * @ORM\Table(name="timbal_course")
 * @ORM\Entity(repositoryClass="LFP\TimbalBundle\Repository\CourseRepository")
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\Column(name="day", type="string", length=9)
     * @Assert\Choice(choices={"Monday", "Tuesday", "Wednesday", "Thursday",
     *                         "Friday", "Saturday", "Sunday"},
     *                         message="Enter a valid day."
     *)
     */
    private $day;

    /**
     * @var string
     *
     * @ORM\Column(name="chosen_hour", type="string", length=2)
     * @Assert\Length(min=1, max=2)
     * @Assert\Choice(choices={"0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
     *                         "10", "11", "12", "13", "14", "15", "16", "17", "18", "19",
     *                         "20", "21", "22", "23" },
     *                         message="Enter a valid hour."
     *)
     */
    private $chosenHour;

    /**
     * @var string
     *
     * @ORM\Column(name="chosen_minute", type="string", length=2)
     * @Assert\Length(min=1, max=2)
     * @Assert\Choice(choices={"0", "5", "10", "15", "20", "25", "30", "35",
     *                         "40", "45", "50", "55"},
     *                         message="Enter a valid minute."
     *)
     */
    private $chosenMinute;

    /**
     * @var string
     *
     * @ORM\Column(name="duration_hour", type="string", length=2)
     * @Assert\Length(min=1, max=2)
     * @Assert\Choice(choices={"0", "1", "2", "3", "4", "5", "6", "7", "8", "9",
     *                         "10", "11", "12", "13", "14", "15", "16", "17", "18", "19",
     *                         "20", "21", "22", "23" },
     *                         message="Enter a valid hour."
     *)
     */
    private $durationHour;

    /**
     * @var string
     *
     * @ORM\Column(name="duration_minute", type="string", length=2)
     * @Assert\Length(min=1, max=2)
     * @Assert\Choice(choices={"0", "5", "10", "15", "20", "25", "30", "35",
     *                         "40", "45", "50", "55"},
     *                         message="Enter a valid minute."
     *)
     */
    private $durationMinute;

    /**
     * @var string
     *
     * @ORM\Column(name="teacher", type="string", length=30, nullable=true)
     * @Assert\Length(min=3, max=30)
     */
    private $teacher;

    /**
     * @var string
     *
     * @ORM\Column(name="course", type="string", length=50)
     * @Assert\Length(min=3, max=50)
     */
    private $course;

    /**
     * @var string
     *
     * @ORM\Column(name="building", type="string", length=10, nullable=true)
     * @Assert\Length(min=1, max=10)
     */
    private $building;

    /**
     * @var string
     *
     * @ORM\Column(name="room", type="string", length=30)
     * @Assert\Length(min=1, max=30)
     */
    private $room;

    /**
     * @var string
     *
     * @ORM\Column(name="day_rank", type="string", length=1, nullable=true)
     */
    private $dayRank;

    /**
     * @var string
     *
     * @ORM\Column(name="$time_format", type="string", length=7, nullable=true)
     */
    private $courseTime;

    /**
     * @ORM\ManyToOne(targetEntity="LFP\UserBundle\Entity\User", cascade={"remove"})
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
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
     * @param string $chosenHour
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
     * @return string
     */
    public function getChosenHour()
    {
        return $this->chosenHour;
    }

    /**
     * Set chosenMinute
     *
     * @param string $chosenMinute
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
     * @return string
     */
    public function getChosenMinute()
    {
        return $this->chosenMinute;
    }

    /**
     * Set durationHour
     *
     * @param string $durationHour
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
     * @return string
     */
    public function getDurationHour()
    {
        return $this->durationHour;
    }

    /**
     * Set durationMinute
     *
     * @param string $durationMinute
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
     * @return string
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
     * Set dayRank
     *
     * @param string $dayRank
     *
     * @return Course
     */
    public function setDayRank($chosenDay)
    {
        // Set a number to each day for sorting
        switch ($chosenDay) {
          case 'Monday':
              $dayRank = 1;
              break;
          case 'Tuesday':
              $dayRank = 2;
              break;
          case 'Wednesday':
              $dayRank = 3;
              break;
          case 'Thursday':
              $dayRank = 4;
              break;
          case 'Friday':
              $dayRank = 5;
              break;
          case 'Saturday':
              $dayRank = 6;
              break;
          case 'Sunday':
              $dayRank = 7;
              break;
          default:
              $dayRank = 0;
              echo "The day is not valid";
        }

        $this->dayRank = $dayRank;

        return $this;
    }

    /**
     * Get dayRank
     *
     * @return string
     */
    public function getDayRank()
    {
        return $this->dayRank;
    }

    /**
     * Set courseTime
     *
     * @param string $courseTime
     *
     * @return Course
     */
    public function setCourseTime($hour, $minute)
    {
        $this->courseTime = sprintf("%02d", $hour) . 'h' . sprintf("%02d", $minute);

        return $this;
    }

    /**
     * Get courseTime
     *
     * @return string
     */
    public function getCourseTime()
    {
        return $this->courseTime;
    }

    /**
     * Set user
     *
     * @param \LFP\UserBundle\Entity\User $user
     *
     * @return Course
     */
    public function setUser(\LFP\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \LFP\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
