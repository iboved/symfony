<?php

namespace Iboved\StoreBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Iboved\StoreBundle\Entity\Product;
use Iboved\StoreBundle\Entity\Category;

class LoadData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName('Milk products');

        $product = new Product();
        $product->setName('Milk');
        $product->setPrice('24.89');
        $product->setDescription('Very useful product');
        $product->setCategory($category);

        $manager->persist($category);
        $manager->persist($product);

        $manager->flush();
    }
}
