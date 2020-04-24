<?php

namespace App\Controller;

use App\Repository\LaptimesRepository;
use App\Repository\RacesRepository;
use Symfony\Component\HttpFoundation\Request;
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
    /**
     * @Route("/staff", name="staff")
     */

    public function staff()
    {
        $template = 'default/staff.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/laptime_all", name="laptime_all")
     */
    public function laptime_all(LaptimesRepository $laptimesRepository)
    {
        if(null!==$this->getUser())
        {
            $laptimes = $laptimesRepository->findMyRaces($this->getUser());
            $template = 'default/laptimes_all.html.twig';
            $args = [
                'laptimes'=>$laptimes,
            ];
            return $this->render($template, $args);
        }
        else
        {

            $template = 'default/laptimes_all.html.twig';
            $args = [
            ];
            return $this->render($template, $args);
        }
    }

    /**
     * @Route("/laptime_racein", name="laptime_racein")
     */
    public function laptime_racein(LaptimesRepository $laptimesRepository, Request $request)
    {
        $raceid = $request->get('race');
        if(null!==$this->getUser())
        {
                $users = $laptimesRepository->findUserRaces($this->getUser());
                $races = $laptimesRepository->findByRacesID($raceid);
                $template = 'default/laptimes_race_in.html.twig';
                $args = [
                    'users'=>$users,
                    'races'=>$races,
                    'id'=>$raceid
                ];
                return $this->render($template, $args);
        }
        else
        {
            $template = 'default/laptimes_race_in.html.twig';
            $args = [];
            return $this->render($template, $args);
        }
    }

    /**
     * @Route("/laptime_racereport", name="laptime_racereport")
     */
    public function laptime_racereport(LaptimesRepository $laptimesRepository, RacesRepository $racesRepository, Request $request)
    {
        $raceid = $request->get('race');
        if(null!==$this->getUser())
        {
            $races = $racesRepository->findAll();
            $raceLaps = $laptimesRepository->findByRacesID($raceid);
            $average = $laptimesRepository->avgTotal($raceid);
            $template = 'default/laptimes_race_report.html.twig';
            $args = [
                'races'=>$races,
                'raceLaps'=>$raceLaps,
                'id'=>$raceid,
                'average'=>json_encode(array($average))
            ];
            return $this->render($template, $args);
        }
        else
        {
            $template = 'default/laptimes_race_report.html.twig';
            $args = [
            ];
            return $this->render($template, $args);
        }
    }
    /**
     * @Route("/laptime_allracereport", name="laptime_allracereport")
     */
    public function laptime_allracereport(LaptimesRepository $laptimesRepository, RacesRepository $racesRepository)
    {
        $trackAId = $racesRepository->findBy(["track" => "Track A"]);
        $trackAAvg = $laptimesRepository->avgTotalTrack($trackAId);

        $trackBId = $racesRepository->findBy(["track" => "Track B"]);
        $trackBAvg = $laptimesRepository->avgTotalTrack($trackBId);

        $trackATimes = $laptimesRepository->findByRacesArrayID($trackAId);
        $trackBTimes = $laptimesRepository->findByRacesArrayID($trackBId);
        $template = 'default/laptimes_all_race_report.html.twig';
        $args = [
            'aAvg'=>json_encode(array($trackAAvg)),
            'bAvg'=>json_encode(array($trackBAvg)),
            'aTimes'=>$trackATimes,
            'bTimes'=>$trackBTimes,
        ];
        return $this->render($template, $args);
    }

}
