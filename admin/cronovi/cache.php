<?php

if(!($con = ssh2_connect("91.121.59.221", "22"))) return $jezik['text292'];
else 
{
	if(!ssh2_auth_password($con, "root", "Bog1atiisiromasni300")) return $jezik['text293'];
	else 
	{	
		$stream = ssh2_shell($con, 'xterm');
		fwrite( $stream, "nice -n 19 rm -Rf /var/cache\n");
		sleep(4);
		fwrite( $stream, "mkdir /var/cache\n");
		sleep(1);
		
		$data = "";
		
		while($line = fgets($stream)) 
		{
			$data .= $line;
		}
	}
}	

?>
