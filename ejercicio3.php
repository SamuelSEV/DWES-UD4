<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejecicio 3</title>
</head>
<body>
    <?php
        $informacion = simplexml_load_file("datos.xml");
        printf ("Informacion libro 2: <br> AUTOR: %s <br> TITULO: %s <br> GENERO: %s <br> PRECIO: %s <br> PUBLICACION: %s <br> DESCRIPCION: %s <br> " , $informacion->book[1]->author, $informacion->book[1]->title, $informacion->book[1]->genre, $informacion->book[1]->price, $informacion->book[1]->publish_date, $informacion->book[1]->description);
        foreach($informacion as $book=>$valor){
            printf ("Informacion libro 2: <br> AUTOR: %s <br> TITULO: %s <br> GENERO: %s <br> PRECIO: %s <br> PUBLICACION: %s <br> DESCRIPCION: %s <br> " , $informacion->book[$book]->author, $informacion->book[$book]->title, $informacion->book[$book]->genre, $informacion->book[$book]->price, $informacion->book[$book]->publish_date, $informacion->book[$book]->description);
        }
            

    ?>
</body>
</html>