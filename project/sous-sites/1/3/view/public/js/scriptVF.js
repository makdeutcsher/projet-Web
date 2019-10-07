$(document).ready(function () {
    var seconds = 5;
    setInterval(function () {
         console.log("hhhh");
        $.post(
            'http://localhost/TDW/TP_VF/controller/update.php',
            {},
            function (data, status) {
               // console.log("hhhh")
                 alert("page actualisée chaque 5 secondes ;)");
                $('#my-tab-index').html(data);
                
            },
            'html'
        );
        // alert("les prix est à jour");

    }, seconds * 1000000000);


    $('#ajouter').click(function(e){
       // console.log("1")

        $.post("ajouter.php",
    {
        vh : $('#vh').val(),
        prix : $('#prix').val(),
        taxe : $('#taxe').val(),
        name : $('#name').val(),
        type : $('[name="type"]').val()

    },
    function(data, status){
        if(status=="success"){0
            $TTC = parseInt($('#prix').val())*parseInt($('#taxe').val())/100 + parseInt($('#prix').val());
    
    
        $rowCount = $('#my_table td').length;
            $tr = '<tr >' +
                '<th scope="row">' + $('#name').val() + '</th>' +
                '<td >' + $('#vh').val() + '</td>' +
                '<td class=' + $rowCount + '>' + $('#prix').val() + '</td>' +
                '<td class=' + $rowCount + '>' + $('#taxe').val() + '</td>' +
                '<td class=' + $rowCount + '>' + $TTC + '</td>' +
                '<td class=' + $rowCount + '><button type="Submit" id="supprimer" class ="delebtn" value="Supprimer" onclick=\'Supprimer(<?= $i ?>)\'>Supprimer</button></td>' +
                '<td class=' + $rowCount + '><button type="Submit" id="modifier" class ="updbtn" value="modifier" onclick=\'Modifier(<?= $i ?>)\'>Modifier</button></td>' +
                '</tr>';
        
            $('#my_table').append($tr); 
            location.reload();    

        }
        alert("Data: " + data + "\nStatus: " + status);
        location.reload(); 
        
    });

        e.preventDefault();
        e.stopPropagation();
    });


    //formation 
    $('.formation_input').hide()
    $('.btn-modifier').click(function(e){
        var idd = $(this).attr('data-id');
        console.log($(this).attr('data-id'));
        
        if( $(this).attr('data-is_edit') == 1 ){
            $(this).text('Envoyer')
            $('.hiden_input_'+idd).show();
            $('.text_'+idd).hide();
            $(this).attr('data-is_edit',"0")
        }else{

            
            $.post("modifier.php",
              {

                idd_:idd,
                //nom_:nom,
                vh_: $('#vh_'+idd).val(),
                prix_:$('#prix_'+idd).val(),
                taxe_:$('#taxe_'+idd).val()
      
             },
           function(data, status){
             if(status=="success"){
       
                location.reload();
             }
          alert("Data: " + data + "\nStatus: " + status);
    
          });
    
            console.log("sending")

        }
       
    })

});
 
function Supprimer(id) {
   
    $_idd=id;
    //console.log($_idd);
    
    $.post("supprimer.php",
    {
    idd : $_idd  
         
    
    },
    function(data, status){
    if(status=="success"){
       
       location.reload();
    }
    alert("Data: " + data + "\nStatus: " + status);
    
    });
    
    }


  //  function Modifier(vh,prix,taxe,nom,dd) {
   
//         $form="<div id=\"form\" align=\"center\">"+
//         "<form action=\"modifier.php\" method=\"post\" id=\"my_form\">"
//               "<h3>Modifier une formation </h3> "+ 
//               "<select name='type'>"+
//               "<option value='1'>Bereautique</option>"+
//               "<option value='2'>Management</option>"+
//               "<option value='3'>Langues</option>"+
//               "<option value='4'>Compabilite</option>"+
//               "<option value='5'>Infograpgie</option>"+
//               "</option>"+
//               "<label>Nom de la formation:</label></br></br>"+
//                "<input id=\"name\" type=\"text\" name=\"name\" value="+vh+" /></br></br>"+
//                "<label>Volume horaire:</label></br></br>"+
//                "<input id=\"vh\" type=\"text\" name=\"vh\" value="+prix+" /></br></br>"+
//                "<label>Prix HT</label>:</br></br>"+
//               "<input id=\"prix\" type=\"text\" name=\"prix\" value="+taxe+" /></br></br>"+
//               "<label>Taxe</label>:</br></br>"+
//               "<input id=\"taxe\" type=\"text\" name=\"taxe\" value="+nom+"/></br></br>"+
    
//     "<input id=\"ajouter\" type=\"Submit\" value=\"ajouter\" name=\"ajouter\""+
//      "></input>"+
    

// "</form>"+
// "</div>";
        
        
    //     $.post("modifier.php",
    //     {
    //         vh_ : vh,
    //         prix_ : prix,
    //         taxe_ : taxe,
    //         name_ : nom,
    //         type_ : dd
    
             
        
    //     },
    //     function(data, status){
    //     if(status=="success"){
           
    //        location.reload();
    //     }
    //     alert("Data: " + data + "\nStatus: " + status);
        
    //     });
        
    //     }
    















