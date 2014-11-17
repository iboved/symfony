<?php

namespace Iboved\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class RandomController extends Controller
{
    public function indexAction()
    {
        $number = rand(1, 5);

        switch($number) {
            case 1:
                $result = 'Default:sun';
                break;
            case 2:
                $result = 'Default:mercury';
                break;
            case 3:
                $result = 'Default:venus';
                break;
            case 4:
                $result = 'Default:earth';
                break;
            case 5:
                $result = 'Default:mars';
                break;
        }

        return $this->render("IbovedTestBundle:{$result}.html.twig");
    }
}
