<?php

namespace Iboved\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iboved\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('IbovedStoreBundle:Default:index.html.twig');
    }

    /**
     * @Route("/add")
     */
    public function createAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');

        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return new Response('Created product id '.$product->getId());
    }

    /**
     * @Route("/show/{id}")
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
            ->getRepository('IbovedStoreBundle:Product')
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Fetch product: '.$product->getName());
    }
}
