
ClassicEditor
        .create( document.querySelector( '#content' ) )
        .then( content => {
                console.log( content );
        } )
        .catch( error => {
                console.log( error );
        } );
