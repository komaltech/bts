<?php
/**
 * Created by PhpStorm.
 * User: jimmy
 * Date: 01/06/16
 * Time: 0:59
 */

namespace Yanna\bts\Domain\Entity;

/**
 * Class InfoDokumen
 * @package Yanna\bts\Domain\Entity
 * @Embeddable
 * @Table(
 *     name="info_dokumen"
 * )
 */
class infoDokumen
{

    /**
     * @Id
     * @Column(name="id",type="integer")
     * @var int
     * @GeneratedValue
     */
    private $id;

    /**
     * @Column(type="string",name="site_location",length=255,nullable=false)
     * @var string
     */
    private $siteLocation;

    /**
     * @Column(type="string",name="gps_coordinate_satu",length=255,nullable=false)
     * @var string
     */
    private $gpsCoordinateSatu;

    /**
     * @Column(type="string",name="gps_coordinate_dua",length=255,nullable=false)
     * @var string
     */
    private $gpsCoordinateDua;

    /**
     * @Column(type="string",name="shelter_view_satu",length=255,nullable=false)
     * @var string
     */
    private $shelterViewSatu;

    /**
     * @Column(type="string",name="shelter_view_dua",length=255,nullable=false)
     * @var string
     */
    private $shelterViewDua;

    /**
     * @Column(type="string",name="overview_inside_satu",length=255,nullable=false)
     * @var string
     */
    private $overviewInsideSatu;

    /**
     * @Column(type="string",name="overview_inside_dua",length=255,nullable=false)
     * @var string
     */
    private $overviewInsideDua;

    /**
     * @Column(type="string",name="fep_indoor",length=255,nullable=false)
     * @var string
     */
    private $fepIndoor;

    /**
     * @Column(type="string",name="fep_outdoor",length=255,nullable=false)
     * @var string
     */
    private $fepOutdoor;

    /**
     * @Column(type="string",name="feeder_indoor",length=255,nullable=false)
     * @var string
     */
    private $feederIndoor;

    /**
     * @Column(type="string",name="feeder_bending",length=255,nullable=false)
     * @var string
     */
    private $feederBending;

    /**
     * @Column(type="string",name="internal_grounding",length=255,nullable=false)
     * @var string
     */
    private $internalGrounding;

    /**
     * @Column(type="string",name="external_gb",length=255,nullable=false)
     * @var string
     */
    private $externalGb;

    /**
     * @Column(type="string",name="alarm_box",length=255,nullable=false)
     * @var string
     */
    private $alarmBox;

    /**
     * @Column(type="string",name="acpdb_internal_satu",length=255,nullable=false)
     * @var string
     */
    private $acpdbInternalSatu;

    /**
     * @Column(type="string",name="acpdb_internal_dua",length=255,nullable=false)
     * @var string
     */
    private $acpdbInternalDua;

    /**
     * @Column(type="string",name="mcb_at_dcpdb",length=255,nullable=false)
     * @var string
     */
    private $mcbAtDcpdb;

    /**
     * @Column(type="string",name="rectifier_cabinet",length=255,nullable=false)
     * @var string
     */
    private $rectifierCabinet;

    /**
     * @Column(type="string",name="mcb_at_Rectifier_cabinet",length=255,nullable=false)
     * @var string
     */
    private $mcbAtRectifierCabinet;

    /**
     * @Column(type="string",length=255,nullable=false)
     * @var string
     */
    private $rack;

    /**
     * @Column(type="string",name="antenna_sector_one_satu",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorOneSatu;

    /**
     * @Column(type="string",name="antenna_sector_one_dua",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorOneDua;

    /**
     * @Column(type="string",name="antenna_sector_two_satu",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorTwoSatu;

    /**
     * @Column(type="string",name="antenna_sector_two_dua",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorTwoDua;

    /**
     * @Column(type="string",name="antenna_sector_three_satu",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorThreeSatu;

    /**
     * @Column(type="string",name="antenna_sector_three_dua",length=255,nullable=false)
     * @var string
     */
    private $antennaSectorThreeDua;

    /**
     * @Column(type="string",name="azimuth_sector_one_satu",length=255,nullable=false)
     * @var string
     */
    private $azimuthSectorOneSatu;

