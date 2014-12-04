<?php

namespace Iboved\StoreBundle\Controller;

use Iboved\StoreBundle\Entity\Category;
use Iboved\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $products = $this->getDoctrine()
            ->getRepository('IbovedStoreBundle:Product')
            ->findAll();

        return array('products'=>$products);
    }

    /**
     * @Route("/add")
     */
    public function createAction()
    {
        $category = new Category();
        $category->setName('Main Products');

        $product = new Product();
        $product->setName('A Foo Bar');
        $product->setPrice('19.99');
        $product->setDescription('Lorem ipsum dolor');
        $product->setCategory($category);

        $em = $this->getDoctrine()->getManager();
        $em->persist($category);
        $em->persist($product);
        $em->flush();

        return new Response(
            'Created product id '.$product->getId()
            .' and category id: '.$category->getId()
        );
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

        $categoryName = $product->getCategory()->getName();

        return new Response(
            'Fetch product: '.$product->getName()
            .' and category name: '.$categoryName
        );
    }

    /**
     * @Route("/update/{id}")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('IbovedStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $em->flush();

        return $this->redirect($this->generateUrl('iboved_store_default_index'));
    }

    /**
     * @Route("/delete/{id}")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('IbovedStoreBundle:Product')->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $em->remove($product);
        $em->flush();

        return new Response('Delete product id '.$id);
    }

    /**
     * @Route("/build")
     */
    public function buildAction()
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('IbovedStoreBundle:Product')
            ->findAllOrderedByName();

        var_dump($products);

        return new Response('Fetch product: '. $products[0]->getName());
    }
}
