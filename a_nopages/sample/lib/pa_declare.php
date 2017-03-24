<meta charset="utf-8">
<? 
    //���� ������ ���� ����
    $page=$_GET["page"];
    $mod=$_GET["mod"];

    if($user_site_level=="1"){
        $user_site_level = "일반회원";
    } else if ($user_site_level == "2"){
        $user_site_level = "시스템관리자";
    }


	if($page=="page1"){
		$hover_css = "page1_link_hover";
	}
?>