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
     * @Route("/laps", name="laptime")
     */
    public function laptime()
    {
        $template = 'default/laptimes.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

}
