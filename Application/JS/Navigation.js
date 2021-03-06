//Displays content based on link clicked
function setContent(clickedLink) {
    //Hide contents
    $("a").removeClass("active");
    $(".indexContent").hide();
    $(".splittestContent").hide();
    $(".formContent").hide();

    //Display correct content based on active link
    switch(clickedLink){
        case "Home":
            $("#homeLink").addClass("active");
            $(".indexContent").show();
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