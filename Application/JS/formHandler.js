$(document).ready(function(){
    //Hide image captions
    $(".captionRow").hide();
    
    //Add function that determines DB
    var DBtype = 'mySQL';

    $("#toggleDB").click(function(){
        var DBname;
        //Toggle active connection
        if(DBtype == 'mySQL'){
            DBtype = 'pgSQL';
            DBname = "PostgreSQL";
        }else{
            DBtype = 'mySQL';
            DBname = "MySQL";
        }
        alert("Database changed to " + DBname + "!");
        document.getElementById("pageFooter").innerHTML = "Database: " + DBname;
    });


    //Search form for finding tests
    $("#searchBtn").click(function(){

        //Benchmarking variable
        var startTime = (new Date).getTime();

        $.ajax({
            type: 'POST',
            url: "./PHP/searchTest.php",
            cache: false,
            data: {
                value: $("#searchData").val(),
                activeConnection: DBtype
            },
            success: function(data){
                //If search results were found
                if (data[0] !== undefined && data[1] !== undefined) {

                    //Returns images based on search result
                    $("#img1").attr("src", data[0]);
                    $("#cap1").html(data[1]);
                    //document.getElementById("cap1").innerHTML = data[1];
                    $("#img2").attr("src", data[2]);
                    $("#cap2").html(data[3]);
                    
                    $(".captionRow").show();

                    //Benchmarking result
                    var timeDiff = (new Date).getTime() - startTime;
                    sendBenchmark(timeDiff, DBtype);
                }
                else{
                    alert("No search results found!");
                }
            },
            dataType: "json",
            error: function(exception){
                console.log(exception.responseText);
            }
        });
        $("#searchData").val("");
    });

    //Send submitted form data with AJAX
    $("#addTestForm").submit(function (e){
        e.preventDefault();
        var formData = new FormData(this);
        //Add connection type
        formData.append('DBcon', DBtype);

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
            error: function(exception){
                console.log(exception.responseText);
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

//Send benchmark timers to DB
function sendBenchmark(responseTime, DBtype){
    $.ajax({
        type: 'POST',
        url: "./PHP/writeResponsetime.php",
        cache: false,
        data: {
            benchmark: responseTime,
            activeConnection: DBtype
        },
        success: function(data){
            console.log("Timer saved: " + data + "ms");
        },
        error: function(exception){
            console.log(exception.responseText);
        }
    });
}
