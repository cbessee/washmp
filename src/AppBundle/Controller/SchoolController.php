<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\K12SchoolFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\K12School;

class SchoolController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/schools/", name="list_schools")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $schools = $em->getRepository('AppBundle:K12School')->findAll();
        return $this->render('Admin/school/list.html.twig', [
            'schools' => $schools,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/school/new", name="new_school")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(K12SchoolFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $school = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($school);
            $em->flush();

            $this->addFlash('success', 'School created!');

            return $this->redirectToRoute('list_schools');
        }

        return $this->render('admin/school/new.html.twig', [
            'schoolForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param K12School $school
     * @Route("admin/school/{id}/edit", name="edit_school")
     */
    public function editAction(Request $request, K12School $school) {
        $form = $this->createForm(K12SchoolFormType::class, $school);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $school = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($school);
            $em->flush();

            $this->addFlash('success', 'School updated!');

            return $this->redirectToRoute('list_schools');
        }

        return $this->render('admin/school/edit.html.twig', [
            'schoolForm' => $form->createView(),
            'school' => $school
        ]);
    }

    /**
     * @param Request $request
     * @param K12School $school
     * @Route("admin/school/{id}/delete", name="delete_school")
     */
    public function deleteAction(Request $request, K12School $school) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($school);
        $em->flush();
        $this->addFlash('success', 'School deleted');
        return $this->redirectToRoute('list_schools');
    }
}