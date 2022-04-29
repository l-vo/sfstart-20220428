<?php

namespace App\Repository;

use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Movie>
 *
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Movie $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Movie $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @return Movie[]
     */
    public function findAll(): array
    {
        return $this
            ->createQueryBuilder('m')
            ->join('m.genre', 'g')
            ->orderBy('m.released', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Movie[]
     */
    public function findLastMovies(int $count): array
    {
        return $this
            ->createQueryBuilder('m')
            ->join('m.genre', 'g')
            ->orderBy('m.released', 'DESC')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult()
        ;
    }
}
