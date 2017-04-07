<?

session_start();
include"connection.php";
include"config.php";
include "function.php";
include "lib.php";

if(!$login_id)
{
	move_url('../index.php');
}

$login=$login_id;

echo("
<html>
	<head>
		<style>
			table,td,tr,BODY,input,DIV,form,TEXTAREA,center,option,pre,blockquote {font-size:9pt; font-family:tahoma,verdana,굴림; color:black}
			SELECT{font-size:9pt;}
			A:link    {color:blue;text-decoration:none;}
			A:visited {color:blue;text-decoration:none;}
			A:active  {color:blue;text-decoration:none;}
			A:hover  {color:red;text-decoration:underline}

			.input {border:solid 1;background-color:white;}
			.submit {border:solid 1 black;font-family:Tahoma,Verdana;font-size:9pt;color:white;background-color:black; height=18px}
			.submit2 {border:solid 1 #88c4ff;font-family:Tahoma,Verdana;font-size:9pt;color:black;background-color:#88c4ff; height=18px}
		</style>
	</head>
<body>
");

	$log_dir = "log_usr";
	if(!($tp=opendir($log_dir))) die("$log_dir 폴더를 열 수 없습니다.");
	while($t_file = readdir($tp))
	$t_filenames[]= $t_file;

	for($i=0; $i<count($t_filenames); $i++)
	{
		$t_del=$t_filenames[$i];
		if($t_del != '.' && $t_del != '..')
		{
			if(is_file("$log_dir/$t_filenames[$i]"))
			{
				$temp= "$log_dir/$t_filenames[$i]";
				$src_name = explode(".", $t_filenames[$i]); 
				if($src_name[0]==$login)
				{
					if(!unlink("$temp")) 
					{
						die("파일을(를) 삭제할 수 없습니다!");
					}
				}
			}
		}
	}
		session_destroy();
		move_url('../../approve.php');
		exit;
echo("
</body>
</html>
");
?>