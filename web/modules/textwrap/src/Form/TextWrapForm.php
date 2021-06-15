<?php
namespace Drupal\textwrap\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\textwrap\TextWrap;

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
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if(intval($form_state)<=0){
      $form_state->setErrorByName('number','Campo com tamanho invalido');
    }
  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    $text = $form_state->getValue('text');
    $numberOfLines = intval($form_state->getValue('number'));
    $textwrap = new TextWrap();
    $textBroken = $textwrap->wrap($text,$numberOfLines);

    \Drupal::database()
      ->insert('texts')
      ->fields([
        'text'=>$text,
        'brokenText'=>implode('&',$textBroken)
      ])
      ->execute();
    
    $this->messenger()->addStatus($this->t('Seu texto fica assim =><br/> '.implode('<br/>',$textBroken)));
  }
}