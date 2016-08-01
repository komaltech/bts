<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 5/25/2016
 * Time: 1:35 AM
 */

namespace Yanna\bts\Domain\Repository;


use Doctrine\ORM\EntityRepository;
use Yanna\bts\Domain\Contracts\Repository\DocumentRepositoryInterface;
use Yanna\bts\Domain\Entity\Document;

class DoctrineDocumentRepository extends EntityRepository implements DocumentRepositoryInterface
{

    /**
     * @param $id
     * @return Document
     */
    public function findById($id)
    {
        // TODO: Implement findById() method.

        return $this->find($id);
    }

    /**
     * @param $formName
     * @return Document
     */
    public function findByFormName($formName)
    {
        // TODO: Implement findByFormName() method.

        return $this->find(['formName' => $formName]);
    }

     /**
     * @param $formId
     * @return Document
     */
    public function findByFormId($formId)
    {
        // TODO: Implement findByFormId() method.

        return $this->findBy(['formId'=>$formId]);
    }
}