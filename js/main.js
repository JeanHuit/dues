$(document).ready(function(){

   $('.update_btn').attr('disabled',true);
    $('.disabled_check input').keyup(function(){
        if($(this).val().length !=0)
            $('.update_btn').attr('disabled', false);
        else
            $('.update_btn').attr('disabled',true);
    });
});
