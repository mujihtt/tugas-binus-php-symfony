<?php

// Path: src/Controller/LoginController.php
namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class LoginController extends AbstractController
{
    public function loginForm(Request $request): Response
    {
      $session = $request->getSession();
      $is_logged_in = $session->get('is_logged_in');

      if($is_logged_in) {
        return $this->redirectToRoute('index');
      }else{
        return $this->render('login-form.html.twig', [
          'page_title' => 'Login Form', 
          'nama' => $session->get('nama'),
          'error' => $request->query->get('error')
        ]);
      }
    }

    public function loginAction(Request $request, ManagerRegistry $doctrine): Response
    {

      $email = $request->request->get('email');
      $password = $request->request->get('password');

      if(isset($email) && isset($password)) {
        // get data from database
        // if email and password match, then redirect to index
        // else redirect to login with error message

        $user = $doctrine->getRepository(User::class)->findOneBy(['email' => $email, 'password' => $password]);
        

        if(!$user) {
          return $this->redirectToRoute('login', ['error' => 'Email dan Password tidak cocok']);
        }else{
          $role = $doctrine->getRepository(Role::class)->findOneBy(['id' => $user->getRoleId()]);
          $session = new Session();
          $session->start();
          $session->set("is_logged_in", true);
          $session->set("email", $email);
          $session->set("nama", $user->getNama());
          $session->set("alamat", $user->getAlamat());
          $session->set("telepon", $user->getTelepon());
          $session->set("tanggal_rekrut", $user->getTanggalRekrut());
          $session->set("gaji", $user->getGaji());
          $session->set("departemen_id", $user->getDepartemenId());
          $session->set("role_id", $user->getRoleId());
          $session->set("role", $role->getNama());
          
          return $this->redirectToRoute('index');
        }

      }else{
        return $this->redirectToRoute('login', ['error' => 'Email dan Password harus diisi']);
      }

      
    }

    public function logout(Request $request)
    {
      $session = $request->getSession();
      $session->clear();

      return $this->redirectToRoute('index');
    }
}