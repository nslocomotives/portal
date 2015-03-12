<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * newsletters
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class newsletters
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="visible", type="boolean")
     */
    private $visible;
    
     /**
     * @var integer
     *
     * @ORM\ManyToMany(targetEntity="subscribers")
     */
    private $subscriberId;


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
     * Set name
     *
     * @param string $name
     * @return newsletters
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
     * Set description
     *
     * @param string $description
     * @return newsletters
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set visible
     *
     * @param boolean $visible
     * @return newsletters
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    
        return $this;
    }

    /**
     * Get visible
     *
     * @return boolean 
     */
    public function getVisible()
    {
        return $this->visible;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subscriberId = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add subscriberId
     *
     * @param \AppBundle\Entity\subscribers $subscriberId
     * @return newsletters
     */
    public function addSubscriberId(\AppBundle\Entity\subscribers $subscriberId)
    {
        $this->subscriberId[] = $subscriberId;
    
        return $this;
    }

    /**
     * Remove subscriberId
     *
     * @param \AppBundle\Entity\subscribers $subscriberId
     */
    public function removeSubscriberId(\AppBundle\Entity\subscribers $subscriberId)
    {
        $this->subscriberId->removeElement($subscriberId);
    }

    /**
     * Get subscriberId
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriberId()
    {
        return $this->subscriberId;
    }
}