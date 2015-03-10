<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * train
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class train
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
     * @ORM\Column(name="headcode", type="string", length=8)
     */
    private $headcode;

    /**
     * @ORM\ManyToMany(targetEntity="locos")
     */
    private $locoNo; 
    
    /**
     * @ORM\ManyToOne(targetEntity="trainshedual", inversedBy="train")
     */
    private $trains;
    
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
     * Set headcode
     *
     * @param string $headcode
     * @return train
     */
    public function setHeadcode($headcode)
    {
        $this->headcode = $headcode;
    
        return $this;
    }

    /**
     * Get headcode
     *
     * @return string 
     */
    public function getHeadcode()
    {
        return $this->headcode;
    }

    /**
     * Set locoNo
     *
     * @param string $locoNo
     * @return train
     */
    public function setLocoNo($locoNo)
    {
        $this->locoNo = $locoNo;
    
        return $this;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locoNo = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add locoNo
     *
     * @param \AppBundle\Entity\locos $locoNo
     * @return train
     */
    public function addLocoNo(\AppBundle\Entity\locos $locoNo)
    {
        $this->locoNo[] = $locoNo;
    
        return $this;
    }

    /**
     * Remove locoNo
     *
     * @param \AppBundle\Entity\locos $locoNo
     */
    public function removeLocoNo(\AppBundle\Entity\locos $locoNo)
    {
        $this->locoNo->removeElement($locoNo);
    }

    /**
     * Get locoNo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocoNo()
    {
        return $this->locoNo;
    }

    /**
     * Set trains
     *
     * @param \AppBundle\Entity\trainshedual $trains
     * @return train
     */
    public function setTrains(\AppBundle\Entity\trainshedual $trains = null)
    {
        $this->trains = $trains;
    
        return $this;
    }

    /**
     * Get trains
     *
     * @return \AppBundle\Entity\trainshedual 
     */
    public function getTrains()
    {
        return $this->trains;
    }
  
           
}