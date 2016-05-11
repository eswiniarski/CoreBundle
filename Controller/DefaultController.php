<?php

namespace ES\CoreBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller {
    /**
     * @Route("/tmp", name="tmp")
     */
    public function tmpAction() {
        exit('tmp');
    }
}
