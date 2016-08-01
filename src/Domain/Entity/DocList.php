<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 31/05/16
 * Time: 23:06
 */

namespace Yanna\bts\Domain\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class DocList
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDocListRepository")
 * @package Yanna\bts\Domain\Entity
 * @HasLifecycleCallbacks
 * @Table(name="docList")
 */
class DocList
{

    /**
     * @Id
     * @Column(name="id", type="integer")
     * @var int
     * @HasLifecycleCallbacks
     * @GeneratedValue
     */
    public $id;

    /**
     * @Column(name="form_id", type="string", length=255, nullable=false)
     * @var string
     */
    public $formId;

    /**
     * @Column(name="site_name", type="string", length=100, nullable=false)
     * @var string
     */
    public $siteName;

    /**
     * @Column(name="site_status", type="integer", nullable=false)
     * @var int
     */
    public $siteStatus;

    /**
     * @Column(name="username", type="string", length=255, nullable=false)
     * @var string
     */
    public $username;

    /**
     * @Column(name="created_at", type="datetime", nullable=false)
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @OneToMany(targetEntity="Yanna\bts\Domain\Entity\Document", mappedBy="DocList", fetch="EXTRA_LAZY", cascade={"persist"})
     * @var ArrayCollection|Document[]
     */
    public $dokumen;

    public function __construct()
    {
        $this->dokumen = new ArrayCollection();
    }

    public static function create($formId, $siteName, $siteStatus, $username,ArrayCollection $files)
    {
        $info = new DocList();

        $info->setCreatedAt(new \DateTime());
        $info->setFormId($formId);
        $info->setSiteName($siteName);
        $info->setSiteStatus($siteStatus);
        $info->dokumen = $files;
        $info->setUsername($username);


        return $info;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFormId()
    {
        return $this->formId;
    }

    public function setFormId($formId)
    {
        $this->formId = $formId;
    }

    public function getSiteStatus()
    {
        return $this->siteStatus;
    }

    public function setSiteStatus($siteStatus)
    {
        $this->siteStatus = $siteStatus;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getDokumen()
    {
        return $this->dokumen;
    }

    public function setDokumen($dokumen)
    {
        $this->dokumen = $dokumen;
    }

    public function getSiteName()
    {
        return $this->siteName;
    }

    public function setSiteName($siteName)
    {
        $this->siteName = $siteName;
    }

    public function timestampableCreateEvent()
    {
        $this->createdAt = new \DateTime();
    }
}