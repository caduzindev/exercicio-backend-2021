<?php
namespace Drupal\textwrap\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class TextWrapForm extends FormBase{
    /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'texwrap_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $messenger = \Drupal::messenger();

    $messenger->addMessage($form_state->getValue('text'));
  }
}