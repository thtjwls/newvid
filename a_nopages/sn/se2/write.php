<? 
$writeMod = $_GET["modWrite"];
?>
<div class="contentsBox_div list_setup_div one_page_div_setup notice_setup write_form write_form_div_setup">
    <h3>
        Write Form
    </h3>
    <form action="" method="post"  id="mod_write_page_form">
        <select name="cate_select" id="se_write_cate_id">
            <option>IT_HELPDESK</option>
            <option>SERVER</option>
            <option>NETWORK</option>
            <option>SI/SM</option>
        </select>
        <input type="text" value="" placeholder="SUBJECT" name="se_write_subject" id="se_write_subject_id"/>        
        <textarea name="ir1" id="ir1" rows="10" cols="100" style="width:100%; height:600px;display:none;"></textarea>
        <input type="button" value="완료" onclick="" id="write_form_submit_btn"/>
        <input type="hidden" value="<?=$writeMod?>" id="write_mod_set"/>
    </form>    
</div>

<script type="text/javascript" src="/sn/se2/js/HuskyEZCreator.js" charset="utf-8"></script>
    <script type="text/javascript">
var oEditors = [];

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/sn/se2/SmartEditor2Skin.html",
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : false,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : false,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		}
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});

function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["ir1"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["ir1"].getIR();
	alert(sHTML);
}

function submitContents(elClickedObj) {
	oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);	// 에디터의 내용이 textarea에 적용됩니다.

	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.

	try {
		elClickedObj.form.submit();
	} catch(e) {}
}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}
    </script>