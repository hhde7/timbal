<?php

// namespace LFP\UserBundle\Entity;
namespace LFP\UserBundle\Repository;

 use Doctrine\ORM\EntityRepository;
 use Doctrine\ORM\QueryBuilder;
 /**
  * UserRepository
  */
 class UserRepository extends \Doctrine\ORM\EntityRepository
 {
     public function whereCurrentYear(QueryBuilder $qb)
     {
       $qb
         ->andWhere('a.date BETWEEN :start AND :end')
           ->setParameter('start', new \Datetime(date('Y').'-01-01'))
           ->setParameter('end', new \Datetime(date('Y').'-12-31'))
       ;
     }

     public function getUserWithCourses()
     {
       $qb = $this
           ->createQueryBuilder('a')
           ->leftJoin('a.courses', 'course')
           ->addSelect('course')
       ;

       return $qd
           ->getQuery()
           ->getResult()
       ;
     }
 }
