<?php

namespace Iboved\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Iboved\TestBundle\Entity\Task;
use Iboved\TestBundle\Form\Type\TaskType;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/new")
     */
    public function newAction(Request $request)
    {
        $task = new Task();

        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirect($this->generateUrl('_welcome'));
        }

        return $this->render('IbovedTestBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
