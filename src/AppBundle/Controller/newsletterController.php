<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class newsletterController extends Controller
{
    /**
     * @Route("/newsletter", name="newsletter")
     */
    public function indexAction()
    {
        return $this->render('default/newsletter.html.twig');
    }
}
