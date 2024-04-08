function sendEnquery(){
	$("#info-msg").html("Please wait..");
    $.ajax({
        type: 'post',
        url: 'customemails.php',
        data: $('form').serialize(),
        success: function (msg) {
            $("#info-msg").html(msg);
            $(".foreform")[0].reset();
        }
    });
    return false;
}