    /**
     * @Column(type="string",name="azimuth_sector_one_dua",length=255,nullable=false)
     * @var string
     */
    private $azimuthSectorOneDua;

    /**
     * @Column(type="string",name="azimuth_sector_two_satu",length=255,nullable=false)
     * @var string
     */
    private $azimuthSectorTwoSatu;

    /**
     * @Column(type="string",name="azimuth_sector_two_dua",length=255,nullable=false)
     * @var string
     */

    private $azimuthSectorTwoDua;

    /**
     * @Column(type="string",name="azimuth_sector_three_satu",length=255,nullable=false)
     * @var string
     */
    private $azimuthSectorThreeSatu;

    /**
     * @Column(type="string",name="azimuth_sector_three_dua",length=255,nullable=false)
     * @var string
     */
    private $azimuthSectorThreeDua;

    /**
     * @Column(type="string",name="labelling_of_cpri",length=255,nullable=false)
     * @var string
     */
    private $labellingOfCpri;

    /**
     * @Column(type="string",name="connection_sector_one",length=255,nullable=false)
     * @var string
     */

    private $connectionSectorOne;

    /**
     * @Column(type="string",name="connection_sector_two",length=255,nullable=false)
     * @var string
     */
    private $connectionSectorTwo;

    /**
     * @Column(type="string",name="cabinet_tower",length=255,nullable=false)
     * @var string
     */
    private $cabinetTower;

    /**
     * @Column(type="string",name="bts_cabinet_one",length=255,nullable=false)
     * @var string
     */
    private $btsCabinetOne;

    /**
     * @Column(type="string",name="bts_cabinet_two",length=255,nullable=false)
     * @var string
     */
    private $btsCabinetTwo;

    /**
     * @Column(type="string",name="fep_outside",length=255,nullable=false)
     * @var string
     */
    private $fepOutside;

    /**
     * @Column(type="string",name="jumper_installation",length=255,nullable=false)
     * @var string
     */
    private $jumperInstallation;

    /**
     * @Column(type="string",name="egb_horizontal",length=255,nullable=false)
     * @var string
     */
    private $egbHorizontal;

    /**
     * @Column(type="string",name="rectifier_one",length=255,nullable=false)
     * @var
     */
    private $rectifierOne;

    /**
     * @Column(type="string",name="rectifier_two",length=255,nullable=false)
     * @var string
     */
    private $rectifierTwo;

    /**
     * @Column(type="string",name="mcb_at_acpdb",length=255,nullable=false)
     * @var string
     */
    private $mcbAtAcpdb;

