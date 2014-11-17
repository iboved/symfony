<?php

namespace Iboved\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_space")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/hello/{name}", name="_space_hello")
     * @Template()
     */
    public function helloAction($name)
    {
        return array('name' => $name);
    }

    /**
     * @Route("/sun", name="_space_sun")
     * @Template()
     */
    public function sunAction()
    {
        return array();
    }

    /**
     * @Route("/mercury", name="_space_mercury")
     * @Template()
     */
    public function mercuryAction()
    {
        return array();
    }

    /**
     * @Route("/venus", name="_space_venus")
     * @Template()
     */
    public function venusAction()
    {
        return array();
    }

    /**
     * @Route("/earth", name="_space_earth")
     * @Template()
     */
    public function earthAction()
    {
        return array();
    }

    /**
     * @Route("/mars", name="_space_mars")
     * @Template()
     */
    public function marsAction()
    {
        return array();
    }
}
