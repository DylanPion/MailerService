<?php

namespace Container1vgQWlp;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getMailerControllersendEmailService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator..V3RrT8.App\Controller\MailerController::sendEmail()' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator..V3RrT8.App\\Controller\\MailerController::sendEmail()'] = (new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService ??= $container->getService(...), [
            'mailer' => ['privates', 'mailer.mailer', 'getMailer_MailerService', true],
        ], [
            'mailer' => '?',
        ]))->withContext('App\\Controller\\MailerController::sendEmail()', $container);
    }
}