    public static function create($siteLocation,$gpsCoordinateSatu,$gpsCoordinateDua,$shelterViewSatu,$shelterViewDua,$overviewInsideSatu,$overviewinsideDua,$fepIndoor,$fepOutdoor,$feederIndoor,$feederBending,$internalGrounding,$externalGb,$alarmBox,$acpdbInternalSatu,$acpdbInternalDua,$mcbAtDcpdb,$rectifierCabinet,$mcbAtRectifierCabinet,$rack,$antennaSectorOneSatu,$antennaSectorOneDua,$antennaSectorTwoSatu,$antennaSectorTwoDua,$antennaSectorThreeSatu,$antennaSectorThreeDua,$azimuthSectorOneSatu,$azimuthSectorOneDua,$azimuthSectorTwoSatu,$azimuthSectorTwoDua,$azimuthSectorThreeSatu,$azimuthSectorThreeDua,$labellingOfCpri,$connectionSectorOne,$connectionSectorTwo,$cabinetTower,$btsCabinetOne,$btsCabinetTwo,$fepOutside,$jumperInstallation,$egbHorizontal,$rectifierOne,$rectifierTwo,$mcbAtAcpdb)
    {
        $dokumenInfo = new InfoDokumen();

        $dokumenInfo->setSiteLocation($siteLocation);
        $dokumenInfo->setGpsCoordinateSatu($gpsCoordinateSatu);
        $dokumenInfo->setGpsCoordinateDUa($gpsCoordinateDua);
        $dokumenInfo->setShelterViewSatu($shelterViewSatu);
        $dokumenInfo->setShelterViewDua($shelterViewDua);
        $dokumenInfo->setOverviewInsideSatu($overviewInsideSatu);
        $dokumenInfo->setOverviewInsideDua($overviewinsideDua);
        $dokumenInfo->setFepIndoor($fepIndoor);
        $dokumenInfo->setFepOutdoor($fepOutdoor);
        $dokumenInfo->setFeederIndoor($feederIndoor);
        $dokumenInfo->setFeederBending($feederBending);
        $dokumenInfo->setInternalGrounding($internalGrounding);
        $dokumenInfo->setExternalGb($externalGb);
        $dokumenInfo->setAlarmBox($alarmBox);
        $dokumenInfo->setAcpdbInternalSatu($acpdbInternalSatu);
        $dokumenInfo->setAcpdbInternalDua($acpdbInternalDua);
        $dokumenInfo->setMcbAtDcpdb($mcbAtDcpdb);
        $dokumenInfo->setRectifierCabinet($rectifierCabinet);
        $dokumenInfo->setMcbAtRectifierCabinet($mcbAtRectifierCabinet);
        $dokumenInfo->setRack($rack);
        $dokumenInfo->setAntennaSectorOneSatu($antennaSectorOneSatu);
        $dokumenInfo->setAntennaSectorOneDua($antennaSectorOneDua);
        $dokumenInfo->setAntennaSectorTwoSatu($antennaSectorTwoSatu);
        $dokumenInfo->setAntennaSectorTwoDua($antennaSectorTwoDua);
        $dokumenInfo->setAntennaSectorThreeSatu($antennaSectorThreeSatu);
        $dokumenInfo->setAntennaSectorThreeDua($antennaSectorThreeDua);
        $dokumenInfo->setAzimuthSectorOneSatu($azimuthSectorOneSatu);
        $dokumenInfo->setAzimuthSectorOneDua($azimuthSectorOneDua);
        $dokumenInfo->setAzimuthSectorTwoSatu($azimuthSectorTwoSatu);
        $dokumenInfo->setAzimuthSectorTwoDua($azimuthSectorTwoDua);
        $dokumenInfo->setAzimuthSectorThreeSatu($azimuthSectorThreeSatu);
        $dokumenInfo->setAzimuthSectorThreeDua($azimuthSectorThreeDua);
        $dokumenInfo->setLabellingOfCpri($labellingOfCpri);
        $dokumenInfo->setConnectionSectorOne($connectionSectorOne);
        $dokumenInfo->setConnectionSectorTwo($connectionSectorTwo);

        $dokumenInfo->setCabinetTower($cabinetTower);
        $dokumenInfo->setBtsCabinetOne($btsCabinetOne);
        $dokumenInfo->setBtsCabinetTwo($btsCabinetTwo);
        $dokumenInfo->setFepOutside($fepOutside);
        $dokumenInfo->setJumperInstallation($jumperInstallation);
        $dokumenInfo->setEgbHorizontal($egbHorizontal);
        $dokumenInfo->setRectifierOne($rectifierOne);
        $dokumenInfo->setRectifierTwo($rectifierTwo);
        $dokumenInfo->setMcbAtAcpdb($mcbAtAcpdb);

        return $dokumenInfo;

    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
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

    public function getConnectionSectorOne()
    {
       return $this->connectionSectorOne;
    }

    public function setConnectionSectorOne($connectionSectorOne)
    {
        $this->connectionSectorOne = $connectionSectorOne;
    }

    public function getConnectionSectorTwo()
    {
        return $this->connectionSectorTwo;
    }

    public function setConnectionSectorTwo($connectionSectorTwo)
    {
        $this->connectionSectorTwo = $connectionSectorTwo;
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

    public function getEgbHorizontal()
    {
        return $this->egbHorizontal;
    }

    public function setEgbHorizontal($egbHorizontal)
    {
        $this->egbHorizontal = $egbHorizontal;
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

    public function getMcbAtAcpdb()
    {
        return $this->getMcbAtAcpdb();
    }

    public function setMcbAtAcpdb($mcbAtAcpdb)
    {
        $this->mcbAtAcpdb = $mcbAtAcpdb;
    }

}