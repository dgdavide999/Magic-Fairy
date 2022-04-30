
function invita(Id,characterId){
    var nElem = Id.split("invitaButton");
    var chara = document.getElementById('nome'+nElem[1]).innerText;
    var play = document.getElementById('giocatore'+nElem[1]).innerText;
    var cId = characterId;

    $.post('php/invita.php',{character:chara,player:play,charaId:cId},
        function(data){
            $('#result').html(data);
        });
}
function banna(Id,characterId){
    var nElem = Id.split("invitaButton");
    var chara = document.getElementById('nome'+nElem[1]).innerText;
    var play = document.getElementById('giocatore'+nElem[1]).innerText;
    var cId = characterId;

    $.post('php/banna.php',{character:chara,player:play,charaId:cId},
        function(data){
            $('#result').html(data);
        });
}