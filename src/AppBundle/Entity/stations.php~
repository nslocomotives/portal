<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * stations
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class stations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**   
     * @ORM\OneToMany(targetEntity="schedulestations", mappedBy="stationId")
     */    
    private $sheduleStationsid;

    public function __construct() {
        $this->sheduleStationsId = new ArrayCollection();
    }
    
    /**
     * @var string
     *
     * @ORM\Column(name="station_name", type="string", length=50)
     */
    private $stationName;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set stationName
     *
     * @param string $stationName
     * @return stations
     */
    public function setStationName($stationName)
    {
        $this->stationName = $stationName;
    
        return $this;
    }

    /**
     * Get stationName
     *
     * @return string 
     */
    public function getStationName()
    {
        return $this->stationName;
    }
      
    public function __toString()
    {
        return $this->stationName;
    }
    
        /**
     * Set sheduleStationsId
     *
     * @param \integer $sheduleStationsId
     * @return stations
     */
    public function setSheduleStationsId($sheduleStationsId)
    {
        $this->sheduleStationsId = $sheduleStationsId;
    
        return $this;
    }

    /**
     * Get stationId
     *
     * @return \integer
     */
    public function getsheduleStationsId()
    {
        return $this->sheduleStationsId;
    }
}
