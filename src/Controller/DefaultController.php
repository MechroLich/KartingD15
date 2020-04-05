<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index()
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/welcome", name="welcome")
     */
    public function welcome()
    {
        $template = 'default/welcome.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/laptimes", name="laptimes")
     */
    public function laptimes()
    {
        $template = 'default/laptimes.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function admin()
    {
        $template = 'default/admin.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
    /**
     * @Route("/staff", name="staff")
     */
    public function staff()
    {
        $template = 'default/staff.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

}
