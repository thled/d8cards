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
      'three_confs.answer_universe',
    ];
  }

  public function buildForm(array $form, FormStateInterface $form_state)
  {
    $form['#title'] = $this->t('Important Confs');
    $form['answer_universe'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Answer to everyting'),
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
      '#required' => true,
      '#weight' => 0,
      '#options' => $languages,
    ];
    $form['dark_mode'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Dark mode'),
      '#required' => true,
      '#weight' => 0,
      '#default_value' => 1,
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
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
  }

}
