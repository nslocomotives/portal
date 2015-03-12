<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LocoRoster
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class LocoRoster
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
     * @ORM\OneToMany(targetEntity="Locos", mappedBy="locoNumber")
     */
    private $locos;

    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=30)
     */
    private $role;

    /**
     * @ORM\ManyToOne(targetEntity="Timetable", inversedBy="locoRoster_id")
     */
    private $timetable;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->locos = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set role
     *
     * @param string $role
     * @return LocoRoster
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Add locos
     *
     * @param \AppBundle\Entity\Locos $locos
     * @return LocoRoster
     */
    public function addLoco(\AppBundle\Entity\Locos $locos)
    {
        $this->locos[] = $locos;
    
        return $this;
    }

    /**
     * Remove locos
     *
     * @param \AppBundle\Entity\Locos $locos
     */
    public function removeLoco(\AppBundle\Entity\Locos $locos)
    {
        $this->locos->removeElement($locos);
    }

    /**
     * Get locos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLocos()
    {
        return $this->locos;
    }

    /**
     * Set timetable
     *
     * @param \AppBundle\Entity\Timetable $timetable
     * @return LocoRoster
     */
    public function setTimetable(\AppBundle\Entity\Timetable $timetable = null)
    {
        $this->timetable = $timetable;
    
        return $this;
    }

    /**
     * Get timetable
     *
     * @return \AppBundle\Entity\Timetable 
     */
    public function getTimetable()
    {
        return $this->timetable;
    }
    
    public function __toString()
    {
        return $this->role;
    }
}