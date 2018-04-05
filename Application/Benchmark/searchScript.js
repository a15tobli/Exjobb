/* Search script used for benchmarking with Tampermonkey */

// ==UserScript==
// @name     Exjobb SearchScript
// @version  1
// @grant    all
// @include http://localhost/exjobb/Application/*
// @require http://code.jquery.com/jquery-2.1.0.min.js
// ==/UserScript==
$(document).ready(function(){

    console.log("Script successfully loaded");

    //Initialize script by clicking on the link
    $("#answerLink").click(function(){
        var counter = 0;  
        fillForm(counter);
    });
});

function fillForm(counter){
    //Run 10 searches with 3 second intervals
    if(counter < 10){
        setTimeout(function(){
            counter++;
            console.log(counter);
            $("#searchData").val("Test1");
            $("#searchBtn").click();
            
            fillForm(counter);
        }, 3000);
    }
    else{
        console.log("Measurements are finished");
    }
}