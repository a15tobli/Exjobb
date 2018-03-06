//Displays content based on link clicked
function setContent(clickedLink) {
    $("a").removeClass("active");
    
    switch(clickedLink){
        case "Home":
            $("#homeLink").addClass("active");
            break;
        case "AnswerTest":
            $("#answerLink").addClass("active");
            break;
        case "AddTest":
            $("#addLink").addClass("active");
            break;
        case "ViewResult":
            $("#resultLink").addClass("active");
            break;
        default: 
            break;
    }
}