<?php
include ('BlurModule.php');
include ('GetDistanceModule.php');

$complete = 100;
$partial = 10000;

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
		<a href="https://clerical-chock.000webhostapp.com/admin_stuff/admin.php" >le site admin pour ceux qui peuvent</a>
		

		<form method="post" name="message" action="">
    		<input name="pseudo" type="text" size="63" placeholder = "PSEUDO" value = "<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
    		<input name="usermsg" type="text" size="63" placeholder = "MESSAGE" /><br />
    		
    		<input name="latitude" type="hidden" id="latitude" value= "" />
	        <input name="longitude" type="hidden" id="longitude" value= "" />
	        
    		<input type="submit" value="Send" />
		</form>
		 
	    
		
        <?php
        
        $allmsg = $db->query('SELECT * FROM messages ORDER BY id DESC');
        
        if (isset($lat) AND isset($long)){
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
        <b><?php echo $msg['pseudo']  ?> : </b><?php echo blur($msg['message'],$facteur),$facteur," (distance -->" ,$distance,")"  ?><br />
        
        <?php
        
        }
        }else{
            
            echo "send a message to start chatting, spying on others isn't allowed...";
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
