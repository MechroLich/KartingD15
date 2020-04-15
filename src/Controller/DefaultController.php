<?php

namespace App\Controller;

use App\Repository\LaptimesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("", name="home")
     */
    public function index(LaptimesRepository $laptimesRepository)
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
    public function laptime(LaptimesRepository $laptimesRepository)
    {
        if(null!==$this->getUser())
        {
            $testQuery = $laptimesRepository->findMyRaces($this->getUser()->getId());
            $template = 'default/laptimes.html.twig';
            $args = [
                'test'=>$testQuery
            ];
            return $this->render($template, $args);
        }
        else
        {

            $template = 'default/laptimes.html.twig';
            $args = [
            ];
            return $this->render($template, $args);
        }
    }

}
