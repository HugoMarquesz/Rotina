<?php

require __DIR__.'/vendor/autoload.php';

use \App\Entity\Atividade;

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
  header('location: index.php?status=error');
  exit;
}

//CONSULTA A ATIVIDADE
$obAtividade = Atividade::getAtividade($_GET['id']);

//VALIDAÇÃO DA ATIVIDADE
if(!$obAtividade instanceof Atividade){
  header('location: index.php?status=error');
  exit;
}

//VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

  $obAtividade->excluir();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/confirmar-exclusao.php';
include __DIR__.'/includes/footer.php';