<?php
    session_start();
    require('../php/security_check.php'); //Does the necessary security check.
    $page = $title = 'Visit Form';
    include "../partials/header.php";
?>
<!DOCTYPE html>
<html>
    <body class="body">
        <?php
            include "../partials/navbar.php"
        ?>

        <div class="container-fluid mainContent">
            <div class="row padding-top-100 text-center align-cotent-center justify-content-center margin-gap-sidebar">
                <div class="col-md-12">                  
                    <div class="row">
                        <div class="col-sm-3"></div>                        
                        <div class="col-sm-6">
                            <h1 class="h1-responsive font-weight-bold text-center my-4 form-padding-50">Visit Form</h1>
                            <a href="home.php" class="btn btn-admin-nav btn-block form-send-opacity font-weight-bold text-center">Cancel</a>
                        </div>  
                        <div class="col-sm-3"></div>
                    </div>          
                    
                    <div class="row padding-top-50">
                        <div class="col-md-12">
                            <form id="visitForm" name="visitForm" action="../php/visitFormSubmit.php" method="POST">
                                <div class="row form-group">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8 padding-top-10">
                                        <label class="Location" for="inlineFormCustomSelectLocation">Property *</label>
                                        <select class="custom-select Location" id="inlineFormCustomSelectPref" name="propertyID" required>
                                            <option value="">Which loction are you visiting...</option>
                                            <?php
                                                $properties = GetAllProperties($PDO); 
                                                foreach($properties as $property) {
                                                    echo "<option value='".$property["PropertyID"]."'>".$property['HouseNo']." ".$property['Street']."</option>";
                                                }                                                                            
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="hallwayCheck" class="labelVisit">Hallway(Include Cubby hole)</label>
                                        <input type="text" class="form-control" id="inputvisits" name="hallwayNotes" placeholder="Notes about hallway">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="KitchenCheck" class="labelVisit">Kitchen</label>
                                        <input type="text" class="form-control" id="KitchenCheck" name="kitchenNotes" placeholder="Notes about kitchen">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="LivingRoomCheck" class="labelVisit">Living Room</label>
                                        <input type="text" class="form-control" id="LivingRoomCheck" name="livingRoomNotes" placeholder="Notes about Living Room">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="StairsCheck" class="labelVisit">Stairs/Landing</label>
                                        <input type="text" class="form-control" id="StairsCheck" name="stairsAndLandingNotes" placeholder="Notes about Stairs/Landing">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="BathroomCheck" class="labelVisit">Bathroom Check</label>
                                        <input type="text" class="form-control" id="BathroomCheck" name="bathroomNotes" placeholder="Notes about Bathroom">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                
                                <div class="row form-group padding-top-10">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label for="ToiletCheck" class="labelVisit">Toilet Check *</label>
                                        <select class="custom-select" name="toiletCheck" id="inlineFormCustomSelectPref" required>
                                            <option value="">Select Toilet Condition</option>
                                            <option value="Good">Good</option>
                                            <option value="OK">OK</option>
                                            <option value="Poor">Poor</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group">                               
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4 padding-top-10">
                                        <label for="TenantsRooms" class="labelVisit">Tenant's Present</label>
                                        <input type="text" id="forename" class="form-control" name="tenantsPresent" placeholder="Tenant Names Who Are Present">
                                    </div>
                                    <div class="col-sm-4 align-self-end padding-top-10">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="anyTenantsPresent" value="1">
                                        <h1 class="labelVisit padding-top-20">Tick If Anyone Present</h1>
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="TenantsRoom" name="tenantRoomNotes" placeholder="Notes about Tenants Rooms">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>                               

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label class="labelVisit" for="inlineCheckbox1">Smoke Alarm</label>
                                        <input type="text" class="form-control" id="SmokeAlarmFault" name="smokeAlarmNotes" placeholder="Any Faults?">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>
                                
                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <label class="labelVisit" for="Applicances">FRIDGE/FREEZER | WASHER | MICROWAVE | KETTLE | HOOVER | FRYER | TOASTER</label>
                                        <input type="text" class="form-control" id="applianceNotes" name="applianceNotes" placeholder="Notes to above">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-10">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="ExtraNotes" name="extraNotes" placeholder="Extra Notes if Needed">
                                    </div>
                                    <div class="col-sm-2"></div>
                                </div>

                                <div class="row form-group padding-top-50">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4">
                                        <button class="btn btn-home btn-dark btn-block form-send-opacity text-dark" id="submitBtn" type="submit">Submit Visit</button>
                                    </div>
                                    <div class="col-sm-4"></div>
                                </div>
                            </form>
                        </div>  
                    </div>               
                </div>
            </div>
            
            <div class="row margin-gap-sidebar">
                <div class="col-sm-12 text-center text-dark padding-top-50 padding-bottom-20">
                    <?php
                        include "../partials/footer.php" 
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>



