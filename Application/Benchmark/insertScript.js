/* Search script used generating data */

// ==UserScript==
// @name     Exjobb InsertScript
// @version  1
// @grant    all
// @include http://localhost/exjobb/Application/*
// @require http://code.jquery.com/jquery-2.1.0.min.js
// ==/UserScript==

$(document).ready(function(){
    
  	var ID  = 35;
    var name = 0; 

    console.log("InsertScript successfully loaded");

    $("#addLink").click(function(){
      ID++;  
      name++;
      addData(ID, name);
    });
});

function addData(counter, name){
  console.log(counter);
  $("#testName").val("H" + name);
  $("#caption1").val("First file. (HTML)  TestID " + counter);
  $("#caption2").val("Second file. (HTML) TestID " + counter);
}