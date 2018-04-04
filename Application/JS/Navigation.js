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
    }
}