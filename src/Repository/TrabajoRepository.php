<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

use App\Entity\Trabajo;

/**
 * 
 * @method Trabajo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trabajo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trabajo[]    findAll()
 * @method Trabajo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
final class TrabajoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trabajo::class);
    }
}

