<div>
		
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
<b><?php echo $msg['pseudo']  ?> : </b><?php echo blur($msg['message'],$facteur)," (distance -->" ,$distance,")"  ?><br />
        
<?php
        
}
}else{
            
    echo "send a message to start chatting, spying on others isn't allowed... (and allow localisation, this is mandatory)";
}
?>
</div>