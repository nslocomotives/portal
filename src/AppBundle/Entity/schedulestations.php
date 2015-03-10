<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * schedulestations
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class schedulestations
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
     * @ORM\ManyToOne(targetEntity="stations", inversedBy="sheduleStationsid")
     */
    private $stationId;
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="trainshedual")
     */
    private $trainSchedual;
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="arival_time", type="time")
     */
    private $arivalTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_time", type="time")
     */
    private $departureTime;


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
     * Set arivalTime
     *
     * @param \DateTime $arivalTime
     * @return schedulestations
     */
    public function setArivalTime($arivalTime)
    {
        $this->arivalTime = $arivalTime;
    
        return $this;
    }

    /**
     * Get arivalTime
     *
     * @return \DateTime 
     */
    public function getArivalTime()
    {
        return $this->arivalTime;
    }

    /**
     * Set departureTime
     *
     * @param \DateTime $departureTime
     * @return schedulestations
     */
    public function setDepartureTime($departureTime)
    {
        $this->departureTime = $departureTime;
    
        return $this;
    }

    /**
     * Get departureTime
     *
     * @return \DateTime 
     */
    public function getDepartureTime()
    {
        return $this->departureTime;
    }
    
    /**
     * Set stationId
     *
     * @param \integer $stationId
     * @return schedulestations
     */
    public function setStationId($stationId)
    {
        $this->stationId = $stationId;
    
        return $this;
    }

    /**
     * Get stationId
     *
     * @return \integer
     */
    public function getStationId()
    {
        return $this->stationId;
    }
        
}
