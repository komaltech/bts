<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 01/06/16
 * Time: 0:49
 */

namespace Yanna\bts\Http\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class inputImage extends AbstractType
{

    /**
     * @var UploadedFile
     */
    public $siteLocation;

    /**
     * @var UploadedFile
     */
    public $gpsCoordinateSatu;

    /**
     * @var UploadedFile
     */
    public $gpsCoordinateDua;

    /**
     * @var UploadedFile
     */
    public $shelterViewSatu;

    /**
     * @var UploadedFile
     */
    public $shelterViewDua;

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
    public $fepIndoor;

    /**
     * @var UploadedFile
     */
    public $fepOutdoor;

    /**
     * @var UploadedFile
     */
    public $feederIndoor;

    /**
     * @var UploadedFile
     */
    public $feederBending;

    /**
     * @var UploadedFile
     */
    public $internalGrounding;

    /**
     * @var UploadedFile
     */
    public $externalGb;

    /**
     * @var UploadedFile
     */
    public $alarmBox;

    /**
     * @var UploadedFile
     */
    public $acpdbInternalSatu;

    /**
     * @var UploadedFile
     */
    public $acpdbInternalDua;

    /**
     * @var UploadedFile
     */
    public $mcbAtDcpdb;

    /**
     * @var UploadedFile
     */
    public $rectifierCabinet;

    /**
     * @var UploadedFile
     */
    public $mcbAtRectifierCabinet;

    /**
     * @var UploadedFile
     */
    public $rack;

    /**
     * @var UploadedFile
     */
    public $antennaSectorOneSatu;

    /**
     * @var UploadedFile
     */
    public $antennaSectorOneDua;

    /**
     * @var UploadedFile
     */
    public $antennaSectorTwoSatu;

    /**
     * @var UploadedFile
     */
    public $antennaSectorTwoDua;

    /**
     * @var UploadedFile
     */
    public $antennaSectorThreeSatu;

    /**
     * @var UploadedFile
     */
    public $antennaSectorThreeDua;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorOneSatu;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorOneDua;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorTwoSatu;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorTwoDua;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorThreeSatu;

    /**
     * @var UploadedFile
     */
    public $azimuthSectorThreeDua;

    /**
     * @var UploadedFile
     */
    public $labellingOfCpri;

    /**
     * @var UploadedFile
     */
    public $connectionSectorOneSatu;

    /**
     * @var UploadedFile
     */
    public $connectionSectorOneDua;

    /**
     * @var UploadedFile
     */
    public $connectionSectorTwoSatu;

