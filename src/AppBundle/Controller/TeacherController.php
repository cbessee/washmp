<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Teacher;
use AppBundle\Form\TeacherFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TeacherController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/teachers/", name="list_teachers")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $teachers = $em->getRepository('AppBundle:Teacher')->findAll();
        return $this->render('Admin/teacher/list.html.twig', [
            'teachers' => $teachers,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/teacher/new", name="new_teacher")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(TeacherFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $teacher = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();

            $this->addFlash('success', 'Teacher created!');

            return $this->redirectToRoute('list_teachers');
        }

        return $this->render('admin/teacher/new.html.twig', [
            'teacherForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param Teacher $teacher
     * @Route("admin/teacher/{id}/edit", name="edit_teacher")
     */
    public function editAction(Request $request, Teacher $teacher) {
        $form = $this->createForm(TeacherFormType::class, $teacher);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $teacher = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($teacher);
            $em->flush();

            $this->addFlash('success', 'Teacher updated!');

            return $this->redirectToRoute('list_teachers');
        }

        return $this->render('admin/teacher/edit.html.twig', [
            'teacherForm' => $form->createView(),
            'teacher' => $teacher
        ]);
    }

    /**
     * @param Request $request
     * @param Teacher $teacher
     * @Route("admin/teacher/{id}/delete", name="delete_teacher")
     */
    public function deleteAction(Request $request, Teacher $teacher) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($teacher);
        $em->flush();
        $this->addFlash('success', 'Teacher deleted');
        return $this->redirectToRoute('list_teachers');
    }
}