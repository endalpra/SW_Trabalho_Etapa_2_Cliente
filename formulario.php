<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="RestCliente.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    </head>
    <body>
        <form name="form" method="POST" action="index.php">
            Título<input type="time" name="titulo" required="">
            Editora<input type="text" name="editora" required="">
            Quantidade de páginas<input type="text" name="qtd_pag" required="">
            <input type="hidden" name="id" value="<?phpif(isset($_GET['id'])){echo$_GET['id'];}else{echo"";};?>">
            <button type="submit">Gravar</button>        
        </form>
       
    </body>
</html>
