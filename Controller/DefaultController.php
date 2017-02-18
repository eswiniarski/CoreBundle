<?php

namespace ES\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    /**
     * @Route("/", name="default_home")
     */
    public function indexAction() {
        return $this->render('ESCoreBundle:Site:index.html.twig');
    }
}
