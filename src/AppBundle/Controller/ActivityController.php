<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Form\ActivityFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Activity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ActivityController extends Controller
{
    /**
     * @param Request $request
     * @Route("admin/activities/", name="list_activities")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $activities = $em->getRepository('AppBundle:Activity')->findAll();
        return $this->render('Admin/activity/list.html.twig', [
            'activities' => $activities,
        ]);
    }

    /**
     * @param Request $request
     * @Route("admin/activity/new", name="new_activity")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function newAction(Request $request) {
        $form = $this->createForm(ActivityFormType::class);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $activity = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            $this->addFlash('success', 'Activity created!');

            return $this->redirectToRoute('list_activities');
        }

        return $this->render('admin/activity/new.html.twig', [
            'activityForm' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @param Activity $activity
     * @Route("admin/activity/{id}/edit", name="edit_activity")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function editAction(Request $request, Activity $activity) {
        $form = $this->createForm(ActivityFormType::class, $activity);

        // only executes on POST
        $form->handleRequest($request);

        if($form->isSubmitted() && !$form->isValid())
        {
            $this->addFlash('error', 'Please correct the errors in your form below');
        }

        if($form->isSubmitted() && $form->isValid())
        {
            $activity = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            $this->addFlash('success', 'Activity updated!');

            return $this->redirectToRoute('list_activities');
        }

        return $this->render('admin/activity/edit.html.twig', [
            'activityForm' => $form->createView(),
            'activity' => $activity
        ]);
    }

    /**
     * @param Request $request
     * @param Activity $activity
     * @Route("admin/activity/{id}/delete", name="delete_activity")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function deleteAction(Request $request, Activity $activity) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($activity);
        $em->flush();
        $this->addFlash('success', 'Activity deleted');
        return $this->redirectToRoute('list_activities');
    }
}