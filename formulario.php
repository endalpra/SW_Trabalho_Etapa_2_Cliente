<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title></head>
    <body>
        <?php
        //Se possui id na url então é uma edição.. Recupera os campos e insere no formulário 
            if(isset($_GET['id'])){
                $titulo = $_GET['t'];
                $editora = $_GET['e'];
                $qtd_pag = $_GET['q'];
            }
        ?>
        <h2>Edição de livros</h2>
        <form name="form" method="POST" action="index.php">
            Título<input type="time" name="titulo" value="<?= @$titulo ?>" required=""></br>
            Editora<input type="text" name="editora" value="<?= @$editora ?>" required=""></br>
            Quantidade de páginas<input type="text" name="qtd_pag" value="<?= @$qtd_pag ?>" required=""></br>
            <input type="hidden" name="id" value="<?php if(isset($_GET['id'])){echo$_GET['id'];}else{echo 0;}?>">
            <button type="submit">Gravar</button>        
        </form>       
    </body>
</html>
