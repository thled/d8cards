<?php

namespace Drupal\queue_reg_mail\Plugin\QueueWorker;

use Drupal\Core\Queue\QueueWorkerBase;
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
  public function __construct()
  {
  }

  /**
   * {@inheritdoc}
   */
  public static function create(
    ContainerInterface $container,
    array $configuration,
    $plugin_id,
    $plugin_definition
  ) {
    return new static();
  }

  public function processItem($data)
  {
    $uid = $data->uid;
    \Drupal::logger('queue_reg_mail')->notice('Mail send to user with id: ' . $uid);
  }
}
