$(document).ready(function() {
    $("#nama, #email, #no_hp, #semester").change(function() {
        var ipk = Number($("#ipk").val());
        if (ipk >= 3) {
            $("#beasiswa, #berkas, #submit").removeAttr("disabled");
        }
    })
});