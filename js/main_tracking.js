/**
 * Created by margaretmeehan on 11/17/15.
 */

$(document).ready(function() {
//grab whether system is ON/OFF from POST request
var status = "on";
    if (status == "on") {
        $(function() {
            $('#main_switch').bootstrapToggle('on')
        });
    }
    else {
        $(function() {
            $('#main_switch').bootstrapToggle('off')
        });
    }


$(function() {
    $('#main_switch').change(function() {
         $('#console-event').html('System has been turned ' + $(this).prop('checked'))
        //POST REQUEST TO THE SERVER !!!!
    });
});

});


//http://www.bootstraptoggle.com/