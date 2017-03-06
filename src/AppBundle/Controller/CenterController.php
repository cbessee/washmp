<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\K12CenterFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\K12Center;

class CenterController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/centers/", name="list_centers")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $centers = $em->getRepository('AppBundle:K12Center')->findAll();
        return $this->render('Admin/center/list.html.twig', [
            'centers' => $centers,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/center/new", name="new_center")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(K12CenterFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $center = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($center);
            $em->flush();

            $this->addFlash('success', 'Center created!');

            return $this->redirectToRoute('list_centers');
        }

        return $this->render('admin/center/new.html.twig', [
            'centerForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param K12Center $center
     * @Route("admin/center/{id}/edit", name="edit_center")
     */
    public function editAction(Request $request, K12Center $center) {
        $form = $this->createForm(K12CenterFormType::class, $center);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $center = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($center);
            $em->flush();

            $this->addFlash('success', 'Center updated!');

            return $this->redirectToRoute('list_centers');
        }

        return $this->render('admin/center/edit.html.twig', [
            'centerForm' => $form->createView(),
            'center' => $center
        ]);
    }

    /**
     * @param Request $request
     * @param K12Center $center
     * @Route("admin/center/{id}/delete", name="delete_center")
     */
    public function deleteAction(Request $request, K12Center $center) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($center);
        $em->flush();
        $this->addFlash('success', 'Center deleted');
        return $this->redirectToRoute('list_centers');
    }
}