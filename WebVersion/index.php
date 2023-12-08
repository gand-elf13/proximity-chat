<?php
include ('BlurModule.php');
include ('GetDistanceModule.php');

$complete = 100;
$partial = 10000;

$db = new PDO('mysql:host=localhost;dbname=id19729685_messages'  ,'id19729685_root','HP&lc2fc1');


$lat = $_POST['latitude'];
$long = $_POST['longitude'];

if (isset($_POST['pseudo']) AND isset($_POST['usermsg']) AND !empty($_POST['pseudo']) AND !empty($_POST['usermsg']) )
{
	$pseudo = htmlspecialchars( $_POST['pseudo']);
	$message = htmlspecialchars( $_POST['usermsg']);
	
	$insertmsg = $db->prepare("INSERT INTO messages(pseudo, message, latitude, longitude) VALUES(?,?,?,?)");
	$insertmsg->execute(array($pseudo, $message, $lat, $long));
};



?>
<link href="./style.css" rel="stylesheet" />

<html>
	<head>
		<title>Proximity Chat</title>
	</head>
	<body>
	   
		
		
		<h1><span class="span-title">Proximity Chat</span></h1>
		<p>This chat is a WIP, for the moment you can chat on it, but it will have some cool functionalities based on your location, stay tuned !!!</p>
		<a href="https://clerical-chock.000webhostapp.com/admin_stuff/admin.php" >le site admin pour ceux qui peuvent</a></br></br>
		

		<form class="input-form" method="post" name="message" action="">
            
            <input name="pseudo" type="text" size="63" placeholder = "PSEUDO" value = "<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
    		<input name="usermsg" type="text" size="63" placeholder = "MESSAGE" /><br />
    		
    		<input name="latitude" type="hidden" id="latitudetemp" value= "" />
	        <input name="longitude" type="hidden" id="longitudetemp" value= "" />
	        
    		<input type="submit" name="submitbtn" value="Send" />
		</form>
		
		
		<form class="reload-form" method="post" id = "reload"  name="status" action="">
            
            <input name="pseudo" type="hidden" size="63" value = "<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
    		
    	   	<input name="latitude" type="hidden" id="test2" value= "" />
	        <input name="longitude" type="hidden" id="test3" value= "" />
	        
		</form>
		 
	    
		<div class="messages-display">
            <?php
            
            $allmsg = $db->query('SELECT * FROM messages ORDER BY id DESC');
            
            if (isset($lat) AND isset($long) AND !empty($lat) AND !empty($long)){
            while($msg = $allmsg->fetch())
            {
            $facteur=0;
            $distance = getDistance ($msg['latitude'], $msg['longitude'], $lat, $long);
            
                if( $distance > $partial){
                
                    $facteur = 1;
                }elseif ($distance < $complete){
                    $facteur = 0;
                
                }else{
                
                    $facteur  = $distance/($partial);
                }
            
            ?>
            <span class="username-message"><?php echo $msg['pseudo']  ?> :</span><span class="text-message"><?php echo " " . blur($msg['message'],$facteur)," (distance -->" ,$distance,")"  ?></span><br />
            
            <?php
            
            }
            }else{
                
                echo "send a message to start chatting, spying on others isn't allowed... (and allow localisation, this is mandatory)";
            }
            ?>
        </div>
		<script>
		    
	        if (navigator.geolocation){
	            
	            
                navigator.geolocation.getCurrentPosition((position) => {
                    
                    
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    
                    var latitudeposttemp = document.getElementById("latitudetemp");
                    latitudeposttemp.value = lat;
                     
                    var longitudeposttemp = document.getElementById("longitudetemp");
                    longitudeposttemp.value = long;
                    
                    
                });
            }
	        
	        
            
            var auto_refresh = setInterval(function() { submitform(); }, 10000);

            function submitform()
            {
            
            if (navigator.geolocation){
	            
	            
                navigator.geolocation.getCurrentPosition((position) => {
                    
                    
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    
                    var latitudepost = document.getElementById("test2");
                    latitudepost.value = lat;
                     
                    var longitudepost = document.getElementById("test3");
                    longitudepost.value = long;
                    
                    document.getElementById("reload").submit();
                    
                });
            }
            
            }
            
            
	    </script>
	    


	</body>
</html>
