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
  
		$("#answerLink").click(function(){
    	for (i = 0; i < 10; i++){
        $("#searchData").val("Test1");
      	$("#searchBtn").click();
      }
    });
});
