<?php
/**
 * Created by PhpStorm.
 * User: Jimmy
 * Date: 5/24/2016
 * Time: 2:27 PM
 */

namespace Yanna\bts\Domain\Entity;


use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class Document
 * @Entity(repositoryClass="Yanna\bts\Domain\Repository\DoctrineDocumentRepository")
 * @package Yanna\bts\Domain\Entity
 * @HasLifecycleCallbacks
 * @Table(name="dokumen")
 */
class Document
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @HasLifecycleCallbacks
     * @var int
     */
    public $id;

    /**
     * @Column(type="text", name="description")
     * @var string
     */
    public $description;

    /**
     * @Column(type="text", name="filename")
     * @var string
     */
    public $filename;

    /**
     * @Column(type="string", name="form_id", nullable=false)
     * @var string
     */
    public $formId;

    /**
     * @Column(type="datetime", name="created_at", nullable=false)
     * @var \DateTime
     */
    public $createdAt;

    /**
     * @Column(type="datetime", name="updated_at", nullable=true)
     * @var \DateTime
     */
    public $updateAt;

    /**
     * @var UploadedFile
     */
    public $file;

    /**
     * @param $description
     * @param UploadedFile $file
     * @param $formId
     * @return Document
     */
    public static function create($description,UploadedFile $file, $formId)
    {
//        $fileExt = pathinfo($uploadedFile, PATHINFO_EXTENSION);

        $fileName = uniqid() . '.' . $file->guessExtension();

        $dokumen = new Document();

        $dokumen->setDescription($description);
        $dokumen->setFileName($fileName);
        $dokumen->setFile($file);
        $dokumen->setFormId($formId);
        $dokumen->setCreatedAt(new \DateTime());
        $dokumen->setUpdatedAt(new \DateTime());



        return $dokumen;

    }

    /**
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param $file
     */
    public function setFile($file)
    {
        $this->file = $file;
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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->filename;
    }

    /**
     * @param $filename
     */
    public function setFileName($filename)
    {
        $this->filename = $filename;
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
        return $this->updateAt;
    }

    /**
     * @param $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updateAt = $updatedAt;
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
     * @PreUpdate
     * @return void
     */
    public function timestampableUpdateEvent()
    {
        $this->updateAt = new \DateTime();
    }
}