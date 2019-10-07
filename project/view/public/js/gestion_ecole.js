

function Supprimer(id) {

    $_idd = id;
    console.log($_idd);

    $.post("../../controller/supprimer.php ",
        {
            idd: $_idd


        },
        function (data, status) {
            if (status == "success") {

                location.reload();
            }
            alert("Data: " + data + "\nStatus: " + status);

        });

}





//formation 
$('.formation_input').hide()
$('.btn-modifier').click(function (e) {
    var idd = $(this).attr('data-id');
    var idd_cat = $(this).attr('data-id-cat');

    console.log($(this).attr('data-id'));
    console.log($(this).attr('data-id-cat'));

    if ($(this).attr('data-is_edit') == 1) {
        $(this).text('Envoyer')
        $('.hiden_input_' + idd).show();
        $('.text_' + idd).hide();
        $(this).attr('data-is_edit', "0")
    } else {


        $.post("../../controller/modifier.php",
            {
                

                idd_: idd,
                id_categorie_:idd_cat,
                nom_:$('#nom_' + idd).text(),
                domaine_: $('#domaine_' + idd).val(),
                wilaya_: $('#wilaya_' + idd).val(),
                commune_: $('#commune_' + idd).val(),
                adresse_: $('#adresse_' + idd).val(),
                tel_: $('#tel_' + idd).val(),
                fax_: $('#fax_' + idd).val(),
                

            },
            function (data, status) {
                if (status == "success") {

                    location.reload();
                }
                alert("Data: " + data + "\nStatus: " + status);

            });

        console.log("sending")

    }

})






$('#ajouter').click(function(e){
    // console.log("1")

     $.post("../../controller/ajouter.php",
 {
    
    nom:$('#name').val(),
    domaine: $('#domaine').val(),
    wilaya: $('#wilaya').val(),
    commune: $('#commune').val(),
    adresse: $('#adresse').val(),
    tel: $('#tel').val(),
    fax: $('#fax').val(),
    categorie: $('#id_categorie').val(),

 },
 function(data, status){
     if(status=="success"){0
         
 
 
     $rowCount = $('#univ-table td').length;
         $tr = '<tr >' +
             '<th scope="row">' + $('#name').val() + '</th>' +
             '<td >' + $('#domaine').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#wilaya').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#commune').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#adresse').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#tel').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#faxe').val() + '</td>' +
             '<td class=' + $rowCount + '>' + $('#id_categorie').val() + '</td>' +
             '<td class=' + $rowCount + '><button type="Submit" id="supprimer" class ="delebtn" value="Supprimer" onclick=\'Supprimer(<?= $i ?>)\'>Supprimer</button></td>' +
             '<td class=' + $rowCount + '><button type="Submit" id="modifier" class ="updbtn" value="modifier" onclick=\'Modifier(<?= $i ?>)\'>Modifier</button></td>' +
             '</tr>';
     
         $('#univ-table').append($tr); 
         location.reload();    

     }
     alert("Data: " + data + "\nStatus: " + status);
     location.reload(); 
     
 });

     e.preventDefault();
     e.stopPropagation();
 });


 

function mise_ligne(id,actif) {

    $_idd = id;
    btn='btn_'.$_idd
    $_actif = actif;
    console.log($_idd);

    $.post("../../controller/mettre-ligne.php ",
        {
            idd_: $_idd,
            actif_:$_actif


        },
        function (data, status) {
            if (status == "success") {

                location.reload();
            }
            alert("Data: " + data + "\nStatus: " + status);
            $("#btn").style.backgroundColor = "#5cf9a5";

        });

}



