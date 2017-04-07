<article class="contents">
    <div class="lose_container clearfix">
        <div class="id_lose_wrap box-left box">
            <p class="box-caption">아이디 찾기</p>
            <form action="">
                <div class="form-input-group">
                    <input type="text" name="name" placeholder="이름">
                    <input type="tel" name="tel" placeholder="전화번호">
                </div>
                <div class="form-actions">
                    <input type="submit" value="아이디찾기">
                </div>
            </form>
        </div>
        <div class="pass_lose_wrap box-right box">
            <p class="box-caption">비밀번호 찾기</p>
            <form action="">
                <div class="form-input-group">
                    <input type="text" name="id" placeholder="ID">
                    <input type="text" name="name" placeholder="이름">
                    <input type="email" name="email" placeholder="EMAIL">
                </div>
                <div class="form-actions">
                    <input type="submit" value="비밀번호찾기">
                </div>
            </form>
        </div>
    </div>
</article>
<style>
    .lose_container { width:100%; padding-top:20%;}
    .lose_container > .box { border:1px solid #B1B1B1; width:50%; height:500px; }
    .lose_container > .box-left { float:left; border-right:0; }
    .lose_container > .box-right { float:right; }
    .lose_container > .box .box-caption { font-size:18px; padding:8px 12px; }
    .lose_container > .box .form-input-group { height:300px; text-align: center; margin-bottom:90px;}
    .lose_container > .box .form-input-group input { width:80%; border:0; border-bottom:1px solid #B1B1B1; padding:8px 12px; margin:30px auto; font-size:18px;}
    .lose_container > .box .form-actions { width:80%; margin:auto;}
    .lose_container > .box .form-actions input { width:100%; border:0; background-color:#3598dc; color:#FFF; padding:12px 0; font-size:18px; cursor: pointer;}
    .lose_container > .box .form-actions input:hover { background-color:#ff2c2c; }
    .lose_container > .box .form-input-group input:focus { background-color:#E2E2E2; }
</style>