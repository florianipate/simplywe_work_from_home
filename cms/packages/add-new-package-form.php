<div class="list-group">
    <div class="list-group-item list-group-item-dark">
        <span>Use the form below to add a new package</span>
    </div>
    <div class="list-group-item p-0">
        <form action="" method="post"> 
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
            <?php require_once '../cms/inc/add-new-package.inc.php'?>
            </div>
            
<!--            VENUE REFERANCE FIELD-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6 pt-3">
                <label for="venue_ref">Venue Ref:</label><span class="required">*</span>
                <input type="text" class="form-control w-50" name="venue_ref" id="venue_ref" aria-describedBy="venue_refHelp" value="<?php echo $venue_ref; ?>" />
                <small id="venue_refHelp" class="form-text text-muted">Enter the venue referance/ID.<?php echo Input::get('venue_ref')?></small>
            </div>
            
<!--            PACKAGE TITLE-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
               <label for="venue_package">Package Title:</label><span class="required">*</span> 
                <input type="text" class="form-control" name="venue_package" id="venue_package" aria-describedBy="venue_packagefHelp" value="<?php echo Input::get('venue_package')?>" />
                <small id="venue_packageHelp" class="form-text text-muted">eg: 60 Daytime and 60 Evening Guest Packages </small>
            </div>
            
<!--            PACKAGE SUBTITLE LINE ONE-->
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label>Package Subtitle:</label><br>
                
               <label for="venue_package_line_1">Line one:</label><span class="text-muted"> (Optional)</span> 
                <input type="text" class="form-control" name="venue_package_subtitle_line_1" id="venue_package_subtitle_line_1" aria-describedBy="venue_package_subtitle_line_1fHelp" value="<?php echo Input::get('venue_package_subtitle_line_1')?>" />
                <small id="venue_package_subtitle_line_1Help" class="form-text text-muted">eg: Special offer</small>

               <label for="venue_package_line_2">Line two:</label><span class="text-muted"> (Optional)</span> 
                <input type="text" class="form-control" name="venue_package_subtitle_line_2" id="venue_package_subtitle_line_2" aria-describedBy="venue_package_subtitle_line_2fHelp" value="<?php echo Input::get('venue_package_subtitle_line_2')?>" />
                <small id="venue_package_subtitle_line_2Help" class="form-text text-muted">eg: For a Particular length of time </small>
            </div>
            
            
<!--            PACKAGE PRICE-->
            
            <div class="form-group col-xs-12 col-sm-8 col-md-8 col-lg-6">
                <label for="venue_package_price">Package Price</label><span class="required">*</span> 
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">£</span>
                    </div>
                    <input type="text" class="form-control" name="venue_package_price" id="venue_package_price" onkeyup="PackagePrice()" aria-describedBy="venue_package_pricefHelp" value="<?php echo Input::get('venue_package_price')?>" />
                    <div class="input-group-append">
                        <span class="input-group-text">.00</span>
                    </div>
                </div>            
                <small id="venue_package_priceHelp" class="form-text text-muted">Enter package price</small>
            </div>
            
            
<!--            DAYTIME/ EVENING EXTRA GUEST PRICE-->
            
            <div class="form-group col-12">
                <label class="text-uppercase">Extra guest price </label>
                <div class="row">
                    <div class="form-group col-sm-5 col-lg-4">
                        <label for="daytime_extra_price">Daytime</label><span class="required">*</span>
                        
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">£</span>
                            </div>
                            <input type="text" class="form-control" name="daytime_extra_price" id="daytime_extra_price" aria-describedBy="daytime_extra_priceHelp" value="<?php echo Input::get('daytime_extra_price')?>" />
                            <div class="input-group-append">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div> 

                        <small id="daytime_extra_priceHelp" class="form-text text-muted">Enter price</small>
                    </div>
                    <div class="form-group col-sm-5 col-lg-4">
                        <label for="evening_extra_price">Evening</label><span class="required">*</span>
                        
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">£</span>
                        </div>
                        <input type="text" class="form-control" name="evening_extra_price" id="evening_extra_price" aria-describedBy="evening_extra_priceHelp" value="<?php echo Input::get('evening_extra_price')?>" />
                        <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div> 
                        
                        <small id="evening_extra_priceHelp" class="form-text text-muted">Enter price</small>
                    </div>
                </div>
            </div>
            
            
