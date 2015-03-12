<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * timetable
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Timetable
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
     * @var string
     *
     * @ORM\Column(name="signal_id", type="string", length=4)
     */
    private $signalId;
    
    /**
     * @ORM\OneToMany(targetEntity="LocoRoster", mappedBy="timetableId")
     */
    private $locoRoster_id;

    /**
     * @var string
     *
     * @ORM\Column(name="time_loading", type="string", length=4)
     */
    private $timeLoading;

    /**
     * @var string
     *
     * @ORM\Column(name="operating_char", type="string", length=30)
     */
    private $operatingChar;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locoRoster_id = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
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
     * Set signalId
     *
     * @param string $signalId
     * @return Timetable
     */
    public function setSignalId($signalId)
    {
        $this->signalId = $signalId;
    
        return $this;
    }

    /**
     * Get signalId
     *
     * @return string 
     */
    public function getSignalId()
    {
        return $this->signalId;
    }

    /**
     * Set timeLoading
     *
     * @param string $timeLoading
     * @return Timetable
     */
    public function setTimeLoading($timeLoading)
    {
        $this->timeLoading = $timeLoading;
    
        return $this;
    }

    /**
     * Get timeLoading
     *
     * @return string 
     */
    public function getTimeLoading()
    {
        return $this->timeLoading;
    }

    /**
     * Set operatingChar
     *
     * @param string $operatingChar
     * @return Timetable
     */
    public function setOperatingChar($operatingChar)
    {
        $this->operatingChar = $operatingChar;
    
        return $this;
    }

    /**
     * Get operatingChar
     *
     * @return string 
     */
    public function getOperatingChar()
    {
        return $this->operatingChar;
    }

    /**
     * Add locoRoster_id
     *
     * @param \AppBundle\Entity\LocoRoster $locoRosterId
     * @return Timetable
     */
    public function addLocoRosterId(\AppBundle\Entity\LocoRoster $locoRosterId)
    {
        $this->locoRoster_id[] = $locoRosterId;
    
        return $this;
    }

    /**
     * Remove locoRoster_id
     *
     * @param \AppBundle\Entity\LocoRoster $locoRosterId
     */
    public function removeLocoRosterId(\AppBundle\Entity\LocoRoster $locoRosterId)
    {
        $this->locoRoster_id->removeElement($locoRosterId);
    }

    /**
     * Get locoRoster_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocoRosterId()
    {
        return $this->locoRoster_id;
    }
    
        public function __toString()
    {
        return $this->signalId;
    }
    
}