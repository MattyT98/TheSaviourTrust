<?php
    session_start();
    require('../php/security_check_admin.php'); //Does the necessary security check
    $page = $title = 'Admin';
    include "../partials/header.php";    
    $route = $_SERVER['HTTP_REFERER'];
    $recordID = $_GET['recordToView'];
    $propertyID = $_GET['propertyID'];

    $record = GetRecord($PDO, $recordID, $propertyID);
    $property = GetProperty($PDO, $propertyID);        

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
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Viewing Record For:
                                <?php
                                    $streetNo = $property['HouseNo'];
                                    $StreetName = $property['Street'];

                                    echo $streetNo." ".$StreetName;
                                ?>
                            </h1>
                            <div class="row">
                                <div class="col-sm-2"></div> 
                                <div class="col-sm-4">
                                    <a href="viewPropertyRecords.php?propertyToView=<?php echo $propertyID ?>" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Back</a>
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
                            <form id="updateForm" name="updateForm" action="../php/updaterecord.php" method="POST">              
                                <div class="row">                             
                                    <div class="col-sm-3">
                                        <h2>Hallway Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="hallwayNotes" value="<?php echo $record['HallwayNotes'] ?>">
                                        <input class="form-control" type="hidden" name="recordID" value="<?php echo $recordID?>">
                                        <input class="form-control" type="hidden" name="propertyID" value="<?php echo $propertyID?>">
                                    </div>
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Kitchen Notes: </h2>                                    
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="kitchenNotes" value="<?php echo $record['KitchenNotes'] ?>">
 
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Living Room Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="livingRoomNotes" value="<?php echo $record['LivingRoomNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Stairs And Landing Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="stairsAndLandingNotes" value="<?php echo $record['StairsAndLandingNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Bathroom Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="bathroomNotes" value="<?php echo $record['BathroomNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Toilet Notes: </h2>                                        
                                    </div>
                                    <div class="col-md">
                                        <select id="type" name="toiletNotes" class="form-control">
                                            <?php
                                                function GetSelected($note, $record){
                                                    $selected = $record['ToiletNotes'];
                                                    if ($note == $selected)
                                                        return "selected";
                                                    else
                                                        return " ";
                                                }
                                                echo '
                                                <option value="OK" '.GetSelected("OK", $record).'>OK</option>
                                                <option value="Good" '.GetSelected("Good", $record).'>Good</option>
                                                    <option value="Poor" '.GetSelected("Poor", $record).'>Poor</option>
                                                '
                                            ?>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Any Tenants Present: </h2>
                                    </div>
                                    <div class="col-md">
                                        <select id="type" name="anyTenantsPresent" class="form-control">
                                            <?php   
                                                function GetSelectedTenant($note, $record){
                                                    $selected = $record['AnyTenantsPresent'];
                                                    if ($note == $selected)
                                                        return "Selected";
                                                    else
                                                        return " ";
                                                }
                                                echo '
                                                    <option value="0"'.GetSelectedTenant("0", $record).'>No</option>
                                                    <option value="1"'.GetSelectedTenant("1", $record).'>Yes</option>
                                                '
                                            ?>
                                        </select>
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Tenants Present: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="tenantsPresent" value="<?php echo $record['TenantsPresent'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Tenants Rooms Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="tenantRoomNotes" value="<?php echo $record['TenantRoomNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Smoke Alarm Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="smokeAlarmNotes" value="<?php echo $record['SmokeAlarmNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Appliance Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="applianceNotes" value="<?php echo $record['ApplianceNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Extra Notes: </h2>
                                    </div>
                                    <div class="col-md">
                                        <input class="form-control" type="text" name="extraNotes" value="<?php echo $record['ExtraNotes'] ?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Time Submitted: </h2>
                                    </div>
                                    <div class="col-md">
                                        <h3><?php echo $record['TimeSubmitted'];?></h3>
                                        <input class="form-control" type="hidden" name="timeSubmitted" value="<?php echo $record['TimeSubmitted']?>">
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-3">
                                        <h2>Submitted By: </h2>
                                    </div>
                                    <div class="col-md">
                                        <h3><?php echo $record['SubmittedByStaff'];?></h3>
                                        <input class="form-control" type="hidden" name="submittedBy" value="<?php echo $record['SubmittedByStaff']?>">
                                                
                                    </div>                                
                                </div>

                                <div class="row padding-top-50">
                                    <div class="col-sm-12">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Update Record</button>
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


