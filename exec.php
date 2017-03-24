<?
exec('git pull newvid master' , $output , $error );


foreach ( $output as $k => $v )
{
	echo '<br>' . $k . ' : ' . $v;
}

?>