<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * templates
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class templates
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
     * @var integer
     *
     * @ORM\Column(name="columns", type="integer")
     */
    private $columns;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text")
     */
    private $body;


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
     * @return templates
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
     * Set columns
     *
     * @param integer $columns
     * @return templates
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    
        return $this;
    }

    /**
     * Get columns
     *
     * @return integer 
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return templates
     */
    public function setBody($body)
    {
        $this->body = $body;
    
        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }
}
