<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <link rel="stylesheet" href="../css/login_form.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/user_check.js" type="text/javascript" charset="utf-8"></script>    
</head>
<body>
    <div class="wrap">
        <form action="user_add_check.php?mod=insert_confirm" method="post" name="user_add_form">
            <table class="login_form_table">
                <tr>
                    <th>이름</th>
                    <td>
                        <input type="text" name="name" id="name" value="" />
                    </td>
                </tr>
                <tr>
                    <th>아이디</th>
                    <td>
                        <input type="text" name="id" value="" id="id"/>
                        <input type="button" value="중복확인" id="id_check"/>
                        <span id="id_result">아이디는 영문 4자 이상으로 입력 해주세요.</span>
                        <script>
                             $('#id_check').click(function(){
                             var $id = $('#id').val();
                             if($id == ""){
                                $('#id_result').html("아이디를 입력 해주세요.");                                  
                                } else {
                                    $.ajax({ //ajax 아이디 체크 시작
                                        url:'user_add_check.php?mod=id_search&id='+$id,
                                        success:function(data){                                   
                                            $('#id_result').html(data);  
                                        }                                                                 
                                    }) //ajax 아이디체크 끝
                                }
                            })
                        </script>
                    </td>
                </tr>                
                <tr>
                    <th>비밀번호</th>
                    <td>
                        <input type="password" name="pass" id="pass" value="" />
                        <span id="pass_ok"></span>
                        <script>
                             $('#pass').keyup(function(){
                             var $pass = $('#pass').val();

                             if(!$pass.match(/([a-zA-Z0-9].*[!,@,#,$,%,^,&,*,?,_,~])|([!,@,#,$,%,^,&,*,?,_,~].*[a-zA-Z0-9])/) || $pass.length < 6){
                                $('#pass_ok').html("비밀번호는 6자 이상 영문+숫자+특수문자 조합으로 입력해주세요.");
                             } else {
                                $('#pass_ok').html("");
                             } 
                             })                           
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>비밀번호 확인</th>
                    <td>
                        <input type="password" name="pass" id="pass_confirm" value="" />
                        <span id="pass_result"></span>                        
                        <script>
                             $('#pass_confirm').keyup(function(){
                             var $pass = $('#pass').val();
                             var $pass_confirm = $('#pass_confirm').val();

                             if($pass != $pass_confirm){
                                  $('#pass_result').css("color","red"); 
                                  $('#pass_result').html("비밀번호가 일치하지 않습니다.");                                  
                              } else {
                                  $('#pass_result').css("color","blue"); 
                                  $('#pass_result').html("비밀번호 확인");
                                  $('#pass_result').append("<input type='hidden' id='hiddenpass' value='ok'>");    
                              }
                             })                           
                        </script>
                    </td>                    
                </tr>
                <tr>
                    <th>회사</th>
                    <td>
                        <input type="text" name="company" id="company" value="" />
                    </td>
                </tr>
                <tr>
                    <th>부서</th>
                    <td>
                        <input type="text" name="buse" id="buse" value="" />
                    </td>
                </tr>
                <tr>
                    <th>직급</th>
                    <td>
                        <select name="level">
                            <option value="8">사장</option>
                            <option value="7">본부장</option>
                            <option value="6">국장</option>
                            <option value="5">부장</option>
                            <option value="4">차장</option>
                            <option value="3">과장</option>
                            <option value="2">대리</option>
                            <option value="1">사원</option>                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>시스템관리</th>
                    <td>
                        <select name="web_level">
                            <option value="1">일반회원</option>
                            <option value="2">시스템관리자</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>핸드폰번호</th>
                    <td>
                        <input type="text" name="hp" value="" id="hp" placeholder="ex)010-0000-0000"/>
                    </td>
                </tr>
                <tr>
                    <th>내선번호</th>
                    <td>
                        <input type="text" name="cp" value="" id="cp" placeholder="ex)02-0000-0000"/>
                    </td>
                </tr>
                <tr>
                    <th>이메일</th>
                    <td>
                        <input type="text" name="email" value="" id="email" placeholder="master@paper.com"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        
                    </td>
                    <td>
                        <input type="button" value="제출" onclick="user_add();"/>
                        <input type="reset" value="다시작성" />
                    </td>
                </tr>
            </table>
        </form>
        <pre>
            화면의 모든 항목은 필수항목입니다.
            관리자 승인 후 이용 할수있습니다.
            가입 승인은 시스템 관리자에게 문의하십시오.
        </pre>
    </div>
</body>
</html>