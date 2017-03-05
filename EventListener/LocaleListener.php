<?php

namespace ES\CoreBundle\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Translation\TranslatorInterface;

class LocaleListener implements EventSubscriberInterface {
    protected $defaultLocale;
    protected $enabledLocales;
    protected $translator;

    public function __construct($defaultLocale, $enabledLocales, TranslatorInterface $translator) {
        $this->defaultLocale = $defaultLocale;
        $this->enabledLocales = $enabledLocales;
        $this->translator = $translator;
    }

    public function onKernelRequest(GetResponseEvent $event) {
        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        $locale = $request->attributes->get('_locale');

        if ($locale) {
            if (!in_array($locale, $this->$enabledLocales)) {
                $locale = $request->getSession()->get('_locale', $this->defaultLocale);
            }
        } else {
            $locale = $request->getSession()->get('_locale', $this->defaultLocale);
        }

        $request->getSession()->set('_locale', $locale);
        $request->setLocale($locale);
        $this->translator->setLocale($locale);
    }

    public static function getSubscribedEvents() {
        return [
            // must be registered after the default Locale listener
            KernelEvents::REQUEST => [['onKernelRequest', 15]],
        ];
    }
}