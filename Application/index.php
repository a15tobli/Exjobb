<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="style.css">

        <title>Design application</title>

        <!--PHP Scripts-->

    </head>
    <body>

        <!--Navigation menu-->
        <nav class="navbar navbar-toggleable-md navbar-dark">
            <button class="navbar-toggler btn btn-basic" type="button" data-toggle="collapse" data-target="#navContent" aria-controls="navContent" aria-expanded="false" aria-label="Toggle navigation" id="hamburgerBtn">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!--Collapsed content-->
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

                    <!--Index page (default view)
                        ---Add code here---
                    -->

                    <!--Design choice/Split-test (answer test)-->
                    <div class="col-12 splittestContent addedMargin">
                        <div class="row">
                            <div class="col-5 imageContainer shadow2"><img src="viewData.php" alt="Design1" id="img1"/></div>
                            <div class="col-2"></div>
                            <div class="col-5 imageContainer shadow2"><img src="Imagetest/img2.PNG" alt="Design2" id="img2"/></div>
                        </div>
                    </div>

                    <!--Imageform (add new tests)-->
                    <div class="col-12 formContent addedMargin">
                        <div class="col-10 shadow5" id="formDiv">
                            <form method="POST" action="insertImages.php" enctype="multipart/form-data" class="sendForm">
                                <table>
                                    <thead>
                                        <tr><th colspan="3">Add a new split test</th></tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th><input type="text" name="testName" placeholder="Name of Test"></th>
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
                                            <td><textarea name="caption1" rows="10" cols="30"></textarea></td>
                                            <td></td>
                                            <td><textarea name="caption2" rows="10" cols="30"></textarea></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input class="btn bottom shadow3" id="sendBtn" type="submit" name="submit" value="Upload"></td>
                                            <td></td>
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

        <!--External scripts-->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="./JS/Navigation.js"></script>

    </body>
</html>