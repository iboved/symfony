<?php

namespace Iboved\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoryController extends Controller
{
    /**
     * @Route("/category")
     * @Template()
     */
    public function categoryAction()
    {
        $categories = $this->getDoctrine()
            ->getRepository('IbovedStoreBundle:Category')
            ->findAll();

        return array('categories'=>$categories);
    }
}
