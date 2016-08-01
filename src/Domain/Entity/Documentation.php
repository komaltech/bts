<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 26/04/2016
 * Time: 6:12
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class Documentation
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDocumentationRepository")
 * @package Yanna\bts\Domain\Entity
 * @HasLifecycleCallbacks
 * @Table(name="documentation")
 */
class Documentation {

    /**
     * @Id
     * @Column(type="integer", nullable=false)
     * @var int
     * @GeneratedValue
     */
    public $id;

    /**
     * @Column(name="site_name", type="string", length=255, nullable=false)
     * @var string
     */
    public $siteName;

    /**
     * @Column(name="form_id", type="string", length=45, nullable=false)
     * @var string
     */
    public $formId;

    /**
     * @Column(name="form_state", type="string", length=500, nullable=false)
     * @var string
     */
    public $formState;
//
//    /**
//     * @Column(name="validate_state", type="integer", nullable=false)
//     * @var int
//     */
//    public $validateState;

    /**
     * @Column(type="string", length=255, nullable=false)
     * @var string
     */
    public $username;

    /**
     * @Column(name="created_at",type="datetime", nullable=false)
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @Column(name="updated_at",type="datetime", nullable=true)
     * @var \DateTime
     */
    public $updatedAt;

    /**
     * @Column(name="site_status",type="integer", nullable=false)
     * @var int
     */
    public $siteStatus;

    public static function create()
    {

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getSiteName()
    {
        return $this->siteName;
    }

    /**
     * @param $siteName
     */
    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
    }

    /**
     * @return int
     */
    public function getSiteStatus()
    {
        return $this->siteStatus;
    }

    /**
     * @param $siteStatus
     */
    public function setSiteStatus($siteStatus)
    {
        $this->siteStatus = $siteStatus;
    }

    /**
     * @return string
     */
    public function getFormId()
    {
        return $this->formId;
    }

    /**
     * @param $formId
     */
    public function setFormId($formId)
    {
        $this->formId = $formId;
    }

    /**
     * @return string
     */
    public function getFormState()
    {
        return $this->formState;
    }

    /**
     * @param $formState
     */
    public function setFormState($formState)
    {
        $this->formState = $formState;
    }

//    /**
//     * @return int
//     */
//    public function getValidateState()
//    {
//        return $this->validateState;
//    }
//
//    /**
//     * @param $validateState
//     */
//    public function setValidateState($validateState)
//    {
//        $this->validateState = $validateState;
//    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @PrePersist
     * @return void
     */
    public function timestampableCreateEvent()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @PrePersist
     * @return void
     */
    public function timestampableUpdateEvent()
    {
        $this->updatedAt = new \DateTime();
    }
}