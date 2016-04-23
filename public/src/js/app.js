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
        url:urlEditer,
        data:{texte: $('#texte').val(),postId:postId,_token:token }
    })
        .done(function(msg){
            $(postBodyElement).text(msg['nouveau_texte'])
            $('#modal-edit').modal('hide')

        })
});

$('.like').on('click',function(e){
    postId=event.target.parentNode.parentNode.dataset['postid'];
    e.preventDefault();
            // Si la cible.elementPrecedentSimilaire
            //Si il y a un element précedent alors user a click sur Dislike
            //Si il y en a pas alors il a cliqué sur like
    var clickSurLike=e.target.previousElementSibling == null ;

    $.ajax({
        metho:'POST',
        url:urlLike,
        //Il y aura que une seule route avec param si c'est like ou dislike
        data:{
            clickSurLike:clickSurLike,postId:postId, token:token
        }

    }).done(function(){
        //Changer la page
    })

});