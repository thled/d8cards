<?php

namespace Drupal\three_confs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ConfigForm extends ConfigFormBase
{

  public function getFormId()
  {
    return 'three_confs_form';
  }

  protected function getEditableConfigNames()
  {
    return [
      'three_confs.important',
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $config = $this->config('three_confs.important');

    $form['#title'] = $this->t('Important Confs');
    $form['answer_universe'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Answer to everyting'),
      '#default_value' => $config->get('answer_universe') ?? '',
      '#required' => true,
      '#weight' => 0,
    ];
    $languages = [
      'php' => 'PHP',
      'java' => 'Javascript',
      'pro' => 'Prolog',
    ];
    $form['best_language'] = [
      '#type' => 'select',
      '#title' => $this->t('Best programming language'),
      '#default_value' => $config->get('best_language') ?? '',
      '#required' => true,
      '#weight' => 0,
      '#options' => $languages,
    ];
    $form['dark_mode'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Dark mode'),
      '#default_value' => $config->get('dark_mode') ?? 1,
      '#weight' => 0,
    ];
    $form['actions'] = ['#type' => 'actions'];
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save and continue'),
      '#weight' => 15,
      '#button_type' => 'primary',
    ];

    return $form;
  }

  public function validateForm(array &$form, FormStateInterface $form_state)
  {

  }

  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('three_confs.important')
      ->set('answer_universe', $form_state->getValue('answer_universe'))
      ->set('best_language', $form_state->getValue('best_language'))
      ->set('dark_mode', $form_state->getValue('dark_mode'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
