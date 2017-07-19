<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\SeniorSurvey;
use AppBundle\Form\SeniorSurveyFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SeniorSurveyController extends Controller
{

    /**
     * @Route("student/{id}/survey/new", name="new_survey")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request, Student $student)
    {
        $form = $this->createForm(SeniorSurveyFormType::class, null, array(
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

            $this->addFlash('success', 'Senior Survey entered for ' . $student);

            return $this->redirectToRoute('show_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('survey/new.html.twig', [
            'student' => $student,
            'seniorSurveyForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/student/{id}/survey/{survey_id}", name="show_survey_form")
     * @ParamConverter("seniorSurvey", class="AppBundle:SeniorSurvey", options={"id" = "survey_id"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Request $request, Student $student, SeniorSurvey $seniorSurvey)
    {
        $form = $this->createForm(SeniorSurveyFormType::class, $seniorSurvey, ['disabled'=>true, 'student' => $student->getID()]);
        return $this->render('survey/view.html.twig', [
            'student' => $student,
            'seniorSurvey' => $seniorSurvey,
            'seniorSurveyForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("student/{id}/survey/{survey_id}/edit", name="edit_survey_form")
     * @ParamConverter("seniorSurvey", class="AppBundle:SeniorSurvey", options={"id" = "survey_id"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Student $student, SeniorSurvey $seniorSurvey )
    {
        $form = $this->createForm(SeniorSurveyFormType::class, $seniorSurvey, array(
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
            $seniorSurvey = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($seniorSurvey);
            $em->flush();

            $this->addFlash('success', 'Senior Survey updated!');

            return $this->redirectToRoute('show_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('survey/edit.html.twig', [
            'seniorSurveyForm' => $form->createView(),
            'seniorSurvey' => $seniorSurvey,
            'student' => $student
        ]);
    }

}