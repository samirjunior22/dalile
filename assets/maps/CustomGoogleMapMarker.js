function CustomMarker(latlng, map, args) {
	this.latlng = latlng;	
	this.args = args;	
	this.setMap(map);	
} 
CustomMarker.prototype = new google.maps.OverlayView(); 
CustomMarker.prototype.draw = function() {
	
	var self = this;
	
	var div = this.div;
	
	if (!div) {
	
		div = this.div = document.createElement('div');
		
		div.className = 'marker'; 
	    div.innerHTML='<div class="marker-container"><div class="marker-card"><div class="front face"><i class="im-icon"><img src="'+self.args.url+'"></i> </div><i class="im-icon"><img src="'+self.args.url+'"> </div></div></div>';
		div.style.position = 'absolute';
		div.style.cursor = 'pointer';
		 
		
		if (typeof(self.args.marker_id) !== 'undefined') {
			div.dataset.marker_id = self.args.marker_id;
		}
	 
		
		var panes = this.getPanes();
		panes.overlayImage.appendChild(div);
	}
	
  
	var i=this.getProjection().fromLatLngToDivPixel(this.latlng);
	 i&&(
	  div.style.left=i.x+"px",
	  div.style.top=i.y+"px");
	 
};

CustomMarker.prototype.remove = function() {
	if (this.div) {
		this.div.parentNode.removeChild(this.div);
		this.div = null;
	}	
};

CustomMarker.prototype.getPosition = function() {
	return this.latlng;	
};