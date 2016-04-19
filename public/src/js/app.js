var postId=0;
//permet de lancer la modale pour l'edit
$('.post').find('.interaction').find('.editer').on('click',function(event){
    event.preventDefault();
    var postTexte=event.target.parentNode.parentNode.childNodes[1].textContent;
     postId=event.target.parentNode.parentNode.dataset['postid'];

$('#texte').val(postTexte)

});

$('#enregister').on('click',function(){
    $.ajax({
        method:'POST',
        url:url,
        data:{texte: $('#texte').val(),postID:postId,_token:token }
    })
        .done(function(msg){
            console.log(msg['message'])
        })
});