<?= $this->Html->script('https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js', ['block' => 'ckeditor'])?>

<?= $this->Html->scriptBlock("
    ClassicEditor
        .create( document.querySelector( '#editor-um' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor-dois' ) )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
        .create( document.querySelector( '#editor-tres' ) )
        .catch( error => {
            console.error( error );
        } );
", ['block' => 'ckeditor']) ?>