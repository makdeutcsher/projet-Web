
function SupprimerMembre(id){
    
    $_idd = id;
    console.log($_idd);

    $.post("../../controller/supprimer-membre.php ",
        {
            idd: $_idd


        },
        function (data, status) {
            if (status == "success") {

                location.reload();}
            
            alert("Data: " + data + "\nStatus: " + status);

        });
}

$('.select_input').hide()
$('.btn-modifier').click(function (e) {
    var idd = $(this).attr('data-id');
  

    console.log($(this).attr('data-id'));
 

    if ($(this).attr('data-is_edit') == 1) {
        $(this).text('Envoyer')
        $('.hiden_input_' + idd).show();
        $('.text_' + idd).hide();
        $(this).attr('data-is_edit', "0")
    } else {


        $.post("../../controller/modifier-membre.php",
            {
                

                idd_: idd,
                nom_:$('#user_name_' + idd).val(),
                acc: $("select#admin_"+idd).val()
                

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
