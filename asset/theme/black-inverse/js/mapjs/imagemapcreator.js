Event.observe(window, 'load', draw);

function draw() {
	dp.SyntaxHighlighter.HighlightAll('code');
	// var jg = new jsGraphics('map');
	// console.log(jg);
	// jg.setColor("red");
	// jg.drawLine(5, 11, 40, 5);
	// jg.setColor("green");
	// var xWerte = new Array(10,85,93,60);
	// var yWerte = new Array(50,10,105,87);
	// jg.drawPolyline(xWerte,yWerte);
	// jg.paint();


	// Event.observe($('map'), 'mousemove', function(event){$('mouse').value = "X: " + Event.pointerX(event) + "px Y: " + Event.pointerY(event) + "px";});
	// Event.observe($('map'), 'mousemove', function(event){setPoint(Event.pointerX(event), Event.pointerY(event))});
	Event.observe($('map'), 'click', function(event){setPoint(Event.pointerX(event), Event.pointerY(event))});
	Event.observe($('map'), 'dblclick', function(event){finishPoly(Event.pointerX(event), Event.pointerY(event))});
	Event.observe($('delete'), 'click', function(event){clear()});
	//Event.observe($('map'), 'mousemove', function(event){new Effect.Highlight($('note'), {startcolor:'#ffff99', endcolor:'#f0f0f0', restorecolor:true})});
	
	// Klickkoordinaten
	var x_tmp = 0;
	var y_tmp = 0;
	
	// Array für die Polygone
	var x_arr = new Array();
	var y_arr = new Array();
	
	// Number of polygones
	var number = 1;

	// Init graphics	
	jg = new jsGraphics('map');
	
	// Draw line to mousepointer
	function setPoint(x, y) {
		// Position correction 
		x = x - Position.cumulativeOffset($('map'))[0];
		y = y - Position.cumulativeOffset($('map'))[1];

		// Debug
		// new Insertion.Bottom($('klick'), 'X:'+x+'px - Y:'+y+'px<br />');
		
		// Draw, don't add point on same position
		if (x_tmp != 0 && y_tmp != 0 && x_tmp != x && y_tmp != y) {
			jg.drawLine(x_tmp, y_tmp, x, y);
			jg.paint();
		}
		
		// Don't add point on same position
		if (x_tmp != x && y_tmp != y) {
			x_arr.push(x);
			y_arr.push(y);		
		}
		x_tmp = x;
		y_tmp = y;
	}
	
	// Draw line to mousepointer and create polygone
	function finishPoly(x, y) {
		// Set last point
		setPoint(x, y);
		jg.clear();
		
		var jg2 = new jsGraphics('map');
		jg2.setColor("blue");
		jg2.fillPolygon(x_arr, y_arr);
		jg2.paint();

		createImagemap();
		x_tmp = 0;
		y_tmp = 0;
		x_arr = new Array();
		y_arr = new Array();
	}
	
	// Create HTML imagemap 
	function createImagemap() {
		var data = $('code').value;
		
		var i = 0;
		var poly = null;
		if (x_arr.length > 2) {
			x_arr.each( function(item, index) {
				poly = poly + item+','+y_arr[i++]+',';
			});
			poly = poly.substring(0, poly.length-1);
			polyHtml = poly;
			
			$('code').value = polyHtml;
			dp.SyntaxHighlighter.HighlightAll('code');
			
		}
	}
	
	// Empty map + textarea
	function clear() {
		jg.clear();
		$('code').value = codeTemplate;
		dp.SyntaxHighlighter.HighlightAll('code');
		number = 1;		
	}
}

// Set img by CSS
function setImg(file) {
	/*bad*/
	jg.clear();
	var codeTemplate = '<div id="imgmapdiv">\n\t<map name="imgmap">\n\t</map>\n</div>\n\n<p>\n\t<img src="%src%" width="345" height="312" alt="Move mouse over image" usemap="#imgmap">\n</p>'; 
	$('code').value = codeTemplate;
	dp.SyntaxHighlighter.HighlightAll('code');
	/*bad*/
	
	var img = new Image();
	img.src = file;
	
	Element.setStyle($('map'), {backgroundImage: 'url('+file+')'});
	Element.setStyle($('map'), {height: img.height+'px'});
	Element.setStyle($('map'), {width: img.width+'px'});
}

// Get img
function loadImg() {
	if ($('img').value) {
		setImg($('img').value, 200,200);
	}
	return false;
}

function usesLibs() {
	var libs = [
		{name: 'Prototype', url: 'http://prototype.conio.net/'}, 
		{name: 'JavaScript Vectorgraphics Library', url: 'http://walterzorn.com/jsgraphics/jsgraphics_e.htm'}, 
		{name: 'dp.SyntaxHighlighter', url: 'http://www.dreamprojections.com/syntaxhighlighter/'},
		{name: 'YUI Reset CSS', url: 'http://developer.yahoo.com/yui/reset/'},
		{name: 'YUI Fonts CSS', url: 'http://developer.yahoo.com/yui/fonts/'},
		{name: 'Scriptaculous', url: 'http://script.aculo.us/'}
		]
	libs.each(function(item, index) {
		document.write('<a href="'+item.url+'">'+item.name+'</a><br />');
	})
}

/* U'r right! This site doesn't use any AJAX, but it sounds better. Doesn't it? ;) */
