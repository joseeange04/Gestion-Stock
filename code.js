var administrator= document.getElementById('administartor');
var identication= document.getElementById('identify');
$(document).ready(function()
{
    $('.identify').hide();

    $('administrator').click(function(){
        $('identify').show();
    })

});

