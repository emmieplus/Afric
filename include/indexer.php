<?php

$sql1="SELECT * FROM center";
$res1 = mysqli_query($conn, $sql1);
if (!$res1)
{
	echo "error ".mysqli_error($conn);
}

//next code
while($row=mysqli_fetch_assoc($res1))
{
	$sound=" ";
	if($row['center_name']!=null)
	{
		$words = explode(" ", $row['center_name']);
		foreach($words as $word)
		{
			$sound.=metaphone($word)." ";
		}
	}
	if($row['center_desc']!=null)
	{
		$words = explode(" ", $row['center_desc']);
		foreach($words as $word)
		{
			$sound.=metaphone($word)." ";
		}
	}
	
	$id = $row['id'];
	$sql2 = "UPDATE center SET indexing='$sound' WHERE id=$id";
	$res2 = mysqli_query($conn, $sql2);
	if(!$res2)
	{
		echo mysqli_error($conn);
	}
}
