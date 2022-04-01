<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #mapwrap {
            position: relative;
            overflow: hidden;
            width: 1140px;
            height: 600px;
            margin: 0px auto;
        }
        .mapTitle{
            padding-top: 200px;
            margin: 0 auto;
            height: 100px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
        }
        .categorys,
        .categorys * {
            margin: 0;
            padding: 0;
            color: #000;
        }

        .categorys {
            position: absolute;
            overflow: hidden;
            top: 10px;
            left: 10px;
            height: 50px;
            z-index: 10;
            border: 1px solid black;
            font-family: 'Malgun Gothic', '맑은 고딕', sans-serif;
            font-size: 12px;
            text-align: center;
            background-color: #fff;
        }

        .categorys .menu_selected {
            background: #f9ffa5;
        }

        .categorys li {
            list-style: none;
            float: left;
            height: 50px;
            padding-top: 5px;
            cursor: pointer;
            border-bottom: 2px solid #000;
            border-right: 2px solid #000;
        }

        .categorys .ico_comm {
            display: block;
            margin: 0 auto 2px;
            width: 22px;
            height: 26px;
        }

        .categorys .pharmacy {
            background: url('../asset/img/pharmacy.png') ;
            background-size: 24px;
        }
        
        .categorys .hospital {
            background: url('../asset/img/hospital.png') ;
            background-size: 24px;
        }
        #mapInfo {
            margin: 0 auto;
            height: 350px;
            width: 1140px;
            margin-top: 100px;
            display:flex;
        }
        .infoImg {
            background: url('../asset/img/main/main01.png');
            height: 350px;
            width: 300px;
        }
        #mapInfo table {
            width: 840px;
            line-height: 3;
            font-size: 24px;
            margin-left: 30px;
        }
        #mapInfo table tbody tr{
           justify-content: space-between;
        }
    </style>
