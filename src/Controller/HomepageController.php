<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin")
 */
class HomepageController extends AbstractController {

    /**
     * @Route("/" ,name="admin_homepage_index")
     */
    public function index() {
        return $this->render('admin/homepage/index.html.twig', [
            'mainNavAdmin' => true,
            'title' => 'Espace Admin']);
    }

}