<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 31/05/16
 * Time: 23:16
 */

namespace Yanna\bts\Domain\Contracts\Repository;

use Yanna\bts\Domain\Entity\DocList;
interface DocListRepositoryInterface
{
    /**
     * @param $id
     * @return DocList
     */
    public function findById($id);

    /**
     * @param $username
     * @return DocList
     */
    public function findByUsername($username);

    /**
     * @param $formId
     * @return DocList
     */
    public function findByFormId($formId);
    
    /**
     * @param $siteStatus
     * @return DocList
     */
    public function findBySiteStatus($siteStatus);
}