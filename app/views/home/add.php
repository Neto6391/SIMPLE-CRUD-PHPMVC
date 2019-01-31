<!DOCTYPE html>
<html lang="en">
  <?php require_once(PROJECTPATH.'/views/layout/header.php')  ?>
<body>
  <div class="container mt-4">
      <div class="row justify-content-center">
        <div class="col-4">
          <h2 class="display-4">Adicionar Livro</h2>
        </div>
      </div>
      <br /><br />
      <div class="row ">
        <a href="?controller=ListController&method=index">
          <button type="button" class="btn btn-primary mb-4">Voltar</button>
        </a>
        <div class="card mt-5 ml-5">
          <div class="card-body pl-5 pr-5">
          
            <form method="post" action="?controller=RegisterController&method=registerBook" id="form">
              <div class="form-group">
                <label for="name">Nome do Livro</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Digite o nome do Livro">
              </div>
              <div class="form-group">
                <label for="author">Autor do Livro</label>
                <input type="text" name="author" class="form-control" id="author" placeholder="Digite o nome do Autor">
              </div>
              <div class="form-group">
                <label for="quantity-pages">quantidade de Paginas</label>
                <input type="number" name="quantity_pages" class="form-control" id="quantity-pages" placeholder="Digite a Quantidade de Paginas">
              </div>
              <div class="form-group">
                <label for="book_price">Preço do Livro</label>
                <input type="number" name="book_price" class="form-control" id="book_price" placeholder="Digite o Preço do Livro">
              </div>
              <div class="form-group">
                <label for="date">Data de Laçamento</label>
                <input type="date" name="date" class="form-control" id="date" placeholder="Digite a data de Laçamento do Livro">
              </div>
              
              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
          </div>
        </div>
      </div>
  </div>
  <?php require_once(PROJECTPATH.'/views/layout/script.php'); ?>
</body>
</html>
