<?php

namespace ES\CoreBundle\Controller;

//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CoreController extends Controller {
    /**
     * @Route("/", name="default_home")
     */
    public function indexAction(Request $request) {
        return $this->render('ESCoreBundle:Site:index.html.twig');
    }

    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     */
    public function changeLocaleAction(Request $request, $locale) {
        $enabledLocales = $this->container->getParameter('enabled.locales');

        if (!in_array($locale, $enabledLocales)) {
            $locale = $this->container->getParameter('locale');
        }

        $this->get('session')->set('_locale', $locale);
        $request->setLocale($locale);

        return $this->redirect($this->generateUrl('default_home'));
    }
}
