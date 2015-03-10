<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * schedualdays
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class schedualdays
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
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="trainshedual", mappedBy="train")
     */
    private $schedual;
    
    
    public function __construct()
    {
        $this->schedual = new ArrayCollection();
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;


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
     * Set schedual
     *
     * @param integer $schedual
     * @return schedualdays
     */
    public function setSchedual($schedual)
    {
        $this->schedual = $schedual;
    
        return $this;
    }

    /**
     * Get schedual
     *
     * @return integer 
     */
    public function getSchedual()
    {
        return $this->schedual;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return schedualdays
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }
}