</head>
<body>
    <!-- skip -->
    <?php
        include "../include/skip.php";
    ?>
    <!-- //skip -->

    <!-- header -->
    <?php
        include "../include/style.php";
    ?>
    <!-- //header -->
    <main>
        <?php
            include "../include/header.php" 
        ?>
        <div class="mapTitle">내 근처 동물병원,약국 찾기</div>
        <div id="mapwrap">
            <!-- 지도가 표시될 div -->
            <div id="map" style="width:1140px;height:600px;"></div>
            <!-- 지도 위에 표시될 마커 카테고리 -->
            <div class="categorys">
                <ul>
                    <li id="phaMenu" onclick="changeMarker('pha')">
                        <span class="ico_comm pharmacy"></span>
                        동물약국
                    </li>
                    <li id="hosMenu" onclick="changeMarker('hos')">
                        <span class="ico_comm hospital"></span>
                        동물병원
                    </li>
                </ul>
            </div>
        </div>
        <div id="mapInfo">
            <div class="infoImg"></div>
            <table  class="infoList1">
                <tbody>

                </tbody>
            </table>
        </div>
        <div id="mapInfo">
            <div class="infoImg"></div>
            <table  class="infoList2">
                <tbody>

                </tbody>
            </table>
        </div>
        <?php
            include "../include/footer.php" 
        ?>
    </main>
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=9072a8bb4b56b5b44afb6d6d37a0b2e7"></script>
	<script>
        const authKey = "1d070a748c594769afd68d31bcb3c6ff";
        const phaUrls = "https://openapi.gg.go.kr/AnimalPharmacy";
        const hosUrls = "https://openapi.gg.go.kr/Animalhosptl";
        const city = 41270;
		let phaDatas = [];
		let hosDatas = [];
        let hosMarker = [];
        let phaMarker = [];
        let phaNames = [];
        let hosNames = [];
        var container = document.getElementById('map');
		var options = {
			center: new kakao.maps.LatLng(37.3183169898, 126.8352),
			level: 3
		};
        
		var map = new kakao.maps.Map(container, options);
        $.ajax({
            url: phaUrls+"?KEY="+authKey+"&Type=JSON&SIGUN_CD="+city,
            type: "GET",
            async:false,
        }).done(function(data) {
            data = JSON.parse(data)
            for (let i of data.AnimalPharmacy[1].row){
                phaDatas.push({
                    LOGT : i.REFINE_WGS84_LOGT,
                    LAT : i.REFINE_WGS84_LAT,
                    name : i.BIZPLC_NM
                })
            }
            for (let i = 0; i < phaDatas.length; i++) {
                phaNames.push(phaDatas[i].name)
                phaMarker.push(new kakao.maps.LatLng(Number(phaDatas[i].LAT), Number(phaDatas[i].LOGT)))
            }
        });
        $.ajax({
            url: hosUrls+"?KEY="+authKey+"&Type=JSON&SIGUN_CD="+city,
            type: "GET",
            async:false,
        }).done(function(data) {
            data = JSON.parse(data)
            for (let i of data.Animalhosptl[1].row){
                hosDatas.push({
                    LOGT : i.REFINE_WGS84_LOGT,
                    LAT : i.REFINE_WGS84_LAT,
                    name : i.BIZPLC_NM
                })
                
            }
            for (let i = 0; i < hosDatas.length; i++) {
                hosNames.push(hosDatas[i].name)
                hosMarker.push(new kakao.maps.LatLng(hosDatas[i].LAT, hosDatas[i].LOGT))
            }
        });
        var hosImg = "../asset/img/hospital.png"
        var phaImg = "../asset/img/pharmacy.png"
        var table = "";
        for (var i = 0; i < 5; i++){
            table += "<tr>";
            table += "<td>" + phaNames[i] + "</td>";
            table += "<td>" + phaDatas[i] + "</td>";
            table += "<td><a href='#'>자세히</a></td>"; 
            table += "</tr>";
        }
        document.querySelector(".infoList1").innerHTML = table;
        table = "";
        for (var i = 0; i < 5; i++){
            table += "<tr>";
            table += "<td>" + hosNames[i] + "</td>";
            table += "<td>" + hosDatas[i] + "</td>";
            table += "<td><a href='#'>자세히</a></td>"; 
            table += "</tr>";
        }
        document.querySelector(".infoList2").innerHTML = table;

        var PM = [], // 동물약국 마커 객체를 가지고 있을 배열입니다
            HM = []; // 동물병원 마커 객체를 가지고 있을 배열입니다
        var markerImageSrc = 'https://t1.daumcdn.net/localimg/localimages/07/mapapidoc/category.png'
        createPhaMarker(); 
        createHosMarker(); 
        function createMarker(position, image) {
            var marker = new kakao.maps.Marker({
                position: position,
                image: image
            });

            return marker;
        }

        function createMarkerImage(src, size, options) {
            var markerImage = new kakao.maps.MarkerImage(src, size, options);
            return markerImage;
        }

        function createPhaMarker() {
            for (var i = 0; i < phaMarker.length; i++) {

                var imageSize = new kakao.maps.Size(36, 36),
                    imageOptions = {
                        spriteOrigin: new kakao.maps.Point(0, 0),
                        spriteSize: new kakao.maps.Size(30, 30)
                    };

                // 마커이미지와 마커를 생성합니다
                var markerImage = createMarkerImage(phaImg, imageSize, imageOptions),
                    marker = createMarker(phaMarker[i], markerImage);
                // 생성된 마커를 동물약국 마커 배열에 추가합니다
                PM.push(marker);
            }
        }

        function setHos(map) {
            for (var i = 0; i < hosMarker.length; i++) {
                HM[i].setMap(map);
            }
        }

        function createHosMarker() {
            for (var i = 0; i < hosMarker.length; i++) {

                var imageSize = new kakao.maps.Size(36, 36),
                    imageOptions = {
                        spriteOrigin: new kakao.maps.Point(0, 0),
                        spriteSize: new kakao.maps.Size(30, 30)
                    };

                // 마커이미지와 마커를 생성합니다
                var markerImage = createMarkerImage(hosImg, imageSize, imageOptions),
                    marker = createMarker(hosMarker[i], markerImage);

                // 생성된 마커를 동물병원 마커 배열에 추가합니다
                HM.push(marker);
            }
        }

        function setPha(map) {
            for (var i = 0; i < phaMarker.length; i++) {
                PM[i].setMap(map);
            }
        }

        function changeMarker(type) {

            var phaMenu = document.getElementById('phaMenu');
            var hosMenu = document.getElementById('hosMenu');


            // 동물약국 카테고리가 클릭됐을 때
            if (type === 'pha') {

                // 동물약국 카테고리를 선택된 스타일로 변경하고 나머진 x로
                phaMenu.className = 'menu_selected';
                hosMenu.className = '';


                // 동물약국 마커들만 지도에 표시하도록 설정합니다
                setPha(map);
                setHos(null);

            } else { // 동물병원 카테고리가 클릭됐을 때

                // 동물병원 카테고리를 선택된 스타일로 변경하고
                phaMenu.className = '';
                hosMenu.className = 'menu_selected';

                // 동물병원 마커들만 지도에 표시하도록 설정합니다
                setPha(null);
                setHos(map);

            }
        }

        // function getDistanceFromLatLonInKm(lat1,lng1,lat2,lng2) { 
        //     function deg2rad(deg) { return deg * (Math.PI/180) } var R = 6371; // Radius of the earth in km 
        //     var dLat = deg2rad(lat2-lat1); // deg2rad below 
        //     var dLon = deg2rad(lng2-lng1); var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2); var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); var d = R * c; // Distance in km 
        //     return d; 
        // }
        var lat = 0;
        var long = 0;
        // $(function() {        
        // // Geolocation API에 액세스할 수 있는지를 확인
        // if (navigator.geolocation) {
        //     //위치 정보를 얻기
        //     navigator.geolocation.getCurrentPosition (function(pos) {
        //         alert("test")
        //         $('#latitude').html(pos.coords.latitude);     // 위도
        //         $('#longitude').html(pos.coords.longitude); // 경도
        //     });
        // } else {
        //     alert("이 브라우저에서는 Geolocation이 지원되지 않습니다.")
        // }
        // });


	</script>
</body>
</html>