<!--            DATE SECTION-->
            
            <div class="form-group col-12">
                <label>Available </label><span class="required">*</span>
                <div class="row">
                    <div class="col-sm-6 col-xs-12 calendar">
                        <label for="available_from">From:</label>
                        <input type="date" class="form-control" name="available_from" id="available_from" aria-describedBy="av_from" value="<?php echo Input::get('available_from')?>"/>
                        <small id="av_from" class="form-text text-muted">Select date</small>
                    </div>
                    <div class="col-sm-6 col-xs-12 calendar">
                        <label for="available_from">To: </label>
                        <input type="date" class="form-control" name="available_to" id="available_to" aria-describedBy=av_to value="<?php echo Input::get('available_to')?>"/>
                        <small id="av_to" class="form-text text-muted">Select date</small>
                    </div>               
                </div>
            </div>
            
<!--            DAYS OF THE WEEK AND PRICE VARIATION-->
            <div class="form-group col-12">
                <label class="text-uppercase py-3">Days of the week and price variation </label><span class="required">*</span>
                <div class="row">
                    <div class="col-12 calendar">
                        <div class="row ">
                            <div class="col-5">Week Days</div>
                            <div class="col-3">Price Variation</div>
                            <div class="col-4">Package Price</div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <input type="checkbox" name="monday" class="pl-3" id="mo"/> 
                                <label for="mo"> Monday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3" onkeyup="MoPrice()" id="mo_percent" name="mo_percent" size="3"  value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4 d-flex">
                                <span class="align-self-center" id="mo_price"></span>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="tuesday" class="pl-3" id="tu"/> 
                                <label for="tu"> Tuesday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3" onkeyup="TuPrice()" id="tu_percent" name="tu_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="tu_price"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="wednesday" class="pl-3" id="we"/> 
                                <label for="we"> Wednesday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3" onkeyup="WePrice()" id="we_percent" name="we_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="we_price"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="thursday" class="pl-3" id="th"/> 
                                <label for="th"> Thursady</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3"  onkeyup="ThPrice()" id="th_percent" name="th_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="th_price"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="friday" class="pl-3" id="fr"/> 
                                <label for="fr"> Friday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3"  onkeyup="FrPrice()" id="fr_percent" name="fr_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="fr_price"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="saturday" class="pl-3" id="sa"/> 
                                <label for="sa"> Saturday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3" onkeyup="SaPrice()" id="sa_percent" name="sa_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="sa_price"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div  class="col-5">
                                <input type="checkbox" name="sunday" class="pl-3" id="su"/> 
                                <label for="su"> Sunday</label>
                            </div>
                            <div class="col-3 align-self-center">
                                <input type="text"  maxlength="3" onkeyup="SuPrice()" id="su_percent" name="su_percent" size="3" value="0">
                                <lable>%</lable>
                            </div>
                            <div class="col-4">
                                <span class="align-self-center" id="su_price"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <small id="weekdays" class="form-text text-muted">You must select at least on day</small>
            </div>
            
<!--            DAYTIME MAX GUESTS-->
            <div class="form-group col-12">
                <lable class="text-uppercase">Daytime Guests</lable>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="venue_min_daytime">Min</label><span class="required">*</span> 
                        <input type="text" class="form-control" name="venue_min_daytime" id="venue_min_daytime" aria-describedBy="venue_min_daytimeHelp" value="<?php echo Input::get('venue_min_daytime')?>" />
                        <small id="venue_min_daytimeHelp" class="form-text text-muted">Enter min guests daytime</small>
                    </div> 

                    <div class="form-group col-4">
                        <label for="venue_max_daytime">Max</label><span class="required">*</span> 
                        <input type="text" class="form-control" name="venue_max_daytime" id="venue_max_daytime" aria-describedBy="venue_max_daytimeHelp" value="<?php echo Input::get('venue_max_daytime')?>" />
                        <small id="venuemax_daytimeHelp" class="form-text text-muted">Enter max guests daytime</small>
                    </div> 
                </div>
            </div>
            
<!--            EVENING MAX GUESTS  -->
            <div class="form-group col-12">
                <lable class="text-uppercase">Evening Guests</lable>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="venue_min_evening">Min</label><span class="required">*</span> 
                        <input type="text" class="form-control" name="venue_min_evening" id="venue_min_evening" aria-describedBy="venue_min_eveningHelp" value="<?php echo Input::get('venue_min_evening')?>" />
                        <small id="venue_min_eveningHelp" class="form-text text-muted">Enter min guests evening </small>
                    </div>
                    <div class="form-group col-4">
                        <label for="venue_max_evening">Max</label><span class="required">*</span> 
                        <input type="text" class="form-control" name="venue_max_evening" id="venue_max_evening" aria-describedBy="venue_max_eveningHelp" value="<?php echo Input::get('venue_max_evening')?>" />
                        <small id="venue_max_eveningHelp" class="form-text text-muted">Enter max guests evening </small>
                    </div>
                </div>
            </div>
            
