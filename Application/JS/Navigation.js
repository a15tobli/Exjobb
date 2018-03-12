//Displays content based on link clicked
function setContent(clickedLink) {
    $("a").removeClass("active");

    $(".splitTest").hide();

    switch(clickedLink){
        case "Home":
            $("#homeLink").addClass("active");
            document.getElementById("title").innerHTML="Home";
            $(".splitTest").hide();
            break;
        case "AnswerTest":
            $("#answerLink").addClass("active");
            document.getElementById("title").innerHTML="Design comparison";
            $(".splitTest").show();
            break;
        case "AddTest":
            $("#addLink").addClass("active");
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