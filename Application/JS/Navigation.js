//Displays content based on link clicked
function setContent(clickedLink) {
    $("a").removeClass("active");

    $(".splittestContent").hide();
    $(".formContent").hide();

    switch(clickedLink){
        case "Home":
            $("#homeLink").addClass("active");
            document.getElementById("title").innerHTML="Home";
            break;
        case "AnswerTest":
            $("#answerLink").addClass("active");
            $(".splittestContent").show();
            document.getElementById("title").innerHTML="Design comparison";
            break;
        case "AddTest":
            $("#addLink").addClass("active");
            $(".formContent").show();
            document.getElementById("title").innerHTML="Add images for new tests";
            break;
        case "ViewResult":
            $("#resultLink").addClass("active");
            document.getElementById("title").innerHTML="View test results";
            break;
        default: 
            break;
    }
}

function preview_image(event, id) 
{
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