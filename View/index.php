<html>
    <head>
        <title>
            Test Form Riverbridge
        </title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Bootstrap 4 Vertical Form Layout</title>
        <link rel="stylesheet" href="../Dist/css/bootstrap4/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="../Dist/js/index.js"></script>
    </head>
    <body>
        <div class="card">
            <h5 class="card-header">Test</h5>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <form method="post" name="f1" action="" id="form-data">
                            <br />
                            <div class="form-group">
                                <label for="lblname">Name:</label>
                                <input type="name" class="form-control" id="user_name" name="user_name" autocomplete="off" placeholder="Enter Your Name" />
                                <h6 id="usercheck"></h6>
                            </div>
                            <div class="form-group">
                                <label for="lblemail">Email Address</label>
                                <input type="email" class="form-control" id="user_email" autocomplete="off" name="user_email" placeholder="Enter Your Email" />
                                <h6 id="emailcheck"></h6>
                            </div>
                            <div class="form-group">
                                <label for="lblmobile">Mobile No:</label>
                                <input type="text" class="form-control" autocomplete="off" id="phone_no" name="phone_no" placeholder="Enter Your Mobile No" />
                                <h6 id="mobilecheck"></h6>
                            </div>
                            <div class="form-group">
                                <label for="lblgender">Gender:</label><br />
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="male" />
                                    <label class="form-check-label" for="inlineRadio1">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="female" />
                                    <label class="form-check-label" for="inlineRadio2">Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" id="gender" value="other" />
                                    <label class="form-check-label" for="inlineRadio3">Other</label>
                                </div>
                                <h6 id="gendercheck"></h6>
                            </div>
                            <button type="submit" class="btn btn-primary" name="save" id="save">Submit</button>
                        </form>
                        <span id="result" style="color: green;"></span>
                    </div>
                </div>
            </div>
            <br />
        </div>
        <div class="table-responsive" id="resultset">

        </div>
    </body>
</html>
