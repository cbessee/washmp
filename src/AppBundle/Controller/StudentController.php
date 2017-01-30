<?php

namespace AppBundle\Controller;

use AppBundle\Form\StudentFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Student;

class StudentController extends Controller
{
    /**
     * @Route("students/", name="list_students")
     */
    public function listAction(Request $request)
    {
        return $this->render('student/list.html.twig');
    }

    /**
     * @Route("students/{search}", name="search_students")
     */
    public function searchAction(Request $request, $search)
    {
        return $this->render('student/list.html.twig');
    }

    /**
     * @Route("student/new", name="new_student")
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
     */
    public function showAction(Request $request, Student $student)
    {
        return $this->render('student/show.html.twig', [
            'student' => $student
        ]);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/student/{id}/view", name="view_student")
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