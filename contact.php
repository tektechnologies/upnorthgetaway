<?php

// Set email variables

$email_to = 'upngetaway@gmail.com';
$email_subject = 'Form submission';

// Set required fields
$required_fields = array('fullname','email', 'phone','comment');

// set error messages
$error_messages = array(

	'fullname' => 'Please enter a Name to proceed.',
	'email' => 'Please enter a valid Email Address to continue.',
	'phone' => 'Please enter your Phone Number to continue.',
	'comment' => 'Please enter your Message to continue.'

);



// Set form status
$form_complete = FALSE;

// configure validation array
$validation = array();


// check form submittal
if(!empty($_POST)) {

	// Sanitise POST array
	foreach($_POST as $key => $value) $_POST[$key] = remove_email_injection(trim($value));


	// Loop into required fields and make sure they match our needs
	foreach($required_fields as $field) {		
		// the field has been submitted?
		if(!array_key_exists($field, $_POST)) array_push($validation, $field);

		// check there is information in the field?
		if($_POST[$field] == '') array_push($validation, $field);


		// validate the email address supplied
		if($field == 'email') if(!validate_email_address($_POST[$field])) array_push($validation, $field);
		
		   // validate the phone supplied
		if($field == 'phone') if(!validate_phone($_POST[$field])) array_push($validation, $field);

	}

	// basic validation result
	if(count($validation) == 0) {
		// Prepare our content string
		$email_content = 'New Website Comment from UpNorthGetAway.Rentals: ' . "\n\n";
		// simple email content
		foreach($_POST as $key => $value) {
			if($key != 'submit') $email_content .= $key . ': ' . $value . "\n\n";

		}

		// if validation passed ok then send the email

		mail($email_to, $email_subject, $email_content);	

		// Update form switch

		$form_complete = TRUE;

	}

}
function validate_email_address($email = FALSE) {
	return (preg_match('/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i', $email))? TRUE : FALSE;
}

function validate_phone($phone = FALSE) {
	return (preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phone))? TRUE : FALSE;
}

function remove_email_injection($field = FALSE) {
   return (str_ireplace(array("\r", "\n", "%0a", "%0d", "Content-Type:", "bcc:","to:","cc:"), '', $field));
}
?>

<!DOCTYPE HTML>

<html lang="en">

<head>
 <title>Cozy Cottage</title>
 
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 
 <link href="css/styles.css" rel="stylesheet" type="text/css" media="screen" />	
 
 <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css' />
 
 <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css' />
 
 <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,300,700,200' rel='stylesheet' type='text/css' />
 
 <link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,700' rel='stylesheet' type='text/css' />  
 
 <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css' />
 
 <link href="images/icons/iconic.png" rel="shortcut icon" type="image/x-icon" />
 
 <link href="css/jquery.bxslider.css" rel="stylesheet" type="text/css" media="screen" />

 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/mootools/1.3.0/mootools-yui-compressed.js"></script>
 
 <script type="text/javascript" src="validation/validation.js"></script>     
   
 <script type="text/javascript">
		var nameError = '<?php echo $error_messages['fullname']; ?>';
		var emailError = '<?php echo $error_messages['email']; ?>';
		var phoneError = '<?php echo $error_messages['phone']; ?>';
		var commentError = '<?php echo $error_messages['comment']; ?>';
 </script>   

 <script type="text/javascript" src="js/jquery.js"></script>	
<!-- <script type="text/javascript" src="js/modernizr.js"></script>
 <script type="text/javascript" src="js/timothy.js"></script>-->
 <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
     
<script type="text/javascript">
$(document).ready(function(){
		  $('.bxslider').bxSlider({
				captions:true, 
				infiniteLoop:true, 
				speed:1000,
				auto: true

			  });
		});
    </script>
          
      
</head>

