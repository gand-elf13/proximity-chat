<?php
include ('BlurModule.php');
include ('GetDistanceModule.php');


// add to input texts (autocomplete="off") to avoid keeping track of the sent messages
// change webscript.js to keep focusing on correct input element, to better the UX
// change the body's background to (linear-gradient(#605e7b, #4c4b6b) fixed no-repeat)
// copy the javascript script to the one stored in the server


$completeMessage = 100;
$partialMessage = 10000;
$receiveMessage = 15000;

$db = new PDO('mysql:host=localhost;dbname=id19729685_messages'  ,'id19729685_root','HP&lc2fc1');


if (isset($_POST['latitude']) AND isset($_POST['longitude']) AND !empty($_POST['latitude']) AND !empty($_POST['longitude']) )
{
    $lat = $_POST['latitude'];
    $long = $_POST['longitude'];
}


if (isset($_POST['pseudo']) AND isset($_POST['usermsg']) AND !empty($_POST['pseudo']) AND !empty($_POST['usermsg']) )
{
	$username = htmlspecialchars( $_POST['pseudo']);
	$message = htmlspecialchars( $_POST['usermsg']);
	
	if (isset($_POST['latitude']) AND isset($_POST['longitude']) AND !empty($_POST['latitude']) AND !empty($_POST['longitude']))
	{
    		$insertmsg = $db->prepare("INSERT INTO messages(pseudo, message, latitude, longitude) VALUES(?,?,?,?)");
    		$insertmsg->execute(array($username, $message, $lat, $long));
	}
}
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Proximity Chat</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        	<link href="./stylesheet.css" rel="stylesheet" />
	</head>
	<body>
		<h1><span class="span-title">Proximity Chat</span></h1>
		<p>This chat is a WIP, for the moment you can chat on it, but it will have some cool functionalities based on your location, stay tuned !!!</p>
		<a href="https://clerical-chock.000webhostapp.com/admin_stuff/admin.php" >le site admin pour ceux qui peuvent</a></br>
		<a href="https://www.poemes.co/le-galet.html" >poeme du galet.</a></br></br>
		

		<form class="input-form" method="post" name="message" action="">
            
		<input id="username-input" name="pseudo" type="text" size="63" placeholder = "PSEUDO" value = "<?php if(isset($username)) { echo $username; } ?>" /><br />
    		<input id="message-input" name="usermsg" type="text" size="63" placeholder = "MESSAGE"  value  = "" /><br />
    		
    		<input name="latitude" type="hidden" id="latitudetemp" value= "" />
	        <input name="longitude" type="hidden" id="longitudetemp" value= "" />
	        
    		<input id="send-button" type="submit" name="submitbtn" value="Send" />
		</form>
		
		
		<form class="reload-form" method="post" id = "reload"  name="status" action="">
            
		<input name="pseudo" type="hidden" size="63" value = "<?php if(isset($username)) { echo $username; } ?>" /><br />
    		
    	   	<input name="latitude" type="hidden" id="test2" value= "" />
	        <input name="longitude" type="hidden" id="test3" value= "" />
	        
		</form>
		 
	    
		<div class="messages-display">
            <?php
            
            $allmsg = $db->query('SELECT * FROM messages ORDER BY id DESC');
            
            if (isset($lat) AND isset($long) AND !empty($lat) AND !empty($long))
            {
                while($msg = $allmsg->fetch())
                {
                    $factor = 0;
                    $distance = getDistance($msg['latitude'], $msg['longitude'], $lat, $long);
                    
                        if ($distance > $receiveMessage)
                        {
                            continue;
                        }
                        
                        if ($distance > $partialMessage)
                        {
                            $factor = 1;
                        }
                        
                        elseif ($distance < $completeMessage)
                        {
                            $factor = 0;
                        }
                        
                        else
                        {
                            $factor = $distance / $partialMessage;
                        }
                    
                    ?>
                    <span class="username">
                        <?php echo $msg['pseudo']  ?> :
                    </span>
                    
                    <span class="text-message">
                        <?php echo " " . blur($msg['message'],$factor)?>
                    </span>
                    
                    <span class="distance">
                        <?php echo " (",$distance,")"?>
                    </span><br/>
                    <?php
                
                }
            }
            else
            {
                
                echo "send a message to start chatting, spying on others isn't allowed... (and allow localisation, this is mandatory) AND do not spam otherwise the site will be broken for you and you'll have no friend :(";
            }
            ?>
        </div>
	    <script src="webscript.js"></script>
	</body>
</html>
