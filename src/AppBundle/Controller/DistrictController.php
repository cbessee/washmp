<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\K12DistrictFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\K12District;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class DistrictController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/districts/", name="list_districts")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $districts = $em->getRepository('AppBundle:K12District')->findAll();
        return $this->render('Admin/district/list.html.twig', [
            'districts' => $districts,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/district/new", name="new_district")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(K12DistrictFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $district = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($district);
            $em->flush();

            $this->addFlash('success', 'District created!');

            return $this->redirectToRoute('list_districts');
        }

        return $this->render('admin/district/new.html.twig', [
            'districtForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param K12District $district
     * @Route("admin/district/{id}/edit", name="edit_district")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, K12District $district) {
        $form = $this->createForm(K12DistrictFormType::class, $district);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $district = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($district);
            $em->flush();

            $this->addFlash('success', 'District updated!');

            return $this->redirectToRoute('list_districts');
        }

        return $this->render('admin/district/edit.html.twig', [
            'districtForm' => $form->createView(),
            'district' => $district
        ]);
    }

    /**
     * @param Request $request
     * @param K12District $district
     * @Route("admin/district/{id}/delete", name="delete_district")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Request $request, K12District $district) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($district);
        $em->flush();
        $this->addFlash('success', 'District deleted');
        return $this->redirectToRoute('list_districts');
    }
}