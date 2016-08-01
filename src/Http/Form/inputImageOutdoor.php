<?php
/**
 * Created by PhpStorm.
 * User: afif
 * Date: 20/07/2016
 * Time: 1:13
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class inputImageOutdoor extends AbstractType {

    /**
     * @var UploadedFile
     */
    public $siteLocation;

    /**
     * @var UploadedFile
     */
    public $gpsCoordinate;

    /**
     * @var UploadedFile
     */
    public $cabinetTower;

    /**
     * @var UploadedFile
     */
    public $btsCabinetOne;

    /**
     * @var UploadedFile
     */
    public $btsCabinetTwo;

    /**
     * @var UploadedFile
     */
    public $overviewInsideSatu;

    /**
     * @var UploadedFile
     */
    public $overviewInsideDua;

    /**
     * @var UploadedFile
     */
    public $fepOutside;

    /**
     * @var UploadedFile
     */
    public $jumperInstallation;

    /**
     * @var UploadedFile
     */
    public $feederBending;

    /**
     * @var UploadedFile
     */
    public $egbHorizontal;

    /**
     * @var UploadedFile
     */
    public $acpdbInternalSatu;

    /**
     * @var UploadedFile
     */
    public $mcbAtAcpdb;

    /**
     * @var UploadedFile
     */
    public $rectifierOne;

    /**
     * @var UploadedFile
     */
    public $rectifierTwo;

    /**
     * @var UploadedFile
     */
    public $mcbAtRectifierCabinet;

    public $filename;

    public function buildForm(FormBuilderInterface $builder,array $options)
    {
        $builder->add(
            'siteLocation',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Site Location'
            ]
        )->add(
            'gpsCoordinate',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'GPS Coordinate'
            ]
        )->add(
            'cabinetTower',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Cabinet And Tower'
            ]
        )->add(
            'btsCabinetOne',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'BTS Cabinet I'
            ]
        )->add(
            'btsCabinetTwo',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'BTS Cabinet II'
            ]
        )->add(
            'overviewInsideSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Overview Of Inside the Cabinet I'
            ]
        )->add(
            'overviewInsideDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Overview Of Inside the Cabinet II'
            ]
        )->add(
            'fepOutside',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Fep from Outside Cabinet'
            ]
        )->add(
            'jumperInstallation',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Jumper Installation Outdoor Cabinet'
            ]
        )->add(
            'feederBending',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Feeder Bending'
            ]
        )->add(
            'egbHorizontal',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'EGB at Horizontal Tray'
            ]
        )->add(
            'acpdbInternalSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'ACPDB Internal View'
            ]
        )->add(
            'mcbAtAcpdb',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'MCB at ACPDB'
            ]
        )->add(
            'rectifierOne',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'rectifier I'
            ]
        )->add(
            'rectifierTwo',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'rectifier II'
            ]
        )->add(
            'mcbAtRectifierCabinet',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'MCB at Rectifier Cabinet'
            ]
        )->add(
            'kirim',
            'submit',
            [
                'label' => 'INPUT IMAGE',
                'attr' => [
                    'class' => 'btn btn-primary btn-flat pull-right'
                ]
            ]
        );

    }

    public function getName()
    {
        return 'imageOutdoor';
    }

    public function getSiteLocation()
    {
        return $this->siteLocation;
    }

    public function setSiteLocation($siteLocation)
    {
        $this->siteLocation = $siteLocation;
    }

    public function getGpsCoordinate()
    {
        return $this->gpsCoordinate;
    }

    public function setGpsCoordinate($gpsCoordinate)
    {
        $this->gpsCoordinate = $gpsCoordinate;
    }

    public function getCabinetTower()
    {
        return $this->cabinetTower;
    }

    public function setCabinetTower($cabinetTower)
    {
        $this->cabinetTower = $cabinetTower;
    }

    public function getBtsCabinetOne()
    {
        return $this->btsCabinetOne;
    }

    public function setBtsCabinetOne($btsCabinetOne)
    {
        $this->btsCabinetOne = $btsCabinetOne;
    }

    public function getBtsCabinetTwo()
    {
        return $this->btsCabinetTwo;
    }

    public function setBtsCabinetTwo($btsCabinetTwo)
    {
        $this->btsCabinetTwo = $btsCabinetTwo;
    }

    public function getOverviewInsideSatu()
    {
        return $this->overviewInsideSatu;
    }

    public function setOverviewInsideSatu($overviewInsideSatu)
    {
        $this->overviewInsideSatu = $overviewInsideSatu;
    }

    public function getOverviewInsideDua()
    {
        return $this->overviewInsideDua;
    }

    public function setOverviewInsideDua($overviewInsideDua)
    {
        $this->overviewInsideDua = $overviewInsideDua;
    }

    public function getFepOutside()
    {
        return $this->fepOutside;
    }

    public function setFepOutside($fepOutside)
    {
        $this->fepOutside = $fepOutside;
    }

    public function getJumperInstallation()
    {
        return $this->jumperInstallation;
    }

    public function setJumperInstallation($jumperInstallation)
    {
        $this->jumperInstallation = $jumperInstallation;
    }

    public function getFeederBending()
    {
        return $this->feederBending;
    }

    public function setFeederBending($feederBending)
    {
        $this->feederBending = $feederBending;
    }

    public function getEgbHorizontal()
    {
        return $this->egbHorizontal;
    }

    public function setEgbHorizontal($egbHorizontal)
    {
        $this->egbHorizontal = $egbHorizontal;
    }

    public function getAcpdbInternalSatu()
    {
        return $this->acpdbInternalSatu;
    }

    public function setAcpdbInternalSatu($acpdbInternalSatu)
    {
        $this->acpdbInternalSatu = $acpdbInternalSatu;
    }

    public function getMcbAtAcpdb()
    {
        return $this->mcbAtAcpdb;
    }

    public function setMcbAtAcpdb($mcbAtAcpdb)
    {
        $this->mcbAtAcpdb = $mcbAtAcpdb;
    }

    public function getRectifierOne()
    {
        return $this->rectifierOne;
    }

    public function setRectifierOne($rectifierOne)
    {
        $this->rectifierOne = $rectifierOne;
    }

    public function getRectifierTwo()
    {
        return $this->rectifierTwo;
    }

    public function setRectifierTwo($rectifierTwo)
    {
        $this->rectifierTwo = $rectifierTwo;
    }

    public function getMcbAtRectifierCabinet()
    {
       return $this->mcbAtRectifierCabinet;
    }

    public function setMcbAtRectifierCabinet($mcbAtRectifierCabinet)
    {
        $this->mcbAtRectifierCabinet = $mcbAtRectifierCabinet;
    }

    public function getFileName()
    {
        return $this->filename;
    }

    public function setFileName($filename)
    {
        $this->filename = $filename;
    }


}