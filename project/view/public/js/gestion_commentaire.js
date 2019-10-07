


function Supprimer_commentaire(id) {

    $_idd = id;
    console.log($_idd);

    $.post("../../controller/supprimer-commentaire.php ",
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
