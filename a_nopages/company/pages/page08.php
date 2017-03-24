<? include "../lib/header.php"; ?>
<?
//URL 에서 파라미터를 받아넘겨 본사와 지사를 구분하도록 하였습니다.
$tomap = $_GET["tomap"];
?>

<h1 class="page08_title">
    오시는 길
</h1>
<div class="tap_title">
    <ul>
        <a href="../pages/page08.php?tomap=incheon">
            <!-- 파라미터를 받습니다. -->
            <li id="<? if($tomap == "incheon"){ echo"select_map";} ?>">
                인천본사 오시는길        
            </li>
        </a>
        <a href="../pages/page08.php?tomap=gyeonggi">
            <li id="<? if($tomap == "gyeonggi"){ echo"select_map";} ?>">
                경기본사 오시는길
            </li>
        </a>
    </ul>
</div>
<div class="map_address">
    <?
    # 구분값
    if($tomap == "incheon") {           
    ?>
    <div id="map1" style="width:1200px;height:400px;">
        <!--인천본사 영역-->
    </div>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=Ij98E24dY1d0a9ji0gET"></script>
    <script>
        window.onload = incheon();
    </script>
    <script>
        var map = new naver.maps.Map('map1', {
            center: new naver.maps.LatLng(37.4715463, 126.6202098),
            zoom: 11,
            mapTypeId: naver.maps.MapTypeId.NORMAL
        });

        var infowindow = new naver.maps.InfoWindow();

        function onSuccessGeolocation(position) {
            var location = new naver.maps.LatLng(37.4715463, 126.6202098);

            map.setCenter(location); // 얻은 좌표를 지도의 중심으로 설정합니다.
            map.setZoom(10); // 지도의 줌 레벨을 변경합니다.

            infowindow.setContent('<div style="padding:20px; font-size:12px;">' +
                '인천시 중구 항동4가 18-1 <br>' +
        '032-452-0114</div>');

            infowindow.open(map, location);
        }

        function onErrorGeolocation() {
            var center = map.getCenter();

            infowindow.setContent('<div style="padding:20px; font-size:12px;">' +
                '인천광역시 중구 인중로 226 <br>' +
                '032-452-0114</div>');

            infowindow.open(map, center);
        }

        $(window).on("load", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onSuccessGeolocation, onErrorGeolocation);
            } else {
                var center = map.getCenter();

                infowindow.setContent('<div style="padding:20px;"><h5 style="margin-bottom:5px;color:#f00;">Geolocation not supported</h5>' + "latitude: " + center.lat() + "<br />longitude: " + center.lng() + '</div>');
                infowindow.open(map, center);
            }
        });
    </script>
    <?
    } else if($tomap == "gyeonggi") {
    ?>
    <div id="map1" style="width:1200px;height:400px;">
        <!--경기본사 영역-->
    </div>
    <script type="text/javascript" src="https://openapi.map.naver.com/openapi/v3/maps.js?clientId=Ij98E24dY1d0a9ji0gET"></script>
    <script>
        window.onload = incheon();
    </script>
    <script>
        var map = new naver.maps.Map('map1', {
            center: new naver.maps.LatLng(37.2712722, 127.027844),
            zoom: 11,
            mapTypeId: naver.maps.MapTypeId.NORMAL
        });

        var infowindow = new naver.maps.InfoWindow();

        function onSuccessGeolocation(position) {
            var location = new naver.maps.LatLng(37.2712722, 127.027844);

            map.setCenter(location); // 얻은 좌표를 지도의 중심으로 설정합니다.
            map.setZoom(10); // 지도의 줌 레벨을 변경합니다.

            infowindow.setContent('<div style="padding:20px; font-size:12px;">' +
                '경기도 수원시 팔달구 인계동 963 <br>' +
                '031-232-2288</div>');

            infowindow.open(map, location);
        }

        function onErrorGeolocation() {
            var center = map.getCenter();

            infowindow.setContent('<div style="padding:20px; font-size:12px;">' +
                        '경기도 수원시 팔달구 인계동 963 <br>' +
                '031-232-2288</div>');

            infowindow.open(map, center);
        }

        $(window).on("load", function () {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(onSuccessGeolocation, onErrorGeolocation);
            } else {
                var center = map.getCenter();

                infowindow.setContent('<div style="padding:20px;"><h5 style="margin-bottom:5px;color:#f00;">Geolocation not supported</h5>' + "latitude: " + center.lat() + "<br />longitude: " + center.lng() + '</div>');
                infowindow.open(map, center);
            }
        });
    </script>
    <?
    }
    ?>
</div> <!--map_address end-->
<div class="inner_text">    
    <ul>
        <li>
            <span class="inner_text_title">인천본사</span>
            <address class="inner_text_contents">인천광역시 중구 인중로226 (항동4가 18-1번지)</address>
            <span class="inner_text_title">우편번호</span>
            <span class="inner_text_contents">400-034</span>
            <span class="inner_text_title">TEL.</span>
            <span class="inner_text_contents">032)452-0114</span>
        </li>
        <li>
            <span class="inner_text_title">경기본사</span>
            <address class="inner_text_contents">경기도 수원시 팔달구 인계동 963 청수빌딩 2층</address>
            <span class="inner_text_title">우편번호</span>
            <span class="inner_text_contents">442-834</span>
            <span class="inner_text_title">TEL.</span>
            <span class="inner_text_contents">031)232-2288~90</span>
        </li>
    </ul>
</div>
<div class="inner_text_transport">
    <?
    if($tomap == "incheon") {
    ?>
    <ul>
        <li>
            <img src="../img/car.png" alt="차" />
            <div class="transport_text">
                <p>자가용</p>
                <p>
                    인천역에서 하버파크<br />
                    호텔방향 5분(주차장 있음)
                </p>
            </div>
        </li>
        <li>
            <img src="../img/bus.png" alt="버스" />
            <div class="transport_text">
                <p>버스</p>
                <p>
                    15번,28번 중구청 앞 하차<br />
                    하버파크 호텔 옆
                </p>
            </div>
        </li>
        <li>
            <img src="../img/sta.png" alt="전철" />
            <div class="transport_text">
                <p>지하철</p>
                <p>
                    인천역에서 하버파크<br />
                    호텔 방향 도보 10분
                </p>
            </div>
        </li>
    </ul>
    <?
    } else if($tomap == "gyeonggi"){
        //if tomap

    }
    ?>
</div>
<input type="hidden" id="page_num" value="page08" />
<? include "../lib/footer.html"; ?>