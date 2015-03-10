<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * trainshedual
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class trainshedual
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
     * @ORM\OneToMany(targetEntity="train", mappedBy="trains")
     */
    private $train; 
    
    public function __construct() {
        $this->train = new ArrayCollection();
    }
    
    /**
     * @ORM\ManyToOne(targetEntity="schedualdays", inversedBy="schedual")
     */
    private $trains; 

    /**
     * @var string
     *
     * @ORM\Column(name="operatingdays", type="string", length=3)
     */
    private $operatingdays;

    /**
     * @var integer
     *
     * @ORM\Column(name="schedule", type="integer")
     */
    private $schedule;


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
     * Set train
     *
     * @param integer $train
     * @return trainshedual
     */
    public function setTrain($train)
    {
        $this->train = $train;
    
        return $this;
    }

    /**
     * Get train
     *
     * @return integer 
     */
    public function getTrain()
    {
        return $this->train;
    }

    /**
     * Set operatingdays
     *
     * @param string $operatingdays
     * @return trainshedual
     */
    public function setOperatingdays($operatingdays)
    {
        $this->operatingdays = $operatingdays;
    
        return $this;
    }

    /**
     * Get operatingdays
     *
     * @return string 
     */
    public function getOperatingdays()
    {
        return $this->operatingdays;
    }

    /**
     * Set schedule
     *
     * @param integer $schedule
     * @return trainshedual
     */
    public function setSchedule($schedule)
    {
        $this->schedule = $schedule;
    
        return $this;
    }

    /**
     * Get schedule
     *
     * @return integer 
     */
    public function getSchedule()
    {
        return $this->schedule;
    }

    /**
     * Add train
     *
     * @param \AppBundle\Entity\train $train
     * @return trainshedual
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
     * Set trains
     *
     * @param \AppBundle\Entity\schedualdays $trains
     * @return trainshedual
     */
    public function setTrains(\AppBundle\Entity\schedualdays $trains = null)
    {
        $this->trains = $trains;
    
        return $this;
    }

    /**
     * Get trains
     *
     * @return \AppBundle\Entity\schedualdays 
     */
    public function getTrains()
    {
        return $this->trains;
    }
}