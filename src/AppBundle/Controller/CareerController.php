<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\CareerCluster;
use AppBundle\Form\CareerClusterFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CareerController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/careers/", name="list_careers")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $careers = $em->getRepository('AppBundle:CareerCluster')->findAll();
        return $this->render('Admin/career/list.html.twig', [
            'careers' => $careers,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/career/new", name="new_career")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(CareerClusterFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $career = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($career);
            $em->flush();

            $this->addFlash('success', 'Career cluster created!');

            return $this->redirectToRoute('list_careers');
        }

        return $this->render('admin/career/new.html.twig', [
            'careerForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param CareerCluster $career
     * @Route("admin/career/{id}/edit", name="edit_career")
     */
    public function editAction(Request $request, CareerCluster $career) {
        $form = $this->createForm(CareerClusterFormType::class, $career);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $career = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($career);
            $em->flush();

            $this->addFlash('success', 'Career updated!');

            return $this->redirectToRoute('list_careers');
        }

        return $this->render('admin/career/edit.html.twig', [
            'careerForm' => $form->createView(),
            'career' => $career
        ]);
    }

    /**
     * @param Request $request
     * @param Career $career
     * @Route("admin/career/{id}/delete", name="delete_career")
     */
    public function deleteAction(Request $request, CareerCluster $career) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($career);
        $em->flush();
        $this->addFlash('success', 'Career deleted');
        return $this->redirectToRoute('list_careers');
    }
}