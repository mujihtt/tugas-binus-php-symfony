<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class IndexController extends AbstractController
{
    public function index(Request $request): Response
    {
      $session = $request->getSession();

      return $this->render('index.html.twig', 
        [
          'page_title' => 'Home', 
          'is_logged_in' => $session->get('is_logged_in'),
          'nama' => $session->get('nama'),
          'email'=> $session->get('email'),
          'role' => $session->get('role'),
        ]);
    }

}