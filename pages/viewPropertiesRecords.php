<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check.
    $page = $title = 'Admin';
    include "../partials/header.php";

    $Properties = GetAllProperties($PDO); //Returns empty array on fail or none.
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <?php
            include "../partials/navbar.php"
        ?>

        <div class="container-fluid sticky-footer-wrapper mainContent">
            <div class="row vh90 padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12">                  
                    <div class="row">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">View Property Records</h1>
                            <a href="admin.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>
                    
                    <div class="row padding-top-50">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6 table-responsive">
                            <table class="table table-hover users-table-background">
                                <thead>
                                    <tr>
                                        <th scope="col">Number / Name</th>
                                        <th scope="col">Street</th>
                                        <th scope="col">Postcode</th>
                                        <th scope="col">City</th>
                                        <th scope="col">County</th>
                                        <th scope="col">Number Of Bedrooms</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($Properties as $property) {
                                            $pID = $property['PropertyID'];
                                            $pNumber = $property['HouseNo'];
                                            $pStreet = $property['Street'];
                                            $pPostcode = $property['Postcode'];
                                            $pCity = $property['City'];
                                            $pCounty = $property['County'];
                                            $pBedrooms = $property['Bedrooms'];

                                            echo '
                                                <tr>
                                                    <td>'.$pNumber.'</td>
                                                    <td>'.$pStreet.'</td>
                                                    <td>'.$pPostcode.'</td>
                                                    <td>'.$pCity.'</td>
                                                    <td>'.$pCounty.'</td>
                                                    <td>'.$pBedrooms.'</td>
                                                    <td><a href="viewPropertyRecords.php?propertyToView='.$pID.'" class="btn-admin-nav btn-block form-send-opacity font-weight-bold text-center text-decoration-none">View Records</a></td>
                                                </tr>
                                            ';
                                        };
                                    ?>                                    
                                </tbody>                                
                            </table>
                        </div>  
                        <div class="col-sm-3"></div>
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





