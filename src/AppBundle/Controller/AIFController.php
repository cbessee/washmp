<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\K12AIF;
use AppBundle\Form\AnnualIntakeFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AIFController extends Controller
{

    /**
     * @Route("student/{id}/aif/new", name="new_aif")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request, Student $student)
    {
        $form = $this->createForm(AnnualIntakeFormType::class, null, array(
            'student' => $student->getId(),
        ));

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $aif = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($aif);
            $em->flush();

            $this->addFlash('success', 'AIF entered for ' . $student);

            return $this->redirectToRoute('show_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('AIF/new.html.twig', [
            'student' => $student,
            'annualIntakeForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/student/{id}/aif/{aif_id}", name="show_aif_form")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Request $request, Student $student, K12AIF $AIF)
    {
        $form = $this->createForm(AnnualIntakeFormType::class, $AIF, ['disabled'=>true, 'student' => $student->getID()]);
        return $this->render('AIF/view.html.twig', [
            'student' => $student,
            'aif' => $AIF,
            'annualIntakeForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("student/{id}/aif/{aif_id}/edit", name="edit_aif_form")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Student $student, K12AIF $AIF )
    {
        $form = $this->createForm(AnnualIntakeFormType::class, $AIF, array(
            'student' => $student->getId(),
        ));

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $AIF = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($AIF);
            $em->flush();

            $this->addFlash('success', 'Intake form updated!');

            return $this->redirectToRoute('show_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('AIF/edit.html.twig', [
            'annualIntakeForm' => $form->createView(),
            'aif' => $AIF,
            'student' => $student
        ]);
    }

}