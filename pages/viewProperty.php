<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check
    $page = $title = 'Admin';
    include "../partials/header.php";    
    $route = $_SERVER['HTTP_REFERER'];

    $propertyID = $_GET['propertyToView'];

    $property=null;
    if ($propertyID == "")
        header('Location: '.$route);
    else
        $property = GetProperty($PDO,$propertyID);
        
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
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Viewing:
                                <?php
                                    $streetNo = $property['HouseNo'];
                                    $StreetName = $property['Street'];
                                    echo $streetNo." ".$StreetName;
                                ?>
                            </h1>
                            <div class="row">
                                <div class="col-sm-2"></div> 
                                <div class="col-sm-4">
                                    <a href="viewProperties.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                                </div> 
                                <div class="col-sm-4">
                                    <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">home</a>
                                </div> 
                                <div class="col-sm-2"></div> 
                            </div>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>           
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10">
                            <form id="updateForm" name="updateForm" action="../php/updateProperty.php" method="POST">              
                                <div class="row">                             
                                    <div class="col-md">
                                        <h2>House Number / Name: </h2>
                                    </div>
                                    <div class="col-sm">
                                        <h3 class="ms-auto"><?php echo $property['HouseNo'];?></h3>
                                    </div>
                                    <div class="col-xl">
                                        <input class="form-control" type="text" name="houseNo" placeholder="Enter New House Number Or House Name">
                                        <input class="form-control" type="hidden" name="propertyID" value="<?php echo $propertyID?>">
                                    </div>
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-md">
                                        <h2>Street: </h2>                                    
                                    </div>
                                    <div class="col-md">
                                        <h3><?php echo $property['Street'];?></h3>
                                    
                                    </div>
                                    <div class="col-xl">
                                        <input class="form-control" type="text" name="street" placeholder="Enter New Street">    
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-md">
                                        <h2>Postcode: </h2>
                                    </div>
                                    <div class="col-md">
                                        <h3 class="ms-auto"><?php echo $property['Postcode'];?></h3>
                                    </div>
                                    <div class="col-xl">
                                        <input class="form-control" type="text" name="postcode" placeholder="Enter New Postcode">    
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-md">
                                        <h2>City: </h2>
                                    </div>
                                    <div class="col-md">
                                        <h3 class="ms-auto"><?php echo ($property['City'] == 1) ? "Yes" : "No";?></h3>
                                    </div>
                                    <div class="col-xl">
                                        <select id="city" name ="city" class="form-control" required>
                                            <option Value="">Choose New City...</option>
                                            <option value="Leeds">Leeds</option>
                                            <option value="Pontefract">Pontefract</option>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-md">
                                        <h2>County: </h2>
                                    </div>
                                    <div class="col-md">
                                        <h3 class="ms-auto"><?php echo $property['County'];?></h3>
                                    </div>
                                    <div class="col-xl">
                                        <select id="county" name ="county" class="form-control" required>
                                            <option value="">Choose New County...</option>
                                            <option value="North Yorkshire">North Yorkshire</option>
                                            <option value="East Yorkshire">East Yorkshire</option>
                                            <option value="South Yorkshire">South Yorkshire</option>
                                            <option value="West Yorkshire">West Yorkshire</option>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-md">
                                        <h2>Bedrooms: </h2>                                        
                                    </div>
                                    <div class="col-md">                                        
                                        <h3 class="ms-auto"><?php echo $property['Bedrooms'];?></h3>
                                    </div>
                                    <div class="col-xl">
                                    <select id="type" name="bedrooms" class="form-control">
                                            <option value="">Choose New Bedroom Amount...</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-12">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Update Details</button>
                                    </div>                                
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-1"></div>
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


