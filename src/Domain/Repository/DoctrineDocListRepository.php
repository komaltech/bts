<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 31/05/16
 * Time: 23:17
 */

namespace Yanna\bts\Domain\Repository;


use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\DocListRepositoryInterface;
use Yanna\bts\Domain\Entity\DocList;

class DoctrineDocListRepository extends EntityRepository implements DocListRepositoryInterface
{

    /**
     * @param $id
     * @return DocList
     */
    public function findById($id)
    {
        return $this->find($id);
    }

    /**
     * @param $username
     * @return DocList
     */
    public function findByUsername($username)
    {
        return $this->findBy(['username' => $username]);
    }

    /**
     * @param $formId
     * @return DocList
     */
    public function findByFormId($formId)
    {
        return $this->findBy(['formId' => $formId]);
    }

    /**
     * @param $siteStatus
     * @return DocList
     */
    public function findBySiteStatus($siteStatus)
    {
        return $this->findBy(['siteStatus'=>$siteStatus]);
    }
}