ClassicEditor
.create( document.querySelector( '.cnt' ) )
.catch( error => {
    console.error( error );
});

$(document).ready(function(){
    $('#selectAllBoxes').click(function(event){
    if(this.checked){
        $('.checkBoxes').each(function(){
            this.checked = true;
        });
    } else {
        $('.checkBoxes').each(function(){
            this.checked = false;
        });

    }
});
});
