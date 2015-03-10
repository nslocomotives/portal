<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * locos
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class locos
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
     * @ORM\Column(name="locos", type="string", length=10)
     */
    private $locoNo;
    
     /**
     * @ORM\ManyToMany(targetEntity="train")
     *
     */
    private $train;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=30, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="operationalStatus", type="string", length=255)
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
     * Set locoNo
     *
     * @param string $locoNo
     * @return locoNo
     */
    public function setLocos($locoNo)
    {
        $this->locoNo = $locoNo;
    
        return $this;
    }

    /**
     * Get locoNo
     *
     * @return string 
     */
    public function getLocoNo()
    {
        return $this->locoNo;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return locos
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set operationalStatus
     *
     * @param string $operationalStatus
     * @return locos
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
     * Constructor
     */
    public function __construct()
    {
        $this->train = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set locoNo
     *
     * @param string $locoNo
     * @return locos
     */
    public function setLocoNo($locoNo)
    {
        $this->locoNo = $locoNo;
    
        return $this;
    }

    /**
     * Add train
     *
     * @param \AppBundle\Entity\train $train
     * @return locos
     */
    public function addTrain(\AppBundle\Entity\train $train)
    {
        $this->train[] = $train;
    
        return $this;
    }

    /**
     * Remove train
     *
     * @param \AppBundle\Entity\train $train
     */
    public function removeTrain(\AppBundle\Entity\train $train)
    {
        $this->train->removeElement($train);
    }

    /**
     * Get train
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTrain()
    {
        return $this->train;
    }
    
        public function __toString()
    {
        return $this->locoNo;
        
    }
}