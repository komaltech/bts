<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 5/24/2016
 * Time: 3:14 PM
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\Document;

interface DocumentRepositoryInterface
{
    /**
     * @param $id
     * @return Document
     */
    public function findById($id);

    /**
     * @param $formName
     * @return Document
     */
    public function findByFormName($formName);

    /**
     * @param $formId
     * @return Document
     */
    public function findByFormId($formId);	
}