<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check.
    $page = $title = 'Admin';
    include "../partials/header.php";
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <?php
            include "../partials/navbar.php"
        ?>

        <div class="container-fluid sticky-footer-wrapper mainContent">
            <div class="row padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12">                  
                    <div class="row">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Create New Property</h1>
                            <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>          
                    
                    <div class="row padding-top-50">
                        <div class="col-md-12">
                            <form id="createuserForm" name="createUserForm" action="../php/createNewProperty.php" method="POST">
                                <div class="row form-group">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2 padding-top-10">
                                        <label for="houseNumber">House Number / Name *</label>
                                        <input type="number" name = "houseNo" class="form-control" id="houseNo" placeholder="House Number / Name" required>
                                    </div>
                                    <div class="col-sm-6 align-self-end padding-top-10">
                                        <label for="street">Street *</label>
                                        <input type="text" class="form-control" name = "street" id="street" placeholder="Street Name" required>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-2 padding-top-10">
                                        <label for="postcode">Postcode *</label>
                                        <input type="text" name = "postcode" class="form-control" id="postcode" placeholder="Postcode" required>
                                    </div>
                                    <div class="col-sm-6 align-self-end padding-top-10">
                                        <label for="city">City *</label>
                                        <select id="city" name ="city" class="form-control" required>
                                            <option selected>Choose...</option>
                                            <option>Leeds</option>
                                            <option>Pontefract</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>                              

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="county">County *</label>
                                        <select id="county" name ="county" class="form-control" required>
                                            <option selected>Choose...</option>
                                            <option value="North Yorkshire">North Yorkshire</option>
                                            <option value="East Yorkshire">East Yorkshire</option>
                                            <option value="South Yorkshire">South Yorkshire</option>
                                            <option value="West Yorkshire">West Yorkshire</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="bedrooms">Number of Bedrooms *</label>
                                        <select id="bedrooms" name ="bedrooms" class="form-control" required>
                                            <option selected>Choose...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-50">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Create Property</button>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>
                        </div>  
                    </div>               
                </div>

            </div>
            <div class="container-fluid">
                <div class="row margin-gap-sidebar">
                    <div class="row footer">
                        <div class="col-sm-12 text-center text-dark padding-top-50 padding-bottom-20">
                            <?php
                                include "../partials/footer.php" 
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>







<script>
  window.onload = function () {

    if (window.File && window.FileList && window.FileReader) {
      var filesInput = document.getElementById("files");

      filesInput.addEventListener("change", function (event) {

        var files = event.target.files;
        var output = document.getElementById("result");

        for (var i = 0; i < files.length; i++) {
          var file = files[i];

          if (!file.type.match('image'))
            continue;

          var picReader = new FileReader();

          picReader.addEventListener("load", function (event) {

            var picFile = event.target;

            var div = document.createElement("column");

            div.innerHTML = "<img class='thumbnail' src='" + picFile.result + "'" +
              "title='" + picFile.name + "'/>";

            output.insertBefore(div, null);

          });

          picReader.readAsDataURL(file);
        }

      });
    }
    else {
      console.log("Your browser does not support File API");
    }
  }


</script>