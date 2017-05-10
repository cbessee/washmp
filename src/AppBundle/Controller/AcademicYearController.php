<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\AcademicYear;
use AppBundle\Form\AcademicYearFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AcademicYearController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/years/", name="list_academic_years")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $years = $em->getRepository('AppBundle:AcademicYear')->findAll();
        return $this->render('Admin/year/list.html.twig', [
            'academicYears' => $years,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/year/new", name="new_academic_year")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(AcademicYearFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $year = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($year);
            $em->flush();

            $this->addFlash('success', 'Academic year added!');

            return $this->redirectToRoute('list_academic_years');
        }

        return $this->render('admin/year/new.html.twig', [
            'academicYearForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param AcademicYear $year
     * @Route("admin/year/{id}/edit", name="edit_academic_year")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, AcademicYear $year) {
        $form = $this->createForm(AcademicYearFormType::class, $year);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $year = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($year);
            $em->flush();

            $this->addFlash('success', 'Academic year updated!');

            return $this->redirectToRoute('list_academic_years');
        }

        return $this->render('admin/year/edit.html.twig', [
            'academicYearForm' => $form->createView(),
            'academicYear' => $year
        ]);
    }

    /**
     * @param Request $request
     * @param AcademicYear $year
     * @Route("admin/year/{id}/delete", name="delete_academic_year")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Request $request, AcademicYear $year) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($year);
        $em->flush();
        $this->addFlash('success', 'Academic year deleted');
        return $this->redirectToRoute('list_academic_years');
    }
}