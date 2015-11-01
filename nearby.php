<?php
session_start();
$wherenow=1;
?> <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <title>周边出租 - E租时代</title>
<?php
include 'templete\header.html';
?>
<body onload="mapInit();">  
<link rel="stylesheet" href="style/css/nearby.css">
<script language="javascript" src="http://webapi.amap.com/maps?v=1.3&key=8015e3d5c058d640668f79faafef1e6f"></script>
<div class="blank"></div>
<div class="fl wfs bcf7" style="padding-bottom:20px;">
        <div class="regist-process-wrapper">
            <div class="nearby-process-body fl wfs">

<script language="javascript">
var mapObj;
var marker = new Array();
var windowsArr = new Array();
//基本地图加载
function mapInit() {   
    mapObj = new AMap.Map("iCenter",{ 
        view: new AMap.View2D({
        zoom:8
        })});
    searchkey("");     
}
//周边检索函数     
function cloudSearch(ncity,skey) {
	mapObj.clearMap();
    var arr = new Array();   
    var search;
    var searchOptions = {
        keywords:skey,
        orderBy:'_id:ASC'
    };
    //加载CloudDataSearch服务插件
    mapObj.plugin(["AMap.CloudDataSearch"], function() {       
        search = new AMap.CloudDataSearch('548fbe84e4b0d0b861454b2c', searchOptions); //构造云数据检索类
        AMap.event.addListener(search, "complete", cloudSearch_CallBack); //查询成功时的回调函数
        AMap.event.addListener(search, "error", errorInfo); //查询失败时的回调函数
            //获取用户所在城市信息
        search.searchByDistrict(ncity); //行政区划检索
    });
}
//添加marker和infowindow   
function addmarker(i, d) {
    var lngX = d._location.getLng();
    var latY = d._location.getLat();
    var markerOption = {
        map:mapObj,
        icon:"http://api.amap.com/Public/images/js/yun_marker.png", 
        position:new AMap.LngLat(lngX, latY)  
    };            
    var mar = new AMap.Marker(markerOption);  
    marker.push(new AMap.LngLat(lngX, latY));

    var infoWindow = new AMap.InfoWindow({
        content:"<h3><font face=\"微软雅黑\"color=\"#3366FF\">"+(i+1) + "."+ d._name +"</font></h3><img src='upload/"+ d.img +"' width='280' /><hr />地址："+ d._address + "<br />" + "价格：" + d.money+ "元/天",
        size:new AMap.Size(300, 0),
        autoMove:true,
        offset:new AMap.Pixel(0,-30)
    });  
    windowsArr.push(infoWindow);   
    var aa = function(){infoWindow.open(mapObj, mar.getPosition());};  
    AMap.event.addListener(mar, "click", aa);  
}
/*
 *获取用户所在城市信息
 */	
function searchkey(skey) { 
AMap.service(["AMap.CitySearch"], function() {
		//实例化城市查询类
		var citysearch = new AMap.CitySearch();
		//自动获取用户IP，返回当前城市
		citysearch.getLocalCity(function(status, result){
			if(status === 'complete' && result.info === 'OK'){
				if(result && result.city && result.bounds) {
					var cityinfo = result.city;
					var citybounds = result.bounds;
                    cloudSearch(cityinfo,skey);
				}
			}else{
                cloudSearch(result.info,skey);
			}
		});
	});
}
function searchbutton(){
    searchkey(document.getElementById("searchinfo").value);
}
//回调函数 
function cloudSearch_CallBack(data) { 
    var resultStr="";
    var resultArr = data.datas;
    var resultNum = resultArr.length;  
    for (var i = 0; i < resultNum; i++) {  
        resultStr += "<div id='divid" + (i+1) + "' onmouseover='openMarkerTipById1(" + i + ",this)' onmouseout='onmouseout_MarkerStyle(" + (i+1) + ",this)' style=\"font-size: 12px;cursor:pointer;padding:2px 0 4px 2px; border-bottom:1px solid #C1FFC1;\"><table><tr><td><h3><font face=\"微软雅黑\"color=\"#3366FF\">" + (i+1) + "." + resultArr[i]._name + "</font></h3>";
        resultStr += '地址：' + resultArr[i]._address + '<br/>价格：' + resultArr[i].money + '元/天</td></tr></table></div>';
        addmarker(i, resultArr[i]);
    }
    mapObj.setFitView();
    document.getElementById("result").innerHTML = resultStr;
} 
//回调函数
function errorInfo(data) {
    resultStr = data.info;
    document.getElementById("result").innerHTML = resultStr;
}
//根据id打开搜索结果点tip
function openMarkerTipById1(pointid,thiss){    
    thiss.style.background='#CAE1FF';  
   windowsArr[pointid].open(mapObj, marker[pointid]);      
}  
//鼠标移开后点样式恢复
function onmouseout_MarkerStyle(pointid,thiss) {   
   thiss.style.background="";  
}
</script>  
<input class="form-control" id='searchinfo' type="text" value="" style="width:400px;margin-bottom:10px;margin-left:350px;float:left;"/>
<a class="btn btn-info" href="javascript:searchbutton()" style="margin-left:15px;">搜索</a>

    <div id="iCenter"></div>
    <div class="demo_box">
        <div id="r_title"><b>周边检索结果:</b></div>
        <div id="result"> </div>
    </div>        
 </div> </div>
            
        </div>
    
<div class="blank"></div>

     <div class="cover-page-index fl wfs bcf2" style="padding-top:20px;">
        <div class="cover-page-wrapper">
<?php
include 'templete/footer.html';
?>

 
</body>
</html>					

	