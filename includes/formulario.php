<main>

<h2 class="mt-3 container"><?=TITLE?></h2>

<form class="container" method="post">

  <div class="form-group">
    <label>Atividade</label>
    <input type="text" class="form-control" name="titulo"value="<?=$obAtividade->titulo?>">
  </div>

  <div class="form-group">
    <label>Descrição</label>
    <textarea class="form-control" name="descricao" rows="5"><?=$obAtividade->descricao?></textarea>
  </div>

  <div class="form-group">
    <label>Status</label>

    <div>
        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="ativo" value="s" checked> Completo
          </label>
        </div>

        <div class="form-check form-check-inline">
          <label class="form-control">
            <input type="radio" name="ativo" value="n" <?=$obAtividade->ativo == 'n' ? 'checked' : ''?>> Incompleto
          </label>
        </div>
    </div>

  </div>

  <div class="form-group">
  <a href="index.php">
    <button class="btn btn-danger">Voltar</button>
  </a>
    <button type="submit" class="btn btn-success">Cadastrar</button>
  </div>


</form>

</main>