<!DOCTYPE html>
<html lang="en">
  <?php require_once(PROJECTPATH.'/views/layout/header.php')  ?>
<body>
  <div class="container mt-4">
    <div class="row justify-content-center">
      <div class="col-4">
        <h1 class="display-4">CRUD MVC</h1>
      </div>
    </div>
    <br /><br />
    <div class="row">
    <a href="?controller=RegisterController&method=index"><button type="button" class="btn btn-primary mb-4">Adicionar</button></a>
      <table class="table table-bordered">
        <thead>
          <div class="row">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome do Livro</th>
              <th scope="col">Autor</th>
              <th scope="col">Quantidade de Páginas</th>
              <th scope="col">Preço</th>
              <th scope="col">Ativo?</th>
              <th scope="col">Data de Laçamento</th>
              <th scope="col">Ações</th>
            </tr>
            </div>
        </thead>
        <tbody>
          <?php 
            $r = new ListController();
            $r->createTable();
          ?>
        </tbody>
      </table>
    </div>
  </div>
  <?php require_once(PROJECTPATH.'/views/layout/script.php'); ?>
</body>
</html>