
var formations1 = null;
var formations2 = null;

var first_load = true;


$("button#btn-comparer").on("click", function (e) {
    console.log($(this));

    var eco1 = $("select#ecole1").val();
    var eco2 = $("select#ecole2").val();
    var cat = $("select#type").val();


    $.ajax({
        dataType: "json",
        url: "../../controller/comparer.php?par1=" + eco1 + "&par2=" + eco2 + "&par3=" + cat,
        success: function (data) {
            console.log(data[0]['ID']);
            formations1 = data.filter(function (el) {
                return el.id_ecole == eco1;
            });



            formations2 = data.filter(function (el) {
                return el.id_ecole == eco2;
            });

            formations1.forEach(function (ele) {
                console.log(ele);
                $("select#form1").append('<option value="' + ele['IDD'] + '">' + ele['Nom'] + '</option>');
                $("table tr:nth-child(2)").find('td:nth-child(2)').text(ele['Volume_horaire']); 
                $("table tr:nth-child(3)").find('td:nth-child(2)').text(ele['Prix']);});

            formations2.forEach(function (ele) {
                console.log(ele);
                $("select#form2").append('<option value="' + ele['IDD'] + '">' + ele['Nom'] + '</option>');
                $("table tr:nth-child(2)").find('td:nth-child(3)').text(ele['Volume_horaire']);
                $("table tr:nth-child(3)").find('td:nth-child(3)').text(ele['Prix']);});



            $("table").css('display', 'inline-table');
            first_load = false;

        },
        fail: function (data, status) {
            console.log('error');

        }
        
    });

    /* $.getJSON("../../controller/comparer.php?par1=" + eco1 + "&par2=" + eco2 +"&par3=" + cat ,
         function (data, status) {
             console.log(data);
     
             if (status == "success") {
                console.log(data);
             }else{
                 console.log('error');
             }
             //alert("Data: " + data + "\nStatus: " + status);
 
         });*/


});



$("select#form1").on('change', function (e) {

    if (!first_load) {
        select_ = $(this);

        const form = formations1.filter(function (el) {
            return el.IDD == select_.val();
        });

        console.log(form[0]['Volume_horaire']);

        $("table tr:nth-child(2)").find('td:nth-child(2)').text(form[0]['Volume_horaire']);
        $("table tr:nth-child(3)").find('td:nth-child(2)').text(form[0]['Prix']);

    }



})


$("select#form2").on('change', function (e) {

    if (!first_load) {

        select_ = $(this);

        const form = formations2.filter(function (el) {
            return el.IDD == select_.val();
        });

        console.log(form);

        $("table tr:nth-child(2)").find('td:nth-child(3)').text(form[0]['Volume_horaire']);
        $("table tr:nth-child(3)").find('td:nth-child(3)').text(form[0]['Prix']);
    }

})

