<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class StudentController extends Controller
{
    /**
     * @Route("/student/{studentID}", name="view_student")
     */
    public function showAction(Request $request, $studentID)
    {
        $em = $this->getDoctrine()->getManager();
        $student = $em->getRepository('AppBundle:Student')
            ->find($studentID);

        return $this->render('student/show.html.twig', [
            'student' => $student
        ]);
    }

    /**
     * @Route("student/{studentID}/edit", name="edit_student")
     */
    public function editAction(Request $request, $studentID)
    {
        return $this->render('student/edit.html.twig');
    }

    /**
     * @Route("student/new", name="new_student")
     */
    public function addAction(Request $request)
    {
        return $this->render('student/show.html.twig');
    }

}