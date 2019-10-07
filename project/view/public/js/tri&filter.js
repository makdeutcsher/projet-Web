console.log($("button#btn-tri"));

$("#tri-btn").on("click", function (e) {

    var crit = $(this).prev().prev().val();
    var ordre = $(this).prev().val();
    var id = $("td").first().attr("id");



    console.log($("td").first().id);



    $.getJSON("../../controller/afficher-tri.php?par=" + crit + "&ordre=" + ordre + "&id_cat=" + id,
        function (data, status) {
            console.log(data);
            if (status == "success") {
                $('table#univ-table tbody').empty();
                $.each(data, function (index, $formation_t) {
                    $('table#univ-table tbody').append(
                        " <tr>" +
                        "<th  id=" + $formation_t['id'] + "scope='row'><a class='lien' href='./../sous-sites/univ/index.php'>" + $formation_t['nom'] + "</a></th>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['domaine'] + "</td>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['wilaya'] + "</td>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['commune'] + "</td>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['adresse'] + "</td>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['tel'] + "</td>" +
                        "<td id=" + $formation_t['id'] + ">" + $formation_t['fax'] + "</td>" +
                        "<td >Universitaires</td>" +
                        "</tr>"
                    )
                });
            }
            //alert("Data: " + data + "\nStatus: " + status);

        });


});


$("#filtre-btn").on("click", function (e) {

    var mot = $(this).prev().val();
    var id = $("td").first().attr("id");

    console.log(mot + ' ' + id);



    $.getJSON("../../controller/afficher-filtre.php?like=" + mot + "&id_cat=" + id,
        function (data, status) {
            console.log(data);
            if (status == "success") {
                $('table#univ-table tbody').empty();

                if (data.length > 0) {
                    $.each(data, function (index, $formation_t) {
                        console.log($formation_t.length);


                        $('table#univ-table tbody').append(
                            " <tr>" +
                            "<th  id=" + $formation_t['id'] + "scope='row'><a class='lien' href='./../sous-sites/univ/index.php'>" + $formation_t['nom'] + "</a></th>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['domaine'] + "</td>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['wilaya'] + "</td>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['commune'] + "</td>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['adresse'] + "</td>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['tel'] + "</td>" +
                            "<td id=" + $formation_t['id'] + ">" + $formation_t['fax'] + "</td>" +
                            "<td >Universitaires</td>" +
                            "</tr>"
                        )

                    });
                } else {

                    $('table#univ-table tbody').append(
                        " <tr>" +
                        "<th colspan=\"8\" >no result</th>" +
                        "</tr>"
                    )

                }
            }
            //alert("Data: " + data + "\nStatus: " + status);

        });


});