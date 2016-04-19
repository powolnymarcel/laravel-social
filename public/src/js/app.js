var postId=0;
var postBodyElement= null;


//permet de lancer la modale pour l'edit
$('.post').find('.interaction').find('.editer').on('click',function(event){
    event.preventDefault();
     postBodyElement= event.target.parentNode.parentNode.childNodes[1];

    var postTexte=postBodyElement.textContent;
     postId=event.target.parentNode.parentNode.dataset['postid'];

$('#texte').val(postTexte)

});

$('#enregister').on('click',function(){
    $.ajax({
        method:'POST',
        url:url,
        data:{texte: $('#texte').val(),postId:postId,_token:token }
    })
        .done(function(msg){
            $(postBodyElement).text(msg['nouveau_texte'])
            $('#modal-edit').modal('hide')

        })
});