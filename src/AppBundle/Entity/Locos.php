<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Locos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Locos
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
     * @ORM\Column(name="Loco_number", type="string", length=10)
     */
    private $locoNumber;
    
    /**
     * @ORM\ManyToOne(targetEntity="LocoRoster", inversedBy="locos")
     */
    private $locoRoster;

    /**
     * @var string
     *
     * @ORM\Column(name="Loco_Name", type="string", length=30)
     */
    private $locoName;

    /**
     * @var string
     *
     * @ORM\Column(name="Operational_Status", type="string", length=30)
     */
    private $operationalStatus;


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
     * Set locoNumber
     *
     * @param string $locoNumber
     * @return Locos
     */
    public function setLocoNumber($locoNumber)
    {
        $this->locoNumber = $locoNumber;
    
        return $this;
    }

    /**
     * Get locoNumber
     *
     * @return string 
     */
    public function getLocoNumber()
    {
        return $this->locoNumber;
    }

    /**
     * Set locoName
     *
     * @param string $locoName
     * @return Locos
     */
    public function setLocoName($locoName)
    {
        $this->locoName = $locoName;
    
        return $this;
    }

    /**
     * Get locoName
     *
     * @return string 
     */
    public function getLocoName()
    {
        return $this->locoName;
    }

    /**
     * Set operationalStatus
     *
     * @param string $operationalStatus
     * @return Locos
     */
    public function setOperationalStatus($operationalStatus)
    {
        $this->operationalStatus = $operationalStatus;
    
        return $this;
    }

    /**
     * Get operationalStatus
     *
     * @return string 
     */
    public function getOperationalStatus()
    {
        return $this->operationalStatus;
    }

    /**
     * Set locoRoster
     *
     * @param \AppBundle\Entity\LocoRoster $locoRoster
     * @return Locos
     */
    public function setLocoRoster(\AppBundle\Entity\LocoRoster $locoRoster = null)
    {
        $this->locoRoster = $locoRoster;
    
        return $this;
    }

    /**
     * Get locoRoster
     *
     * @return \AppBundle\Entity\LocoRoster 
     */
    public function getLocoRoster()
    {
        return $this->locoRoster;
    }
    
    public function __toString()
    {
        return $this->locoNumber;
    }
}