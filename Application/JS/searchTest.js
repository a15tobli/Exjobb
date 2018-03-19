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
                img1.src = "data:image/png;base64, " + data[0];
                img2.src = "data:image/png;base64, " + data[1];
            },
            dataType: "json",
            error: function(){
                console.log("Error");
            }
        });
    });
});
