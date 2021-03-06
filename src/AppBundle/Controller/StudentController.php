<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\StudentFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Student;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class StudentController extends Controller
{
    /**
     * @Route("students/", name="list_students")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $students = $em->getRepository('AppBundle:Student')->findAll();
        return $this->render('student/list.html.twig', [
            'students' => $students,
        ]);
    }

    /**
     * @Route("students/search", name="search_students")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function searchAction(Request $request)
    {
        $search = $request->query->get('search');
        $em = $this->getDoctrine()->getManager();
        $students = $em->getRepository('AppBundle:Student')->searchAll($search);

        return $this->render('student/list.html.twig', [
            'search_string' => $search,
            'students' => $students,
        ]);
    }

    /**
     * @Route("student/new", name="new_student")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function newAction(Request $request)
    {
        $form = $this->createForm(StudentFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $student = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            $this->addFlash('success', 'Student created!');

            return $this->redirectToRoute('view_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('student/new.html.twig', [
            'studentForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/student/{id}", name="show_student")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function showAction(Request $request, Student $student)
    {
        return $this->render('student/show.html.twig', [
            'student' => $student,
            'aifForms' => $student->getK12AIFs(),
            'seniorSurveys' => $student->getSeniorSurveys(),
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/student/{id}/view", name="view_student")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function viewAction(Request $request, Student $student)
    {
        $form = $this->createForm(StudentFormType::class, $student, ['disabled'=>true]);
        return $this->render('student/view.html.twig', [
            'student' => $student,
            'studentForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("student/{id}/edit", name="edit_student")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, Student $student)
    {
        $form = $this->createForm(StudentFormType::class, $student);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $student = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($student);
            $em->flush();

            $this->addFlash('success', 'Student updated!');

            return $this->redirectToRoute('view_student', [
                'id' => $student->getID()
            ]);
        }

        return $this->render('student/edit.html.twig', [
            'studentForm' => $form->createView(),
            'student' => $student
        ]);
    }

}