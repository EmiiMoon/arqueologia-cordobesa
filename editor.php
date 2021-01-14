<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>CKEditor</title>
    <meta charset="utf-8">
    <!-- Include CKEditor library -->
    <script src="https://cdn.ckeditor.com/ckeditor5/24.0.0/classic/ckeditor.js"></script>

    <style>
    .jeje {
        text-align: center;
        width: 50%;
    }

    .ck-editor__editable {
       min-height: 400px;
    }
    </style>
</head>
<body>
<form method="post" action="">
    <div class="jeje">
    <textarea name="editor" id="editor" rows="10" cols="10" name="editor">
        This is my textarea to be replaced with CKEditor.
    </textarea>
    </div>

    <div class="campo">
        <input type="submit" value="Aceptar" class="boton boton--primario">
        <a href=index.php class="boton boton--secundario">Cancelar</a>
    </div>
</form>

<?php 
    echo "hoooo";
    echo $_POST["editor"];
?>
    <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ]
        } )
        .catch( error => {
            console.error( error );
        } );
</script>


</body>
</html>