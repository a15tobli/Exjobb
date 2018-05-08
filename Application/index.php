<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!--External scripts-->
        <script src="./JS/jquery-3.3.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="./JS/navigation.js"></script>
        <script src="./JS/formHandler.js"></script>

        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Design application</title>

    </head>
    <body>
        <!--Navigation menu-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <button class="navbar-toggler btn btn-basic" type="button" data-toggle="collapse" data-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation" id="hamburgerBtn">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Collapsed navbar-->
            <div class="collapse navbar-collapse"  id="navContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" id="homeLink" href="#" onclick="setContent('Home');">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="answerLink" href="#" onclick="setContent('AnswerTest');">Answer test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="addLink" href="#" onclick="setContent('AddTest');">Add test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="resultLink" href="#" onclick="setContent('ViewResult');">View results</a>
                    </li>
                    <!--Database toggle-->
                    <li class="nav-item">
                        <a class="nav-link" id="toggleDB" href="#">Switch DB</a>
                    </li>
                </ul>
            </div>
        </nav>


        <!--Page content-->
        <div class="container-fluid">
            <div class="col-1"></div>
            <div class="col-10" id="content">
                <div class="row" id="titleBar"><span id="titleSpan"><h2 id="title">Home</h2></span></div>

                <!--Main page content, dynamic visibility-->
                <div class="row shadow2" id="content1">

                    <!--Index page (default view)-->
                    <div class="col-12 addedMargin indexContent" >
                        <p id="indexText">
                            This is an application used for measuring web designs with A/B-testing. 
                            The links in the left menu is used to navigate through the site.</p><br/>

                        <table id="indexTable">
                            <tr>
                                <th>Answer Test</th><td>View a split-test (A/B-test).</td>
                            </tr>
                            <tr>
                                <th>Add Test</th><td>Make a new entry to a database.</td>
                            </tr>
                            <tr>
                                <th>View Results</th><td>View the statistics from the split-tests.</td>
                            </tr>
                            <tr>
                                <th>Switch DB</th><td>Toggle the active database. (Displayed at the bottom)</td>
                            </tr>
                        </table>
                    </div>

                    <!--Design choice/Split-test (answer test)-->
                    <div class="col-12 splittestContent addedMargin">
                        <!-- Search form -->
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4">
                                <div class="input-group">
                                    <input placeholder="Enter test name" id="searchData" name="searchField" autocomplete="off"/>
                                    <span class="input-group-btn">
                                        <input class="btn btn-success" id="searchBtn" type="submit" name="searchTests" value="Search"/>
                                    </span>                     
                                </div>
                            </div>
                            <div class="col-4"></div>
                        </div>
                        <!--Test output-->
                        <div class="row">
                            <div class="col-5 imageContainer shadow2"><img alt="Design A" id="img1"/></div>
                            <div class="col-2"><p id="testing"></p></div>
                            <div class="col-5 imageContainer shadow2"><img src="viewData.php" alt="Design B" id="img2"/></div>
                        </div>
                        <div class="row captionRow">
                            <div class="col-5 whiteBG shadow2 caption" id="caption1Container">
                                <p id="cap1"></p>
                                <button id="btnA" class="btn btn-success designBtn">Design A</button>
                            </div>
                            <div class="col-2"></div>
                            <div class="col-5 whiteBG shadow2 caption" id="caption2Container">
                                <p id="cap2"></p>
                                <button id="btnB" class="btn btn-success designBtn">Design B</button>
                            </div>
                        </div>
                    </div>


                    <!--Imageform (add new tests)-->
                    <div class="col-12 formContent addedMargin">
                        <div class="col-10 shadow5" id="formDiv">
                            <form enctype="multipart/form-data" method="POST" id="addTestForm" class="sendForm">
                                <table>
                                    <thead>
                                        <tr><th colspan="3">Add a new split test</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th><input type="text" name="testName" id="testName" placeholder="Name of Test" maxlength="25"></th>
                                            <th></th>
                                        </tr>
                                        <tr>
                                            <td><img id="output_image1" class="previewImage"/></td>
                                            <td></td>
                                            <td><img id="output_image2" class="previewImage"/></td>
                                        </tr>
                                        <tr>
                                            <td><input class="btn formBtn" type="file" accept="image/*" name="image1" onchange="preview_image(event, 1);"></td>
                                            <td></td>
                                            <td><input class="btn formBtn" type="file" accept="image/*" name="image2" onchange="preview_image(event, 2);"></td>
                                        </tr>
                                        <tr>
                                            <th>Caption</th>
                                            <th></th>
                                            <th>Caption</th>
                                        </tr>
                                        <tr>
                                            <td><textarea id="caption1" name="caption1" rows="5" cols="30"></textarea></td>
                                            <td></td>
                                            <td><textarea name="caption2" id="caption2" rows="5" cols="30"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3"><input class="btn bottom shadow3" id="sendBtn" type="submit" name="submit-test" value="Upload"/></td>
                                        </tr>
                                    </tbody>

                                </table>
                            </form>
                        </div>
                    </div>

                    <!--Add more content here-->

                </div>

                <!--Supplementing content-->
                <div class="row shadow1" id="content2">
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <footer id="pageFooter">Database: MySQL</footer>
    </body>
</html>