<!--            DJ SECTION  -->
            
            <div class="form-group col-12">
            <lable class="text-uppercase">Is DJ included in the package?</lable><span class="required">*</span>
                <div class="col-6 py-3">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" onchange = "djPrice_included()" id="dj_yes" name="dj_price_inc"  value="yes" class="custom-control-input">
                        <label class="custom-control-label" for="dj_yes">YES</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" onchange = "djPrice_not_included()" id="dj_no" name="dj_price_inc" value="no" class="custom-control-input">
                        <label class="custom-control-label" for="dj_no">NO</label>
                    </div>
                </div>
                <div class="form-group col-5" id="dj_price_visible">
                    <label for="venue_max_evening">DJ additional price</label><span class="required">*</span> 
                    <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">£</span>
                            </div>
                            <input type="text" class="form-control" name="dj_price" id="dj_price" aria-describedBy="dj_priceHelp" value="<?php echo Input::get('dj_price')?>" />
                            <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                        </div>
                    </div> 
                </div>
                
            </div>
            
            <div class="form-groupcol-xs-8 col-md-12 col-lg-10 pb-3">
            <button type="submit" name="submit" class="btn btn-info m-auto text-white">Save Package</button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById('mo_price').innerHTML= '£' + 0;
    document.getElementById('tu_price').innerHTML= '£' + 0;
    document.getElementById('we_price').innerHTML= '£' + 0;
    document.getElementById('th_price').innerHTML= '£' + 0;
    document.getElementById('fr_price').innerHTML= '£' + 0;
    document.getElementById('sa_price').innerHTML= '£' + 0;
    document.getElementById('su_price').innerHTML= '£' + 0;
    document.getElementById('dj_no').checked  = true;
    document.getElementById('dj_price_visible').style.display = "block";

});
    
 function MoPrice()
 {
    var moPercent = document.getElementById('mo_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = moPercent*packagePrice/100 ;
    var moPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('mo_price').innerHTML= '£' + moPrice;
 }
function TuPrice(){
    var tuPercent = document.getElementById('tu_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = tuPercent*packagePrice/100 ;
    var tuPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('tu_price').innerHTML= '£' + tuPrice;
}
function WePrice(){
    var wePercent = document.getElementById('we_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = wePercent*packagePrice/100 ;
    var wePrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('we_price').innerHTML= '£' + wePrice;
}
function ThPrice(){
    var thPercent = document.getElementById('th_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = thPercent*packagePrice/100 ;
    var thPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('th_price').innerHTML= '£' + thPrice;
}
function FrPrice(){
    var frPercent = document.getElementById('fr_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = frPercent*packagePrice/100 ;
    var frPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('fr_price').innerHTML= '£' + frPrice;
}
function SaPrice(){
    var saPercent = document.getElementById('sa_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = saPercent*packagePrice/100 ;
    var saPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('sa_price').innerHTML= '£' + saPrice;
}
function SuPrice(){
    var suPercent = document.getElementById('su_percent').value;
    var packagePrice = document.getElementById('venue_package_price').value;
    var percentage = suPercent*packagePrice/100 ;
    var suPrice =parseInt(percentage) + parseInt(packagePrice);
   document.getElementById('su_price').innerHTML= '£' + suPrice;
}
function PackagePrice(){
   var packagePrice = document.getElementById('venue_package_price').value;
    document.getElementById('mo_price').innerHTML= packagePrice;
    document.getElementById('tu_price').innerHTML= packagePrice;
    document.getElementById('we_price').innerHTML= packagePrice;
    document.getElementById('th_price').innerHTML= packagePrice;
    document.getElementById('fr_price').innerHTML= packagePrice;
    document.getElementById('sa_price').innerHTML= packagePrice;
    document.getElementById('su_price').innerHTML= packagePrice;
}
//DJ PRICE SECTION
    
    function djPrice_included(){
        var djYes = document.getElementById('dj_yes');
        if(djYes.checked  = true){
            document.getElementById('dj_price_visible').style.visibility = "hidden";
        }
    }
    
    function djPrice_not_included(){
        var djNo = document.getElementById('dj_no');
        if(djNo.checked  = true){
            document.getElementById('dj_price_visible').style.visibility = "visible";
        }
    }
</script>