<body>
<div id="wrapper">

            <div id="top-bg">
            <div id="tagline">
                      <h2>Homepage of the Cozy Cottage!</h2>
            </div>
            <div id="topnav-top">
                        <ul>
                        <li><a href="http://www.rentwisconsincabins.com/detail.php?id=1361 ">Rent Wisconsin Cabins</a></li>
                        <li><a href="http://www.st-germain.com/">St. Germain Chamber of Commerce</a></li>
                        <li><a href="https://www.facebook.com/cozycottagestgermain/"><img src="images/icons/social-media/facebook_32.png" title="Facebook" alt="facebook" /></a></li>
                        </ul>
            </div>
            </div><!--<close id="top-bg">-->
            
            
            
            <div id="banner-bg">
            <div id="banner">
                
                 <div id="name">
                            <h2>UP NORTH GETAWAY</h2>
                 </div>
                 <div id="topnav">
                        <ul>
                        <li><a href="index.html">Home Page</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        </ul>
                 </div>
            </div>
            </div><!--<close id="banner-bg">-->
            
            
            
                        
            <div id="subbanner-bg">
                <div id="subbanner">
                <ul class="bxslider">
                    <li><img src="images/banner/a_shore_canoe.png"  alt="shore_canoe"/></li>
                    <li><img src="images/banner/backyard_deck.png"  alt="backyard_deck"/></li>
                    <li><img src="images/banner/dockBoatWater.png" alt="dockBoatWater"  /></li>
                    <li><img src="images/banner/LakeDock.png" alt="LakeDock" /></li>
                    <li><img src="images/banner/signHouse.png" alt="signHouse" /></li>
                    <li><img src="images/banner/twoJetSki.png" alt="twoJetSki" /></li>
                    <li><img src="images/banner/a_backyardhouse.png" alt="backyardhouse" /></li>
                    <li><img src="images/banner/a_bed.png" alt="a_bed"/></li>
                    <li><img src="images/banner/a_boat_dock_water.png" alt="boat_dock_water"/></li>
                    <li><img src="images/banner/a_cabin_shore.png" alt="cabin_shore"/></li>
                    <li><img src="images/banner/a_cabins.png" alt="cabin" /></li>
                    <li><img src="images/banner/a_dock_water_shore.png" alt="dock_water_shore"/></li>
                    <li><img src="images/banner/a_firetime.png" alt="firetime.png"/></li>
                    <li><img src="images/banner/a_lake_boating.png" alt="lake_boating"/></li>
                    <li><img src="images/banner/a_picnictable.png" alt="picnictable"/></li>
                    <li><img src="images/banner/a_picturewindow.png" alt="picturewindow"/></li>
                    <li><img src="images/banner/a_shore.png" alt="shore" /></li>
                    <li><img src="images/banner/a_yard_shore.png" alt="yard_shore"/></li>
                </ul>               
                </div>
            </div><!--<close id="subbanner-bg">-->
                      
<div id="content-interior">

	<div id="content-interior-main">
        <h1>Contact Us</h1>
        <p>Cozy Cottage is a wonderfully furnished year round home. Cozy Cottage offers 3 bedrooms, and 2 baths; full size refrigerator/freezer and range/oven. 
           The cottage has a forced air furnace and central air. There is a fire pit located next to the cabin and a nice big yard for yard games.  Ample parking for
           vehicles and trailers. Renting of the Cozy Cottage includes a boat dock slip.</p>
        <h2>Send Us A Message</h2>
        <p>Be sure to see our availability and check out our additional amenities:<a href="http://www.rentwisconsincabins.com/detail.php?id=1361 ">&nbsp;&nbsp; Click Here!</a></p>
        