    /**
     * @var UploadedFile
     */
    public $connectionSectorTwoDua;

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
            'gpsCoordinateSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'GPS Coordinate I'
            ]
        )->add(
            'gpsCoordinateDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label'=> 'GPS Coordinate II'
            ]
        )->add(
            'shelterViewSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Shelter View I'
            ]
        )->add(
            'shelterViewDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Shelter View II'
            ]
        )->add(
            'overviewInsideSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Overview Inside I'
            ]
        )->add(
            'overviewInsideDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Overview Inside II'
            ]
        )->add(
            'fepIndoor',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Fep Indoor'
            ]
        )->add(
            'fepOutdoor',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Fep Outdoor'
            ]
        )->add(
            'feederIndoor',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Feeder Indoor'
            ]
        )->add(
            'feederBending',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Feeder Bending'
            ]
        )->add(
            'internalGrounding',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Internal Grounding'
            ]
        )->add(
            'externalGb',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'External Gb'
            ]
        )->add(
            'alarmBox',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Alarm Box'
            ]
        )->add(
            'acpdbInternalSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'ACPDB Internal I'
            ]
        )->add(
            'acpdbInternalDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'ACPDB Internal II'
            ]
        )->add(
            'mcbAtDcpdb',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'MCB at DCPDB'
            ]
        )->add(
            'rectifierCabinet',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Rectifier Cabinet'
            ]
        )->add(
            'mcbAtRectifierCabinet',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'MCB at Rectifier Cabinet'
            ]
        )->add(
            'rack',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Rack 19'
            ]
        )->add(
            'antennaSectorOneSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Antenna Sector 1'
            ]
        )->add(
            'antennaSectorOneDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'antennaSectorTwoSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Antenna Sector 2'
            ]
        )->add(
            'antennaSectorTwoDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'antennaSectorThreeSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Antenna Sector 3'
            ]
        )->add(
            'antennaSectorThreeDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'azimuthSectorOneSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Azimuth Sector 1'
            ]
        )->add(
            'azimuthSectorOneDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'azimuthSectorTwoSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Azimuth Sector 2'
            ]
        )->add(
            'azimuthSectorTwoDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'azimuthSectorThreeSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Azimuth Sector 3'
            ]
        )->add(
            'azimuthSectorThreeDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => false
            ]
        )->add(
            'labellingOfCpri',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Labelling Of Cpri'
            ]
        )->add(
            'connectionSectorOneSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Connection Sector I'
            ]
        )->add(
            'connectionSectorOneDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Connection Sector II'
            ]
        )->add(
            'connectionSectorTwoSatu',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Connection Sector I'
            ]
        )->add(
            'connectionSectorTwoDua',
            'file',
            [
                'constraints' => new Assert\NotBlank(),
                'label' => 'Connection Sector II'
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
        return 'imageForm';
    }

    public function getSiteLocation()
    {
        return $this->siteLocation;
    }

    public function setSiteLocation($siteLocation)
    {
        $this->siteLocation = $siteLocation;
    }

    public function getGpsCoordinateSatu()
    {
        return $this->gpsCoordinateSatu;
    }

    public function setGpsCoordinateSatu($gpsCoordinateSatu)
    {
        $this->gpsCoordinateSatu = $gpsCoordinateSatu;
    }

    public function getGpsCoordinateDua()
    {
        return $this->gpsCoordinateDua;
    }

    public function setGpsCoordinateDUa($gpsCoordinateDua)
    {
        $this->gpsCoordinateDua = $gpsCoordinateDua;
    }

    public function getShelterViewSatu()
    {
        return $this->shelterViewSatu;
    }

    public function setShelterViewSatu($shelterViewSatu)
    {
        $this->shelterViewSatu = $shelterViewSatu;
    }

    public function getShelterViewDua()
    {
        return $this->shelterViewDua;
    }

    public function setShelterViewDua($shelterViewDua)
    {
        $this->shelterViewDua = $shelterViewDua;
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

    public function getFepIndoor()
    {
        return $this->fepIndoor;
    }

    public function setFepIndoor($fepIndoor)
    {
        $this->fepIndoor = $fepIndoor;
    }

    public function getFepOutdoor()
    {
        return $this->fepOutdoor;
    }

    public function setFepOutdoor($fepOutdoor)
    {
        $this->fepOutdoor = $fepOutdoor;
    }

    public function getFeederIndoor()
    {
        return $this->feederIndoor;
    }

    public function setFeederIndoor($feederIndoor)
    {
        $this->feederIndoor = $feederIndoor;
    }

    public function getFeederBending()
    {
        return $this->feederBending;
    }

    public function setFeederBending($feederBending)
    {
        $this->feederBending = $feederBending;
    }

    public  function getInternalGrounding()
    {
        return $this->internalGrounding;
    }

    public function setInternalGrounding($internalGrounding)
    {
        $this->internalGrounding= $internalGrounding;
    }

    public function getExternalGb()
    {
        return $this->externalGb;
    }

    public function setExternalGb($externalGb)
    {
        $this->externalGb = $externalGb;
    }

    public function getAlarmBox()
    {
        return $this->alarmBox;
    }

    public function setAlarmBox($alarmBox)
    {
        $this->alarmBox = $alarmBox;
    }

    public function getAcpdbInternalSatu()
    {
        return $this->acpdbInternalSatu;
    }

    public function setAcpdbInternalSatu($acpdbInternalSatu)
    {
        $this->acpdbInternalSatu = $acpdbInternalSatu;
    }

    public function getAcpdbInternalDua()
    {
        return $this->acpdbInternalDua;
    }

    public function setAcpdbInternalDua($acpdbInternalDua)
    {
        $this->acpdbInternalDua = $acpdbInternalDua;
    }

    public function getMcbAtDcpdb()
    {
        return $this->mcbAtDcpdb;
    }

    public function setMcbAtDcpdb($mcbAtDcpdb)
    {
        $this->mcbAtDcpdb = $mcbAtDcpdb;
    }

    public function getRectifierCabinet()
    {
        return $this->rectifierCabinet;
    }

    public function setRectifierCabinet($rectifierCabinet)
    {
        $this->rectifierCabinet = $rectifierCabinet;
    }

    public function getMcbAtRectifierCabinet()
    {
        return $this->mcbAtRectifierCabinet;
    }

    public function setMcbAtRectifierCabinet($mcbAtRectifierCabinet)
    {
        $this->mcbAtRectifierCabinet = $mcbAtRectifierCabinet;
    }

    public function getRack()
    {
        return $this->rack;
    }

    public function setRack($rack)
    {
        $this->rack = $rack;
    }

    public function getAntennaSectorOneSatu()
    {
        return $this->antennaSectorOneSatu;
    }

    public function setAntennaSectorOneSatu($antennaSectorOneSatu)
    {
        $this->antennaSectorOneSatu = $antennaSectorOneSatu;
    }

    public function getAntennaSectorOneDua()
    {
        return $this->antennaSectorOneDua;
    }

    public function setAntennaSectorOneDua($antennaSectorOneDua)
    {
        $this->antennaSectorOneDua = $antennaSectorOneDua;
    }

    public function getAntennaSectorTwoSatu()
    {
        return $this->antennaSectorTwoSatu;
    }

    public function setAntennaSectorTwoSatu($antennaSectorTwoSatu)
    {
        $this->antennaSectorTwoSatu = $antennaSectorTwoSatu;
    }

    public function getAntennaSectorTwoDua()
    {
        return $this->antennaSectorTwoDua;
    }

    public function setAntennaSectorTwoDua($antennaSectorTwoDua)
    {
        $this->antennaSectorTwoDua = $antennaSectorTwoDua;
    }

    public function getAntennaSectorThreeSatu()
    {
        return $this->antennaSectorThreeSatu;
    }

    public function setAntennaSectorThreeSatu($antennaSectorThreeSatu)
    {
        $this->antennaSectorThreeSatu = $antennaSectorThreeSatu;
    }

    public function getAntennaSectorThreeDua()
    {
        return $this->antennaSectorThreeDua;
    }

    public function setAntennaSectorThreeDua($antennaSectorThreeDua)
    {
        $this->antennaSectorThreeDua = $antennaSectorThreeDua;
    }

    public function getAzimuthSectorOneSatu()
    {
        return $this->azimuthSectorOneSatu;
    }

    public function setAzimuthSectorOneSatu($azimuthSectorOneSatu)
    {
        $this->azimuthSectorOneSatu = $azimuthSectorOneSatu;
    }

    public function getAzimuthSectorOneDua()
    {
        return $this->azimuthSectorOneDua;
    }

    public function setAzimuthSectorOneDua($azimuthSectorOneDua)
    {
        $this->azimuthSectorOneDua = $azimuthSectorOneDua;
    }

    public function getAzimuthSectorTwoSatu()
    {
        return $this->azimuthSectorTwoSatu;
    }

    public function setAzimuthSectorTwoSatu($azimuthSectorTwoSatu)
    {
        $this->azimuthSectorTwoSatu = $azimuthSectorTwoSatu;
    }

    public function getAzimuthSectorTwoDua()
    {
        return $this->azimuthSectorTwoDua;
    }

    public function setAzimuthSectorTwoDua($azimuthSectorTwoDua)
    {
        $this->azimuthSectorTwoDua = $azimuthSectorTwoDua;
    }

    public function getAzimuthSectorThreeSatu()
    {
        return $this->azimuthSectorThreeSatu;
    }

    public function setAzimuthSectorThreeSatu($azimuthSectorThreeSatu)
    {
        $this->azimuthSectorThreeSatu = $azimuthSectorThreeSatu;
    }

    public function getAzimuthSectorThreeDua()
    {
        return $this->azimuthSectorThreeDua;
    }

    public function setAzimuthSectorThreeDua($azimuthSectorThreeDua)
    {
        $this->azimuthSectorThreeDua = $azimuthSectorThreeDua;
    }

    public function getLabellingOfCpri()
    {
        return $this->labellingOfCpri;
    }

    public function setLabellingOfCpri($labellingOfCpri)
    {
        $this->labellingOfCpri = $labellingOfCpri;
    }

    public function getConnectionSectorOneSatu()
    {
        return $this->connectionSectorOneSatu;
    }

    public function setConnectionSectorOneSatu($connectionSectorOneSatu)
    {
        $this->connectionSectorOneSatu = $connectionSectorOneSatu;
    }

    public function getConnectionSectorOneDua()
    {
        return $this->connectionSectorOneDua;
    }

    public function setConnectionSectorOneDua($connectionSectorOneDua)
    {
        $this->connectionSectorOneDua = $connectionSectorOneDua;
    }

    public function getConnectionSectorTwoSatu()
    {
        return $this->connectionSectorTwoSatu;
    }

    public function setConnectionSectorTwoSatu($connectionSectorTwoSatu)
    {
        $this->connectionSectorTwoSatu = $connectionSectorTwoSatu;
    }

    public function getConnectionSectorTwoDua()
    {
        return $this->connectionSectorTwoDua;
    }

    public function setConnectionSectorTwoDua($connectionSectorTwoDua)
    {
        $this->connectionSectorTwoDua = $connectionSectorTwoDua;
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