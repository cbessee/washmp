<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\StateCourse;
use AppBundle\Form\StateCourseFormType;
use Faker\Provider\cs_CZ\DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class StateCourseController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/courses/", name="list_courses")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $courses = $em->getRepository('AppBundle:StateCourse')->findAll();
        return $this->render('Admin/course/list.html.twig', [
            'courses' => $courses,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/course/new", name="new_course")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(StateCourseFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $course = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $this->addFlash('success', 'Course created!');

            return $this->redirectToRoute('list_courses');
        }

        return $this->render('admin/course/new.html.twig', [
            'courseForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param StateCourse $course
     * @Route("admin/course/{id}/edit", name="edit_course")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, StateCourse $course) {
        $form = $this->createForm(StateCourseFormType::class, $course);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $course = $form->getData();
            echo var_dump($course);

            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $this->addFlash('success', 'Course updated!');

            return $this->redirectToRoute('list_courses');
        }

        return $this->render('admin/course/edit.html.twig', [
            'courseForm' => $form->createView(),
            'course' => $course
        ]);
    }

    /**
     * @param Request $request
     * @param StateCourse $course
     * @Route("admin/course/{id}/delete", name="delete_course")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Request $request, StateCourse $course) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($course);
        $em->flush();
        $this->addFlash('success', 'Course deleted');
        return $this->redirectToRoute('list_courses');
    }
}