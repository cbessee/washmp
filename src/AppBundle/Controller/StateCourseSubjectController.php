<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\StateCourseSubject;
use AppBundle\Form\StateCourseSubjectFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StateCourseSubjectController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/course_subjects/", name="list_course_subjects")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $course_subjects = $em->getRepository('AppBundle:StateCourseSubject')->findAll();
        return $this->render('Admin/course_subject/list.html.twig', [
            'course_subjects' => $course_subjects,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/course_subject/new", name="new_course_subject")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(StateCourseSubjectFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $course_subject = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($course_subject);
            $em->flush();

            $this->addFlash('success', 'Course Subject created!');

            return $this->redirectToRoute('list_course_subjects');
        }

        return $this->render('admin/course_subject/new.html.twig', [
            'courseSubjectForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param StateCourseSubject $course_subject
     * @Route("admin/course_subject/{id}/edit", name="edit_course_subject")
     */
    public function editAction(Request $request, StateCourseSubject $course_subject) {
        $form = $this->createForm(StateCourseSubjectFormType::class, $course_subject);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $course_subject = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($course_subject);
            $em->flush();

            $this->addFlash('success', 'Course Subject updated!');

            return $this->redirectToRoute('list_course_subjects');
        }

        return $this->render('admin/course_subject/edit.html.twig', [
            'courseSubjectForm' => $form->createView(),
            'course_subject' => $course_subject
        ]);
    }

    /**
     * @param Request $request
     * @param StateCourseSubject $course_subject
     * @Route("admin/course_subject/{id}/delete", name="delete_course_subject")
     */
    public function deleteAction(Request $request, StateCourseSubject $course_subject) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($course_subject);
        $em->flush();
        $this->addFlash('success', 'Course Subject deleted');
        return $this->redirectToRoute('list_course_subjects');
    }
}