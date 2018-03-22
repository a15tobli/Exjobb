$(document).ready(function(){

    //Send submitted form data with AJAX
    $("#addTestForm").submit(function (e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: "./PHP/insertTest.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data){
                alert(data);
                console.log(data[1]);
                //$("#addTestForm")[0].reset();
            },
            error: function(){
                console.log("Error while sending AJAX data");
            }
        });
    });
});