<?php if($form_complete === FALSE): ?>
<form  method="post" action="contact.php" id="comments_form">
                         <ol>
                              <li>
                              <label>Name</label>
                              <input type="text" name="fullname" id="fullname" class="detail" value="<?php echo isset($_POST['fullname'])? $_POST['fullname'] : ''; ?>" /><?php if(in_array('fullname', $validation)): ?><span class="error"><?php echo $error_messages['fullname']; ?></span><?php endif; ?>
                              </li>
                              <li>
                              <label>Email</label>
                              <input type="text" name="email" id="email" class="detail" value="<?php echo isset($_POST['email'])? $_POST['email'] : ''; ?>" /><?php if(in_array('email', $validation)): ?><span class="error"><?php echo $error_messages['email']; ?></span><?php endif; ?>

                              </li>
                              <li>
                              <label>Phone</label>
                              <input type="text" name="phone" id="phone" class="detail" value="<?php echo isset($_POST['phone'])? $_POST['phone'] : ''; ?>" /><?php if(in_array('phone', $validation)): ?><span class="error"><?php echo $error_messages['phone']; ?></span><?php endif; ?>
                              </li>
                              <li>
                              <label>Message</label>
                              <textarea name="comment" id="comment" class="mess"><?php echo isset($_POST['comment'])? $_POST['comment'] : ''; ?></textarea><?php if(in_array('comment', $validation)): ?><span class="error"><?php echo $error_messages['comment']; ?></span><?php endif; ?>
                              </li>
                              <li>
                              <input class="submit" type="submit" name="submit" id="submit" value="Send Message">
                              </li>
                         </ol>
                           </form>
<?php else: ?>
       <p  style="font-size:35px; font-family:Arial, Helvetica, sans-serif; color:#64BC46;  margin-top:20px;  margin-left:75px;">Thank you for your Message!</p>
                           
       <script type="text/javascript">
			setTimeout('ourRedirect()', 5000)
				function ourRedirect () {
					location.href='contact.php' }
       </script>
                           
<?php endif; ?>
                          
<!-- <div id="location">
        <h2>Here is the Cozy Cottage</h2>
        <iframe width="700" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=8814%20Sunrise%20Shores%20Circle%2C%20St%20Germain%2C%20WI%2054558&key=AIzaSyCceT1FEq3_3W7xkoaX8w_58fKB70XnVsY" allowfullscreen>
        </iframe>
        <br /><small><a href="https://www.google.com/maps/place/8814+Sunrise+Shores+Cir,+St+Germain,+WI+54558/@45.9373569,-89.5442902,17z/data=!3m1!4b1!4m5!3m4!1s0x4d55c7d234d16139:0x9ed6f76b60dc15db!8m2!3d45.9373569!4d-89.5421015;source=embed" style="color:#0000FF;text-align:left">View         Larger Map</a></small>
        <h4 class="address">Cozy Cottage</h4>
        <h4 class="address">8814 Sunrise Shores Circle, St. Germain, WI 54558</h4>
        <h4 class="address">Telephone (319) 270-0807</h4>
        <h4 class="address">upngetaway@gmail.com</h4>
</div>-->










</div><!--<close id="content-interior-main">-->











<div id="rightside">
       <h2>4 Seasons Vacationland!</h2>
       <p>Vilas County, at the top of Wisconsin, is the heart of the most outstanding vacation area in the upper Midwest. St. Germain is Northern Wisconsin's four seasons vacationland.</p>
<div class="float-left">
            <h3>Spring</h3>
             <ul class="nav">
              <li><a href="http://www.upnorthfishing.com/fishing-report-for-st-germain-wisconsin.htm">Fishing</a></li>
              <li><a href="http://dnr.wi.gov/permits/registrationandtitling.html">Boating</a></li>
              <li><a href="https://www.vilaswi.com/itinerary/summer-watersports/">Water skiing</a></li>
              <li><a href="http://www.st-germain.com/recreation/golfing">Golf</a></li>
             </ul>
       <h3>Summer</h3>
            <ul class="nav">
             <li><a href="https://wildwoodoutdooradventures.com/trips-and-tours/river-trips">Floating</a></li>
             <li><a href="http://www.st-germain.com/recreation/paddling">Kayaking</a></li>
             <li><a href="http://st-germain.com/recreation/biking-hiking">Biking</a></li>
             <li><a href="https://www.vilaswi.com/things-to-do/farmers-markets/">Farmers Markets</a></li>
            </ul>
