/* var data = [["listing-detail-1.html", 
              "assets/images/listing_img6.jpg",
			  "The Morning Hotel",
			  "3112 NW Cache Rd, Lawton, OK 73505, USA",
			  '"3.5"',
			  '"12"',
			  33.796767,
			  4.481544,
			  1,
			  '<i class="im-icon"><img src="assets/images/category-icon5.png"></i>'],
			  ['"listing-detail-1.html"', 
              '"assets/images/listing_img6.jpg"',
			  '"The Morning Hotel"',
			  '"3112 NW Cache Rd, Lawton, OK 73505, USA"',
			  '"3.5"',
			  '"12"',
			  32.77055783505125,
			  -0.26002502441406,
			  2,
			  '<i class="im-icon"><img src="assets/images/category-icon5.png"></i>']]; */
var arr, ln , i ;	  
$.ajax({
  url: "http://localhost/service/welcome/getinfo",
  dataType: "script",
  success : function(dataa){ // code_html contient le HTML renvoyé
 
 
  arr = JSON.parse(dataa);
  ln = arr.length;
  alert(ln);
  }
    
});			  
			  
 
!function(e){ 
"use strict";  
e(function(o){ 
 function t(){ 
 function o(e,o,t,i,n,a){ 
 return'<a href="'+e+'" class="map-post-thumb-m"><div class="map-popup-close"><i class="fa fa-times"></i></div><img src="'+o+'" alt=""></a><div class="map-post-des-m"><h5><a href="'+e+'">'+t+'</a></h5><span><i class="fa fa-map-marker"></i> '+i+'</span></div><div class="listing-content"></div>'} 
 function t(){ 
 navigator.geolocation&&navigator.geolocation.getCurrentPosition(function(e){ 
 var o=new google.maps.LatLng(e.coords.latitude,e.coords.longitude);r.setCenter(o),r.setZoom(12)})}
 var i=new InfoBox, 
a =[while(i = 0 ; i < ln ; i++){
    [o(arr[i].lien,arr[i].img,arr[i].name,arr[i].add,arr[i].nu,arr[i].num),arr[i].lat,arr[i].lng,arr[i].id,arr[i].icon],
    [o(arr[i].lien,arr[i].img,arr[i].name,arr[i].add,arr[i].nu,arr[i].num),arr[i].lat,arr[i].lng,arr[i].id,arr[i].icon] 
	}
	],
	
	
 s=e("#map").attr("data-map-zoom");
 if(void 0!==s&&!1!==s)l=parseInt(s);
 else var l=4; 
 var r=new google.maps.Map(document.getElementById("map"),
 {zoom:l,scrollwheel:!0,
	    disableDefaultUI:!0,
		 center:new google.maps.LatLng(33.3,3.7),
		 mapTypeId:google.maps.MapTypeId.ROADMAP,zoomControl:!1,
		 mapTypeControl:!1,scaleControl:!1,
		 panControl:!1,navigationControl:!1,
		 streetViewControl:!1});
 e(".items-list").on("mouseover",function( ){  
    if(void 0!==e(this).data("post-id")){ 
	 var o=e(this).data("post-id")-1,t=v[o].div;
	  e(t).addClass("clicked"),e(this).on("mouseout",function( ){ 
	  e(t).is(":not(.infoBox-opened)")&&e(t).removeClass("clicked")})  }
	  });
	  var m=document.createElement("div");
	   m.className="map-box";
	  var c,g,d,p = { content:m, 
	                   disableAutoPan:!1,
			          alignBottom:!0,
					  maxWidth:0,
					  pixelOffset:new google.maps.Size(-134,-55),
					  zIndex:null,
					  boxStyle:{width:"290px"},
					  closeBoxMargin:"0",
					  closeBoxURL:"",
					  infoBoxClearance:new google.maps.Size(25,25),isHidden:!1,
					  pane:"floatPane",
					  enableEventPropagation:!1},
					  v=[],
					  u=[{textColor:"white",url:"",height:50,width:50}];
					  for(g=0;g<a.length;g++){ 
					  d=a[g][4];
					  var h=new n( new google.maps.LatLng(a[g][1],a[g][2]),r, 
					  {marker_id:g},d);
					  v.push(h),
					  google.maps.event.addDomListener( h,"click",function(o,t){ 
					  
					  return function(){ 
					  i.setOptions(p),m.innerHTML=a[t][0],
					  i.open(r,o),
					  c=a[t][3],
					  google.maps.event.addListener(i,"domready",function(){ 
					  e(".map-popup-close").click(function(o){ 
					  o.preventDefault(),i.close(),
					  e(".map-marker-container").removeClass("clicked infoBox-opened") }) }) } } (h,g))}
					  var f={imagePath:"images/",styles:u,minClusterSize:2}; 
					  new MarkerClusterer(r,v,f),
					  google.maps.event.addDomListener(window,"resize",function( ){ 
					  var e=r.getCenter(); 
					  google.maps.event.trigger(r,"resize"),
					  r.setCenter(e)});
					  
					  var w=document.createElement("div"); 
					  
					  new function(e,o){ 
					  
					  w.index=1,o.controls[google.maps.ControlPosition.RIGHT_TOP].push(w),
					  e.className="leaflet-control-zoom";
					  var t=document.createElement("div");
					  e.appendChild(t);
					  var i=document.createElement("div");
					  i.className="custom-zoom-in",
					  t.appendChild(i);
					  var n=document.createElement("div");
					  
					  n.className="custom-zoom-out",
					  t.appendChild(n),
					  google.maps.event.addDomListener(i,"click",function(){ 
					  
					  o.setZoom(o.getZoom()+1)}),
					  google.maps.event.addDomListener(n,"click",function(){ 
					  
					  o.setZoom(o.getZoom()-1)})}(w,r);
					  e("#geoLocation, .input-with-icon.location a").click(function(e){ 
					  
					  e.preventDefault(),t()}), 
					  /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)&&r.setOptions({draggable:!1})}function i(){var o=new google.maps.LatLng({lng:e("#singlemap").data("longitude"),lat:e("#singlemap").data("latitude")}),t=new google.maps.Map(document.getElementById("singlemap"),{zoom:15,center:o,scrollwheel:!1,zoomControl:!1,mapTypeControl:!1,scaleControl:!1,fullscreenControl:!1,panControl:!1,navigationControl:!1,streetViewControl:!1}),i=document.createElement("div");new function(e,o){i.index=1,o.controls[google.maps.ControlPosition.RIGHT_TOP].push(i);var t=document.createElement("div");e.appendChild(t);var n=document.createElement("div");n.className="custom-zoom-in",t.appendChild(n);var a=document.createElement("div");a.className="custom-zoom-out",t.appendChild(a),google.maps.event.addDomListener(n,"click",function(){o.setZoom(o.getZoom()+1)}),google.maps.event.addDomListener(a,"click",function(){o.setZoom(o.getZoom()-1)})}(i,t);new n(o,t,{marker_id:"1"},"<i class='im-icon'><img src='"+e("#singlemap").data("map-icon")+"'></i>")}
					  
					  function n(e,o,t,i){this.latlng=e,this.args=t,this.markerIco=i,this.setMap(o)}
					  
					  var a=document.getElementById("map");void 0!==a&&null!=a&&(google.maps.event.addDomListener(window,"load",t),google.maps.event.addDomListener(window,"resize",t));var s=document.getElementById("singlemap");void 0!==s&&null!=s&&(google.maps.event.addDomListener(window,"load",i),google.maps.event.addDomListener(window,"resize",i)),(n.prototype=new google.maps.OverlayView).draw=function(){var o=this,t=this.div;t||((t=this.div=document.createElement("div")).className="map-marker-container",
 t.innerHTML='<div class="marker-container"><div class="marker-card"><div class="front face"><i class="im-icon"><img  '+o.markerIco+' ></i> </div><i class="im-icon"><img  '+o.markerIco+' ></i></div></div></div>',google.maps.event.addDomListener(t,"click",function(t){e(".map-marker-container").removeClass("clicked infoBox-opened"),google.maps.event.trigger(o,"click"),e(this).addClass("clicked infoBox-opened")}),void 0!==o.args.marker_id&&(t.dataset.marker_id=o.args.marker_id),this.getPanes().overlayImage.appendChild(t));var i=this.getProjection().fromLatLngToDivPixel(this.latlng);i&&(t.style.left=i.x+"px",t.style.top=i.y+"px")},n.prototype.remove=function(){this.div&&(this.div.parentNode.removeChild(this.div),this.div=null,e(this).removeClass("clicked"))},n.prototype.getPosition=function(){return this.latlng}})}(this.jQuery);
   