<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function home(): Response
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/news", name="news")
     */
    public function news(): Response
    {
        return $this->render('news.html.twig');
    }

    /**
     * @Route("/factoryOfTheWeek", name="weekly")
     */
    public function weekly(): Response
    {
        return $this->render('weekly.html.twig');
    }

    /**
     * @Route("/tutorials", name="tutorials")
     */
    public function tutorials(): Response
    {
        return $this->render('tutorials.html.twig');
    }

    /**
     * @Route("/funnyStuff", name="funny")
     */
    public function funny(): Response
    {
        return $this->render('funny.html.twig');
    }
}