</div>
<div class="float-left">
          <h3>Fall</h3>
           <ul class="nav">
             <li><a href="https://www.youtube.com/watch?v=KMdtBRNE_nk">GetAway Here</a></li>
             <li><a href="http://hawksnest.lhrimages.com/">Paddling</a></li>
             <li><a href="http://st-germain.com/recreation/biking-hiking">Hiking</a></li>
             <li><a href="https://www.vilaswi.com/five-places-for-anunforgettable-hike/">Nature Walks</a></li>
            </ul>
     <h3>Winter</h3>
             <ul class="nav">
             <li><a href="https://www.youtube.com/watch?v=AochrVawGhA">Ice Fishing</a></li>
             <li><a href="http://www.st-germain.com/recreation/snowmobile">Snow Mobiling</a></li>
             <li><a href="http://st-germain.com/sites/default/files/u31/snowydayactivities-2016.pdf">Activities</a></li>
             <li><a href="https://www.yelp.com/search?cflt=casinos&find_loc=Saint+Germain%2C+WI+54558">Gambling</a></li>
            </ul>
</div>
     <p class="clear">&nbsp;</p>
     
     <p class="clear">"Playing at the beach during the day and campfires at night were highlights of the vacation." Brad,  June 2013</p>
     <img src="images/jetskiLake.png" alt="jetskiLake" />
     <h2>Visit St. Germain</h2>
     <p class="clear">"We were very impressed with our stay here. We came up to snowmobile and it had great access to the trails! Very clean and homey as well." Feb 8, 2017</p>
     <p class="clear">"Had a great time and the cottage worked out great for us! Very comfortable and we even had some deer in the backyard." Feb 15, 2017</p>
     <img src="images/hiketrail.png" alt="hiketrail" />
     <p class="clear">"Had a great time and the cottage worked out great for us! Very comfortable and we even had some deer in the backyard." Feb 15, 2017</p>
     <img src="images/snow.png" alt="snow" />
           <p class="clear">"We were very impressed with our stay here. We came up to snowmobile and it had great access to the trails! Very clean and homey as well." Feb 8, 2017</p>
         
</div><!--< close id="rightside">-->


<div id="review">
            <h2>Previous Reviews:</h2> 
                <p>" Yep! I'm in the Northwoods! The cabin is perfect and there is plenty of room to park vehicles and boat trailers. 
                The wildlife is incredible and it seems like there is a deer around every corner. The kids enjoyed fishing off the dock 
                where they caught panfish and the smallmouth fishing on the lake was awesome. The area around the dock is nice and sandy, 
                perfect for the kids to play and swim. We have been coming up to the northwoods for many years and I have to say the week 
                stay at cozy cottage has to be one of the best we've had. Thank you for the opportunity to stay here and we would love to come back.&quot;</p>
            <br />  
               <p>&quot;Great place to stay. We had a big group and there was plenty of room for everyone. We did have an issue with a breaker popping
                  in the kitchen one morning and the owner was very responsive in helping to get the problem fixed. It was great to have access to 
                  the snowmobile trails right from the cabin. We would stay again."  </p>
            <h3>Great snowmobile base camp!</h3> 
               <p>"Thank you for letting us stay at your cottage. The location is great, you can pick a destination in any direction and 
               take off from the cottage. No problem driving in or parking with a large enclosed trailer. The cabin has lots of room and the 
               fireplace was a great spot each evening for a night cap! It was very easy to setup our stay at the Cozy Cottage, and thank you 
               for letting us shift the days at the last minute to beat the meltdown."</p>
               <h3>Wonderful Northwoods Cottage</h3> 
               <p>"This was our first time staying at Cozy Cottage. We were immediately impressed by how neat, tidy and well-appointed it was.
                 Not to mention the wonderful surroundings and proximity to the lake! The recently remodeled kitchen had every utensil one could possibly need.
                 We brought our own board games, but soon realized that even those were provided by the owner. The lower level bedroom and bath offered additional privacy.
                 We especially liked watching the deer, squirrels and birds each day from the large picture window in the living room. Fishing was a bit slow, but we had fun trying. 
                 All in all we had a great time and loved working with the owner throughout the reservation process. We would highly recommend Cozy Cottage to anyone thinking of staying there!"</p>
           

           




</div><!-- end of review div-->











