//Displays content based on link clicked
function setContent(clickedLink) {
    switch(clickedLink){
        case "Home":
            alert("Show home page");
            break;
        case "AnswerTest":
            alert("Show tests");
            break;
        case "AddTest":
            alert("Add tests")
            break;
        case "ViewResult":
            alert("View result");
            break;
        default: 
            break;
    }
}