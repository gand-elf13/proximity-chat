<?php

$db = new PDO('mysql:host=localhost;dbname=id19729685_messages'  ,'id19729685_root','HP&lc2fc1');

if (isset($_POST['pseudo']) AND isset($_POST['usermsg']) AND !empty($_POST['pseudo']) AND !empty($_POST['usermsg']) )
{
	$pseudo = htmlspecialchars( $_POST['pseudo']);
	$message = htmlspecialchars( $_POST['usermsg']);

	$insertmsg = $db->prepare("INSERT INTO messages(pseudo, message) VALUES(?,?)");
	$insertmsg->execute(array($pseudo, $message));

	
}

?>


<html>
	<head>
		<title>Proximity Chat</title>
	</head>
	<body>
		<h1>Proximity Chat</h1>
		<p>This chat is a WIP, for the moment you can chat on it, but it will have some cool functionalities based on your location, stay tuned !!!</p>

		<form method="post" name="message" action="">
    		<input id="username_input" name="pseudo" type="text" size="63" placeholder = "PSEUDO" value = "<?php if(isset($pseudo)) { echo $pseudo; } ?>" /><br />
    		<input id="message_input" name="usermsg" type="text" size="63" placeholder = "MESSAGE" /><br />
    		<input type="submit" value="Send" />
		</form>

		getlocation()
        <?php
        $allmsg = $db->query('SELECT * FROM messages ORDER BY id DESC');
        
        
        while($msg = $allmsg->fetch())
        {
        
        ?>
        <b><?php echo $msg['pseudo']  ?> : </b><?php echo $msg['message']  ?><br />
        
        <?php
        
        }
        ?>

		<script src='./script.js'>   <script/>
	</body>
</html>