</div> <!--<close id="content-interior">-->
<div id="footer-bg">
     <div id="footer">
        <div id="footerbox1">
          <h3>Amenities</h3>
          <p>Cabin Features.</p>
          <ul>
          <li><a href="#">Air Conditioning</a></li>
          <li><a href="#">Linens Provided</a></li>
          <li><a href="#">Furnished Kitchen</a></li>
          <li><a href="#">Vehicle and Trailer Parking</a></li>
          <li><a href="#">Fireplace</a></li>
          <li><a href="#">WiFi Internet</a></li>
          </ul>
          <h3>Out Door Area</h3>
          <p>Time to GETAWAY!</p>
          <ul>
          <li><a href="#">Outdoor Firepit</a></li>
          <li><a href="#">Pier/Dock</a></li>
          <li><a href="#">Playground Equipment</a></li>
          <li><a href="#">Outdoor Grill</a></li>
          <li><a href="#">Fish Cleaning House</a></li>
          </ul>
    </div>
    <div id="footerbox2">
      <h3>Unique Features</h3>
      <p>Let us share everything we love about the Cozy Cottage:</p>
      <p>The Cozy Cottage is clean, tidy and comfortable. We give the cottage the same love we give our own home!</p>
      <p>The cottage sleeps up to 10 comfortably, with 2 full-baths. The full-size kitchen provides lots of space.</p>
      <p>Relax in the living room with a gas fireplace, or kickback under the stars by the outdoor fire pit.</p>
      <p>Hoping our renters love the outdoors as much as we do, we feel the cabin is in the prime location to feel away from it all yet in the heart of it all at the same time.</p>
    </div>
    <div id="footerbox3">
       <h3>Things To Do</h3>
       <p>There is always something to do!</p>
       <ul>
       <li>Fishing (direct access to Big St. Germain Lake), Boating, Kayaking, Jet skiing, Sailing, Swimming, Paddle boating, Water skiing / tubing, Wind surfing and MORE!</li>
       <li>Snowmobiling (direct access), ATV / UTV'ing (direct access), Hiking / walking, Cycling, Horseback riding, Waterfalls, Shopping, Antiquing, Farmers markets and much more.</li>
       </ul>
       <p>As owners of Cozy Cottage, we are proud to offer our guests everything we would hope for in a vacation home.</p>
       <p>We are excited to share all  the location and home has to offer with you!</p>
     </div>
     <div id="footerbox4">
       <h3>On Big St. Germain Lake</h3>
       <p>Cozy Cottage is a wonderfully furnished year round home, located on the beautiful shores of Big St. Germain Lake.</p>
       <ul>
       <li><a href="#">Cozy Cottage is located:</a></li>
       <li><a href="#">on Highway C</a></li>
       <li><a href="#">1 mile north of Highway 70</a></li>
       <li><a href="#">Located in Vilas County </a></li>
       <li><a href="#">Fly into Rhineland, WI (RHI)</a></li>
       </ul>
       <p>During the summer months, make the most of your vacation time and stay a week. Off peak-season, treat yourself to a nice long weekend and for those who love the Northwoods as much as we do, feel free to reserve a nice, long stay with us.</p>
      </div>
      <h2 class="clear">&nbsp;</h2>
   </div><!--id="footer"-->
</div><!--<close id="footer-bg">-->

<div style="clear:both"></div>
     
<div id="bottom-bg">
     	<div id="bottom">
        <p class="footer-text">&copy;Copyright 2017 • All Rights Reserved • Cozy Cottage • UP NORTH GETAWAY, LLC.</p>
        <p class="footer-text">8814 Sunrise Shores Circle, St. Germain, WI 54558 &bull; upngetaway@gmail.com • (319) 270-0807</p>
        <p class="footer-text"><a href="http://www.upnorthgetaway.rentals" title="Home Page">Chris &amp; Jody, Owners</a> 
          • <a href="http://www.st-germain.com/" title="St. Germain Chamber of Commerce">Chamber of Commerce</a> • Located on Big St. Germain Lake, St. Germain, WI.</p>
         </div>
</div><!--<close id="bottom-bg">-->
     
     

        
</div><!--<close id="wrapper">-->

</body>



