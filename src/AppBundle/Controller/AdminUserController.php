<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\K12Center;
use AppBundle\Repository\UserRepository;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminUserController extends Controller
{
    /**
     * @Route("admin/users/", name="list_users")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $pendingUsers = $em->getRepository('AppBundle:User')->getUsersByRole('a:0:{}');
        $approvedUsers = $em->getRepository('AppBundle:User')->getUsersByRole('ADMIN');
        return $this->render('Admin/user/list.html.twig', [
            'pendingUsers' => $pendingUsers,
            'approvedUsers' => $approvedUsers,
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @Route("admin/user/{id}/", name="manage_user")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function manageAction(Request $request, User $user) {
        $em = $this->getDoctrine()->getManager();
        $centers = $em->getRepository('AppBundle:K12Center')->findAll();
        return $this->render('Admin/user/manage.html.twig', [
            'user' => $user,
            'centers' => $centers,
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @param K12Center $center
     * @Route("admin/user/{id}/setCenter/", name="set_user_center")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     * @Method({"POST"})
     */
    public function setUserCenter(Request $request, User $user) {
        if(!$_POST['center']) {
            return $this->redirectToRoute('manage_user', [
                'id' => $user->getId(),
            ]);
        }
        $center_id = $_POST['center'];
        $em = $this->getDoctrine()->getManager();
        $center = $em->getRepository('AppBundle:K12Center')->find($center_id);
        $user->setCenter($center);
        $userManager = $this->get('fos_user.user_manager');
        $userManager->updateUser($user);


        $this->addFlash('success', $user . ' center set to ' . $center);

        return $this->redirectToRoute('manage_user', [
            'id' => $user->getId(),
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("admin/user/{id}/approve", name="approve_user")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function approveAction(Request $request, User $user) {
        $userManager = $this->get('fos_user.user_manager');
        $user->addRole('ROLE_ADMIN');
        $userManager->updateUser($user);

        $this->addFlash('success', 'Database access granted for user ' . $user);

        return $this->redirectToRoute('list_users');
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("admin/user/{id}/deny", name="deny_user")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function denyAction(Request $request, User $user) {
        $userManager = $this->get('fos_user.user_manager');
        if($user->hasRole('ROLE_SUPER_ADMIN')) {
            $user->removeRole('ROLE_SUPER_ADMIN');
        }
        if($user->hasRole('ROLE_ADMIN')) {
            $user->removeRole('ROLE_ADMIN');
        }
        $userManager->updateUser($user);

        $this->addFlash('success', 'Database access removed for user ' . $user);

        return $this->redirectToRoute('manage_user', ['id' => $user->getId()]);
    }


    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("admin/user/{id}/super", name="super_approve_user")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function superApproveAction(Request $request, User $user) {
        $userManager = $this->get('fos_user.user_manager');
        if($user->hasRole('ROLE_ADMIN')) {
            $user->removeRole('ROLE_ADMIN');
        }
        $user->addRole('ROLE_SUPER_ADMIN');
        $userManager->updateUser($user);

        $this->addFlash('success', 'Database admin access granted for user ' . $user);

        return $this->redirectToRoute('manage_user', ['id' => $user->getId()]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @Route("admin/user/{id}/demote", name="demote_user")
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     */
    public function demoteUser(Request $request, User $user) {
        $userManager = $this->get('fos_user.user_manager');
        $user->removeRole('ROLE_SUPER_ADMIN');
        if(!$user->hasRole('ROLE_ADMIN')) {
            $user->addRole('ROLE_ADMIN');
        }
        $userManager->updateUser($user);

        $this->addFlash('success', 'Admin user ' . $user . ' demoted to regular user');

        return $this->redirectToRoute('manage_user', ['id' => $user->getId()]);
    }



}