<?php

namespace Iboved\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="_work")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }

    /**
     * @Route("/addresume", name="_work_addresume")
     * @Template()
     */
    public function addresumeAction()
    {
        return array();
    }

    /**
     * @Route("/viewresume", name="_work_viewresume")
     * @Template()
     */
    public function viewresumeAction()
    {
        return array();
    }

    /**
     * @Route("/addjob", name="_work_addjob")
     * @Template()
     */
    public function addjobAction()
    {
        return array();
    }

    /**
     * @Route("/viewjob", name="_work_viewjob")
     * @Template()
     */
    public function viewjobAction()
    {
        return array();
    }

    /**
     * @Route("/about", name="_work_about")
     * @Template()
     */
    public function aboutAction()
    {
        return array();
    }

    /**
     * @Route("/contact", name="_work_contact")
     * @Template()
     */
    public function contactAction()
    {
        return array();
    }
}
