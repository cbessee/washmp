<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request) {
        return $this->render('Admin/index.html.twig');
    }

    /**
     * @param Request $request
     * @param $searchTerm
     * @Route("/search/{searchTerm}", name="search")
     */
    public function searchAction(Request $request, $searchTerm)
    {
        if (is_numeric($searchTerm)) {
            //TODO: Match to state student ID, get matching student, and redirect to student profile
            return $this->render('student/show.html/twig', array(
            ));
        }
    }
}
