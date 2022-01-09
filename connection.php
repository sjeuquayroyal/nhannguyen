<?php
$conn = pg_connect("postgres://yqbsobfmlxblon:a1ecf49376b3ffeb6e9597cf0184b865399730371f31e39466dd72af6c4a753a@ec2-44-194-6-121.compute-1.amazonaws.com:5432/d6obfl9nkprucu");
	echo 'Connected Successfully!!!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>