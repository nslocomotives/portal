<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * messages
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class messages
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
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="leftcol", type="text")
     */
    private $leftcol;

    /**
     * @var string
     *
     * @ORM\Column(name="rightcol", type="text")
     */
    private $rightcol;

    /**
     * @var integer
     *
     * @ORM\Column(name="template_id", type="integer")
     */
    private $templateId;


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
     * Set subject
     *
     * @param string $subject
     * @return messages
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    
        return $this;
    }

    /**
     * Get subject
     *
     * @return string 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set leftcol
     *
     * @param string $leftcol
     * @return messages
     */
    public function setLeftcol($leftcol)
    {
        $this->leftcol = $leftcol;
    
        return $this;
    }

    /**
     * Get leftcol
     *
     * @return string 
     */
    public function getLeftcol()
    {
        return $this->leftcol;
    }

    /**
     * Set rightcol
     *
     * @param string $rightcol
     * @return messages
     */
    public function setRightcol($rightcol)
    {
        $this->rightcol = $rightcol;
    
        return $this;
    }

    /**
     * Get rightcol
     *
     * @return string 
     */
    public function getRightcol()
    {
        return $this->rightcol;
    }

    /**
     * Set templateId
     *
     * @param integer $templateId
     * @return messages
     */
    public function setTemplateId($templateId)
    {
        $this->templateId = $templateId;
    
        return $this;
    }

    /**
     * Get templateId
     *
     * @return integer 
     */
    public function getTemplateId()
    {
        return $this->templateId;
    }
}
