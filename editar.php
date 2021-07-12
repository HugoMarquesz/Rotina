<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Editar atividade');

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
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obAtividade->titulo    = $_POST['titulo'];
  $obAtividade->descricao = $_POST['descricao'];
  $obAtividade->ativo     = $_POST['ativo'];
  $obAtividade->atualizar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';