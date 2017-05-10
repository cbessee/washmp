<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\K12Grade;
use AppBundle\Form\K12GradeFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class GradeController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/grades/", name="list_grades")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $grades = $em->getRepository('AppBundle:K12Grade')->findAll();
        return $this->render('Admin/grade/list.html.twig', [
            'grades' => $grades,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/grade/new", name="new_grade")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(K12GradeFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $grade = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            $this->addFlash('success', 'Grade level added');

            return $this->redirectToRoute('list_grades');
        }

        return $this->render('admin/grade/new.html.twig', [
            'gradeForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param K12Grade $grade
     * @Route("admin/grade/{id}/edit", name="edit_grade")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, K12Grade $grade) {
        $form = $this->createForm(K12GradeFormType::class, $grade);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $grade = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($grade);
            $em->flush();

            $this->addFlash('success', 'Grade level updated!');

            return $this->redirectToRoute('list_grades');
        }

        return $this->render('admin/grade/edit.html.twig', [
            'gradeForm' => $form->createView(),
            'grade' => $grade
        ]);
    }

    /**
     * @param Request $request
     * @param K12Grade $grade
     * @Route("admin/grade/{id}/delete", name="delete_grade")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Request $request, K12Grade $grade) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($grade);
        $em->flush();
        $this->addFlash('success', 'Grade deleted');
        return $this->redirectToRoute('list_grades');
    }
}