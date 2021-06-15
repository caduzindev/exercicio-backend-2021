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
    $form['text'] = [
      '#type'=>'textfield',
      '#title'=>$this->t('Texto')
    ];

    $form['number'] = [
      '#type'=>'textfield',
      '#title'=>$this->t('Linhas Limite')
    ];

    $form['submit'] = [
      '#type'=>'submit',
      '#value'=>$this->t('Quebrar')
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {}

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->messenger()->addStatus($this->t($form_state->getValue('text')));
  }
}