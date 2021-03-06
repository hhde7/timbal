<?php

namespace LFP\TimbalBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * CourseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CourseRepository extends \Doctrine\ORM\EntityRepository
{
    public function getDayRank($em, $currentUser)
    {
        // Gets the number of the day 1 for Monday,2 for Tuesday, 3 for Wednesday ...
        // This number will help to order the days chronologically
        $query = $em->createQuery('SELECT DISTINCT c.dayRank FROM LFPTimbalBundle:Course c WHERE c.user = :user');
        $query->setParameter('user', $currentUser->getId());
        $data = $query->getResult();

        return $data;
    }

    public function checkCoursesLimit($em, $currentUser, $chosenDay)
    {
        $query = $em->createQuery('SELECT COUNT(c.dayRank) FROM LFPTimbalBundle:Course c WHERE c.user = :user and c.day = :chosenDay');
        $query->setParameter('user', $currentUser->getId());
        $query->setParameter('chosenDay', $chosenDay);
        $data = $query->getResult();

        return $data;
    }

    public function countDays($em, $currentUser)
    {
      $query = $em->createQuery('SELECT DISTINCT c.day FROM LFPTimbalBundle:Course c WHERE c.user = :user');
      $query->setParameter('user', $currentUser->getId());
      $numberOfDays = $query->getResult();

      return $numberOfDays;
    }
}
