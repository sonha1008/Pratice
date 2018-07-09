define([
    "jquery",
    "jquery/ui"
], function($){
    "use strict";

    function main(config, element) {
        var $element = $(element);
        var AjaxCommentPostUrl = config.AjaxCommentPostUrl;

        var dataForm = $('#comment-form');
        dataForm.mage('validation', {});

        $(document).on('click', '#submit', function() {
            if(dataForm.valid()) {
                event.preventDefault();
                var param = dataForm.serialize();
                $.ajax({
                    showLoader: true,
                    url: AjaxCommentPostUrl,
                    data: param,
                    type: "POST"
                }).done(function(data) {
                    if(data.result == "success"){
                        document.getElementById('comment-form').reset();
                        $('.note').html(data.message);
                        $('.note').css('color', 'green');
                       
                    }  else {
                         $('.note').css('color', 'red');
                        $('.note').html(data.message);
                        return false;
                    }             
                    
                });
            }
        });
    };
    return main;
});