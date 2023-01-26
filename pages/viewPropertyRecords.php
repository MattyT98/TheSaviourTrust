<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check
    $page = $title = 'Admin';
    include "../partials/header.php";    
    $route = $_SERVER['HTTP_REFERER'];

    $propertyToView = $_GET['propertyToView'];
    $property = GetProperty($PDO, $propertyToView);
        
    $PropertyRecords = GetAllHouseRecords($PDO, $propertyToView);;
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
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Viewing:
                                <?php
                                    $streetNo = $property['HouseNo'];
                                    $street = $property['Street'];
                                    echo $streetNo." ".$street;
                                ?>
                            </h1>
                            <div class="row">
                                <div class="col-sm-2"></div> 
                                <div class="col-sm-4">
                                    <a href="viewPropertiesRecords.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
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
                        <div class="col-xl-10 table-responsive">
                            <table class="table table-hover users-table-background">
                                <thead>
                                    <tr>
                                        <th scope="col">Hallway Notes</th>
                                        <th scope="col">Kitchen Notes</th>
                                        <th scope="col">Living Room Notes</th>
                                        <th scope="col">Bathroom Notes</th>
                                        <th scope="col">ToiletNotes</th>
                                        <th scope="col">Any Tenants Present?</th>
                                        <th scope="col">Tenants Present</th>
                                        <th scope="col">Tenant Room Notes</th>
                                        <th scope="col">Smoke Alarm Notes</th>
                                        <th scope="col">Appliance Notes</th>
                                        <th scope="col">Extra Notes</th>
                                        <th scope="col">Time Submitted</th>
                                        <th scope="col">Submitted By</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($PropertyRecords as $record) {
                                            $rID = $record['RecordID'];
                                            $rPropertyID = $record['PropertyID'];
                                            $rHallwayNotes = $record['HallwayNotes'];
                                            $rKitchenNotes = $record['KitchenNotes'];
                                            $rLivingRoomNotes = $record['LivingRoomNotes'];
                                            $rBathroomNotes = $record['BathroomNotes'];
                                            $rToiletNotes = $record['ToiletNotes'];

                                            $rAnyTenantsPresent = $record['AnyTenantsPresent'];
                                            if($rAnyTenantsPresent)
                                                $rAnyTenantsPresent = "Yes";
                                            else
                                                $rAnyTenantsPresent = "No";

                                            $rTenantsPresent = $record['TenantsPresent'];
                                            $rTenantRoomNotes = $record['TenantRoomNotes'];
                                            $rSmokeAlarmNotes = $record['SmokeAlarmNotes'];
                                            $rApplianceNotes = $record['ApplianceNotes'];
                                            $rExtraNotes = $record['ExtraNotes'];
                                            $rTimeSubmitted = $record['TimeSubmitted'];
                                            $rSubmittedByStaff = $record['SubmittedByStaff'];

                                            echo '
                                                <tr>
                                                    <td>'.$rHallwayNotes.'</td>
                                                    <td>'.$rKitchenNotes.'</td>
                                                    <td>'.$rLivingRoomNotes.'</td>
                                                    <td>'.$rBathroomNotes.'</td>
                                                    <td>'.$rToiletNotes.'</td>
                                                    <td>'.$rAnyTenantsPresent.'</td>
                                                    <td>'.$rTenantsPresent.'</td>
                                                    <td>'.$rTenantRoomNotes.'</td>
                                                    <td>'.$rSmokeAlarmNotes.'</td>
                                                    <td>'.$rApplianceNotes.'</td>
                                                    <td>'.$rExtraNotes.'</td>
                                                    <td>'.$rTimeSubmitted.'</td>
                                                    <td>'.$rSubmittedByStaff.'</td>

                                                    <td><a href="viewPropertyRecord.php?propertyToView='.$rID.'" class="btn-admin-nav btn-block form-send-opacity font-weight-bold text-center text-decoration-none">View Record</a></td>
                                                </tr>
                                            ';
                                        };
                                    ?>                                    
                                </tbody>                                
                            </table>
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


