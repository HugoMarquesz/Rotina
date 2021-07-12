<?php

require __DIR__.'/vendor/autoload.php';

define('TITLE','Cadastrar atividade');

use \App\Entity\Atividade;
$obAtividade = new Atividade;

//VALIDA O POST
if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){

  $obAtividade->titulo    = $_POST['titulo'];
  $obAtividade->descricao = $_POST['descricao'];
  $obAtividade->ativo     = $_POST['ativo'];
  $obAtividade->cadastrar();

  header('location: index.php?status=success');
  exit;
}

include __DIR__.'/includes/header.php';
include __DIR__.'/includes/formulario.php';
include __DIR__.'/includes/footer.php';