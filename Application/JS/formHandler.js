$(document).ready(function(){
    //Search form for finding tests
    $("#searchBtn").click(function(){
        $.ajax({
            type: 'POST',
            url: "./PHP/searchTest.php",
            cache: false,
            data: {
                value: $("#searchData").val()
            },
            success: function(data){
                //Returns images based on search result
                var img1 = document.getElementById("img1");
                var img2 = document.getElementById("img2");
                img1.src = data[0];
                img2.src = data[1];
            },
            dataType: "json",
            error: function(){
                console.log("Error");
            }
        });
    });

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
            dataType: 'json',
            success: function(data){
                alert(data['output']);

                //Reset form if submit was successful
                if(data['success'] == true){
                    $("#addTestForm")[0].reset();
                    $("#output_image1").removeAttr('src');
                    $("#output_image2").removeAttr('src');
                }
            },
            error: function(){
                console.log("Error while sending AJAX data");
            }
        });
    });
});

//Preview image when inserting tests
function preview_image(event, id) {
        var reader = new FileReader();
        reader.onload = function()
        {
            if(id==1){
                var output = document.getElementById('output_image1');
            }
            else{
                var output = document.getElementById('output_image2');
            }
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
