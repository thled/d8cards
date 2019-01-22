<?php

namespace Drupal\queue_reg_mail\Plugin\QueueWorker;

use Drupal\user\Entity\User;
use Drupal\Core\Mail\MailManager;
use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @QueueWorker(
 *   id = "cron_welcome_mail",
 *   title = @Translation("Cron welcome mail sender"),
 *   cron = {"time" = 10}
 * )
 */
class WelcomeMailSender extends QueueWorkerBase implements
  ContainerFactoryPluginInterface
{
  /** @var MailManager $mailManager */
  private $mailManager;

  /** @var EntityTypeManager $entityTypeManager */
  private $entityTypeManager;

  public function __construct(
    MailManager $mailManager,
    EntityTypeManager $entityTypeManager
  ) {
    $this->mailManager = $mailManager;
    $this->entityTypeManager = $entityTypeManager;
  }

  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    $mailManager = \Drupal::service('plugin.manager.mail');
    $entityTypeManager = \Drupal::service('entity_type.manager');
    return new static($mailManager, $entityTypeManager);
  }

  public function processItem($userId)
  {
    /** @var User $user */
    $user = $this->entityTypeManager->getStorage('user')->load($userId);

    $mail = $this->mailManager->mail(
      'queue_reg_mail',
      'welcome_mail',
      $user->getEmail(),
      $user->getPreferredLangcode(),
      ['message' => 'Welcome to D8C, user ' . $user->getAccountName()],
      null,
      true
    );

    $logger = \Drupal::logger('queue_reg_mail');
    if ($mail['result'] !== true) {
      $logger->error('There was a problem sending the mail.');
    }
    else {
      $logger->info('The mail has been sent.');
    }
  }
}
