<?php

$complete = 5;
$partial = 1000;

$db = new PDO('mysql:host=localhost;dbname=id19729685_messages'  ,'id19729685_root','HP&lc2fc1');

if (isset($_POST['pseudo']) AND isset($_POST['usermsg']) AND !empty($_POST['pseudo']) AND !empty($_POST['usermsg']) )
{
	$pseudo = htmlspecialchars( $_POST['pseudo']);
	$message = htmlspecialchars( $_POST['usermsg']);
	
    $lat = $_POST['latitude'];
	$long = $_POST['longitude'];
	
	$insertmsg = $db->prepare("INSERT INTO messages(pseudo, message, latitude, longitude) VALUES(?,?,?,?)");
	$insertmsg->execute(array($pseudo, $message, $lat, $long));

	
}

?>


<html>
	<head>
		<title>Proximity Chat</title>
	</head>
	<body>
	   
		
		
		<h1>Proximity Chat</h1>
		<?php if(isset($latidude)) { echo $latidude; } ?>
		<p>This chat is a WIP, for the moment you can chat on it, but it will have some cool functionalities based on your location, stay tuned !!!</p>
		

		<form method="post" name="message" action="">
    		<input name="pseudo" type="text" size="63" placeholder = "PSEUDO" value = "<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
    		<input name="usermsg" type="text" size="63" placeholder = "MESSAGE" /><br />
    		
    		<input name="latitude" type="text" id="latitude" value= "<?php if(isset($lat)) { echo $lat; } ?> "/>
	        <input name="longitude" type="text" id="longitude" value= "<?php if(isset($long)) { echo $long; } ?>" />
    		
    		<input type="submit" value="Send" />
		</form>
		 
	    
		
        <?php
        
        $allmsg = $db->query('SELECT * FROM messages ORDER BY id DESC');
        
        
        while($msg = $allmsg->fetch())
        {
        
        
        
        ?>
        <b><?php echo $msg['pseudo']  ?> : </b><?php echo $msg['message'], " (latitude --> ",$msg['latitude']," longitude --> ",$msg['longitude'],')'  ?><br />
        
        <?php
        }
        ?>

		<script>
		    if (navigator.geolocation){
       
                navigator.geolocation.getCurrentPosition((position) => {
            
                    let lat = position.coords.latitude;
                    let long = position.coords.longitude;
                    
                    var latitudepost = document.getElementById("latitude");
                    latitudepost.value = lat;
                     
                    var longitudepost = document.getElementById("longitude");
                    longitudepost.value = long;
                    
                });
		    }
	    </script>
	</body>
</html>
