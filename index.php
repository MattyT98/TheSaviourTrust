<?php
    session_start();
    $page = $title = 'Login';
    include "partials/header.php";
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <div class="container-fluid sticky-footer-wrapper">
            <div class="row vh90 align-items-center">
                <div class="col-sm-12">
                    <form action="php/login.php" method="POST">                    
                        <div class="row align-items-center">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <img class="img-home-logo img-fluid" src="images/saviourTrustLogo.PNG">
                            </div>
                            <div class="col-sm-4"></div>
                        </div>

                        <div class="row align-items-center padding-top-100">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4 padding-top-10 text-dark">
                                <label for="Username" id="usernameLbl">Username</label>
                                <input class="form-control" id="usernameTxt" name="username" placeholder="Enter Username" type="text">
                            </div>
                            <div class="col-sm-4"></div>
                        </div>

                        <div class="row align-items-center padding-top-20">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4 padding-top-10 text-dark">
                                <label for="Passowrd" id="passwordLbl">Password</label>
                                <input class="form-control" id="passwordTxt" name="password" placeholder="Enter Password" type="password">
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        
                        <div class="row padding-top-50">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">LogIn</button>
                            </div>
                            <div class="col-sm-4"></div>                                            
                        </div>
                    </form>
                </div>
            </div>         

            <div class="row footer">
                <div class="col-sm-12 text-center text-dark padding-top-50 padding-bottom-20">
                    <?php
                        include "partials/footer.php" 
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>





