<?php
$conn = pg_connect("postgres://bwwebqyeqnuugw:eed7837631d4aa6133b13283c03d87c4efe28460a8289ccb8db36cd89c592d73@ec2-44-197-88-60.compute-1.amazonaws.com:5432/dan38kdkl6ql4a");
	echo 'Connected Successfully!!!';
	if(!$conn)
	{
		die("Could not connect to database");
    }
    ?>