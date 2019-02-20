<?php
/**
 * Created by PhpStorm.
 * User: MVYaroslavcev
 * Date: 20/02/19
 * Time: 16:43
 */

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function findRandomPerson()
    {
        $conn=$this->getEntityManager()->getConnection();

        $sql = "select id from person";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        $personIdArr = [];
        while ($row = $stmt->fetch())
        {
            $personIdArr[] = $row['id'];
        }
        $personIdKey = array_rand($personIdArr);

        $qb = $this->createQueryBuilder('p')->andWhere("p.id =:id")
            ->setParameter('id', $personIdArr[$personIdKey])
            ->getQuery();

        $result = $qb->setMaxResults(1)->getOneOrNullResult();
        return $result;
    }

}