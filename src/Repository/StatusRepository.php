<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Status;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Status|null find($id, $lockMode = null, $lockVersion = null)
 * @method Status|null findOneBy(array $criteria, array $orderBy = null)
 * @method Status[]    findAll()
 * @method Status[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Status::class);
    }

    /**
     * @return Status[]|null Returns an array of Status objects
     */
    public function getActives()
    {
        $value = true;

        return $this->createQueryBuilder('status')
            ->andWhere('status.isActive = :val1')
            ->setParameter('val1', $value)
            ->orderBy('status.order', 'ASC')
            ->getQuery()
            ->getResult();
    }
}
