// graph color schemes
var color = [
	["#6fb9e8", "#ec8526", "#9dc453", "#ddd74c"], // default
	["#c9e054", "#eab19d", "#e05461", "#b454e0"], // light
	["#b4b280", "#dd9473", "#7fdd73", "#7396dd"], // washy
	["#707ABD", "#833607", "#94A34C", "#FFCF2E"], // marine
	["#8ED915", "#0F5BBD", "#00AA58", "#E74B16"] // primary
];
var defaultColorScheme = color[0];

$(document).ready(function() {
	init();
	
	/* === Tabs javascripts [begin] === */
	/* header menu tabs */
	$('#menu-tabs ul').delegate('li:not(.active)', 'click', function() {
		$(this).parent().find(".active").removeClass('active').parents("#wrapper").find("#content-holder").css("left", 0).children('.pane').hide().eq($(this).index()).show();//fadeIn(150);
		$(this).addClass('active');
		scrollbarInit();
		return false;
	});
	
	/* visualize graph type switcher tabs */
	$('#vis-setter').delegate('li:not(.active) a', 'click', function() {
		$(this).parents("ul").find(".active").removeClass('active');
		$(this).parent().addClass('active');
		visualize($(this).attr("rel"), defaultColorScheme);
		return false;
	});
	
	// block tabs code
	$('ul.tabs:not(#vis-setter)').delegate('li:not(.active) a', 'click', function() {
		$(this).parents("ul").find(".active").removeClass('active');
		var li = $(this).parent();
		$(this).parent().addClass('active');
		$(this).parents(".content").children(".bcont").hide().eq(li.index()).show();
		return false;
	});
	
	/* === Tabs javascripts [end] === */
	
	
	/* effect at the close of messages */
	$('#flash-message').live("click",function(){
		$(this).animate({opacity: 0}, 250, function(){
			$(this).slideUp(250, function(){$(this).remove()})});
			return false;
		}
	);
	
	/* === Tables javascripts [begin] === */
	/* optional menu in the table to each row */
	$("table td a.action").live("click", function(){
		var pos = $(this).position();
		$(this).addClass("active").next().css({top: pos.top + 24, left: pos.left}).show().find("li:last a").css("border-bottom", 0);
		return false;
	});
	$("table th a.action").live("click", function(){return false;});
	/* when you click to close the active optional menu and select box */
	$("body").click(function(event){
		$.each($("a.action.active"), function(){
			$(this).removeClass("active").next().hide();
		});
		if($(event.target).is("div.select") || $(event.target).parent().is("div.select")){
			$("div.select").not($(event.target)).each(function(index){
				if($(this).data("active")) $(this).data("active", false).next().children("ul").hide();
			});
		}else{
			$("div.select").each(function(index){
				if($(this).data("active")) $(this).data("active", false).next().children("ul").hide();
			});
		}
	});
	
	/* the effect of zebra */
	$("table.infotable tbody tr:odd").css({backgroundColor: "#fbfbfb"});
	
	/* Check all */
	$('input:checkbox.checkall').click(function() {
		$(this).parents('.infotable').find('input:checkbox').attr('checked', $(this).is(':checked')).parents("tr").each(function(){
			if($(this).find('input:checkbox').is(':checked')) $(this).addClass("selected");
			else $(this).removeClass("selected");
		});  
	});
	
	/* selection row with the active checkbox */
	$("table.infotable input:checkbox").change(function(){
		if($(this).is(':checked')) $(this).parents("tr").addClass("selected");
		else $(this).parents("tr").removeClass("selected");
	});
	/* === Tables javascripts [end] === */
	
	
	/* === Scrollmenu javascripts [begin] === */
	$("#scrollbar").draggable({
		containment: 'parent',
		cursor: 'cursor',
		axis: 'x',
		drag: function(event, ui) {
			// scrolls the content in the performance of drag events
			var persent = parseFloat($(this).css("left").replace("px", ""))/($(this).parent().width() - $(this).outerWidth())*100;
			var left = (($("#content-holder").outerWidth()-$("#content-scroll").outerWidth())/100)*parseInt(persent);
			$("#content-holder").css("left", "-"+ left +"px");
		}
	});
	
	// scrolls content by using the mouse wheel
	/*
	$("#content-scroll").bind('mousewheel', function(event, delta) {
		if(delta > 0) scrollmenu("left");
		else scrollmenu("right");
		return false;
	});
	*/
	
	// scrolls content by clicking on the arrows left and right scrollbar
	$("#scrollleft, #scrollright").click(function(){
		if($(this).attr("id")=="scrollright") scrollmenu("right");
		else scrollmenu("left");
		return false;
	});
	
	// tooltip when you hover on the menu
	$(".menu-items li > a, .settings li > a, .tooltip_box span > a").bind("mouseover", function(e){
		var tiphtml = $(this).next(".tooltip").html();
		$("#bubble").remove();
		if(tiphtml) $("body").append('<div id="bubble" class="bubble"><div class="bubble-t1"><div class="bubble-t2"><div class="bubble-t3"></div></div></div><div class="bubble-1"><div class="bubble-2"><div class="bubble-3">'+tiphtml+'</div></div></div><div class="bubble-b1"><div class="bubble-b2"><div class="bubble-b3"></div></div></div></div>');
		if($.browser.msie) var tipWidth = $("#bubble").outerWidth(true);
		if($.browser.opera) $(this).removeAttr('href');
		else var tipWidth = $("#bubble").width();
		$("#bubble").width(tipWidth);
		$("#bubble").css({left:e.pageX-27, top: e.pageY-$("#bubble").outerHeight()-3}).show();
	}).bind("mousemove", function(e){
		$("#bubble").css({left:e.pageX-27, top:e.pageY-$("#bubble").outerHeight()-3});
	}).bind("mouseout", function(){
		if($.browser.opera) $(this).attr('href', '#');
		if(!$.browser.msie) $("#bubble").stop().animate({opacity:0,top:"-=15px"},"fast",function(){$(this).remove();});
		else $("#bubble").stop().animate({top:"-=15px"},"fast",function(){$(this).remove();});
	});
	
	/* === Scrollmenu javascripts [end] === */
	
	/* === Custom select box javascripts [begin] === */
	// This code creates a stylized copy of select with class .select
	$("select.select").each(function(index){
		var select = $("select.select:eq("+index+")");
		/*
		If you specify an additional class "nohide",  // <select class="select nohide">...</select> - displayed
		then the original item will remain,           // <select class="select">...</select> - be hidden
		as in the demo version, if you do not 
		specify this class will be displayed only 
		stylized selectivity
		*/
		if(!$(this).hasClass("nohide")) select.hide();
		$(this).after('<div class="select"><span>'+$("option:selected", this).text()+'</span></div>');
		var divselect = $(this).next();
		divselect.after('<div class="select-box"><ul></ul></div>');
		var ul = $(this).nextAll(".select-box").children("ul");
		ul.css({width: divselect.outerWidth() + 10 +"px", overflow: "auto"});
		/*
		Here is handled nested items, the grouping
		of the list observed as in the original
		*/
		$("option", this).each(function(){
			if($(this).parent().is("optgroup")) {
				if($(this).index($(this).parent().children("option")) == 0) ul.append($("<li/>", {'class': "group", text: $(this).parent().attr("label")}));
				ul.append($("<li/>", {'class': "ingroup", text: $(this).text(), rel: $(this).val()}));
			}else ul.append($("<li/>", {text: $(this).text(), rel: $(this).val()}));
		});
		ul.find("li[rel="+$("option:selected", this).val()+"]").addClass("selected");
	}).change(function(){
		/*
		This code follows the changes of the original 
		item and makes changes to a stylized version of the select
		*/
		$(this).next().find("span").text($("option:selected", this).text());
		var ul = $(this).nextUntil(".select-box").next().children("ul");
		ul.find("li:not(.group)").removeClass("selected");
		ul.find("li[rel="+$("option:selected", this).val()+"]").addClass("selected");
	});
	
	// This code handles the click and hover events on items in the list, you can click on the items, but not in group
	$(".select-box ul li:not(.group)").live("mouseover", function(){
		$(this).addClass("auto-focus");
	}).live("mouseout", function(){
		$(this).removeClass("auto-focus");
	}).live("click", function(){
		$(this).siblings().removeClass("selected");
		$(this).addClass("selected");
		var divselect = $(this).parents(".select-box").prev();
		var select = divselect.prev();
		select.find("option").removeAttr('selected');
		divselect.find("span").text($(this).text());
		select.find("option[value="+$(this).attr("rel")+"]").attr('selected', 'yes');
	});
	
	// establish the state, active or not
	$("div.select").data("active", false).click(function(){
		if($(this).data("active")) $(this).data("active", false).next().children("ul").hide();
		else $(this).data("active", true).next().children("ul").width($(this).outerWidth(true)).show();
	});
	
	/* === Custom select box javascripts [end] === */
	
	// if the width of the parent element is less then the width of selects and inputs decreases
	$("div.select, select.select").each(function(){
		var pw = $(this).parent().width();
		if (pw < $(this).outerWidth()) {
			if($.browser.msie) {
				if($(this).is("div")) $(this).width(pw-parseFloat($(this).css("marginLeft"))).css("position", "relative");
			}
			if($(this).is("div")) $(this).width(pw-parseFloat($(this).css("marginLeft")));
			else $(this).width(pw);
		}
	});
	
	$('#auction_type').change(function(){
		var auction_type = $(this).attr('value');
		
		if(auction_type == 1) {
			$("#increments").hide();
			$("#extends").hide();
			$("#autobids").hide();
			$("#podium").hide();
		} else if(auction_type == 3) {
			$("#increments").hide();
			$("#increments_dynamic").show();
		} else if(auction_type == 4) {
			$("#fixed_price").show(); 
			$("#start_price").hide();
		} else if(auction_type == 8) {
			$("#pred_price").show();
			$("#increments").hide();
		} else {
			$("#fixed_price").hide();
			$("#start_price").show();
			$("#increments").show();
			$("#increments_dynamic").hide();
			$("#extends").show();
			$("#autobids").show();
			$("#podium").show();
		}
	});
	
	var OfficialTime = $('.official-time');
	if(OfficialTime.length){
		setInterval(function(){
			var gettime = '/gettime.php?' + new Date().getTime();
			$.ajax({
				url: gettime,
				success: function(data){
					OfficialTime.html(data);
				}
			});
		}, 1000);
	}
});

function init(){
	if($.browser.msie) $("body").addClass("ie");
	scrollbarInit();
	
	// visualize function start
	visualize("area", defaultColorScheme);
	
	// :focus support in IE7
	if($.browser.msie && $.browser.version == 7) {
		$("input.inputtext, textarea").bind("focusin", function(){
			$(this).addClass("focus");
		}).bind("focusout", function(){
			$(this).removeClass("focus");
		});
	}
	
	// hide content blocks on tabs, except for the first
	$(".content").each(function(){
		if($(this).children(".bcont").size() > 1) $(this).children(".bcont:gt(0)").hide();
	});
	
	// outline fix
	$("a").each(function() {
		$(this).attr("hideFocus", "true").css("outline", "none");
	});
	
	// jquery WYSIWYG editor init
	$('textarea.wysiwyg').wysiwyg();
}

function scrollmenu(data){
	var maxl = ($("#scrollbar").parent().width() - $("#scrollbar").outerWidth());
	var left = parseFloat($("#content-holder").css("left").replace("px", ""));
	var scrw = $("#content-holder").outerWidth()-$("#content-scroll").outerWidth();
	var step = scrw/100;
	// in ie7-8 default left = "auto"
	if($("#content-holder").css("left") == "auto") left = 0;
	if(data=="right"){
		// shift to the left
		var px = left-step*10;
		if((scrw+px)>=0){
			$("#content-holder").css("left", px +"px");
			$("#scrollbar").css("left", parseInt(Math.abs(px*(maxl/scrw)))+"px");
		}else{
			$("#content-holder").css("left", "-"+ scrw +"px");
			$("#scrollbar").css("left", maxl +"px");
		}
	}else{
		// shift to the right
		var px = left+step*10;
		if(left<0 && (left+px)<=0){
			$("#content-holder").css("left", px +"px");
			$("#scrollbar").css("left", parseInt(Math.abs(px*(maxl/scrw)))+"px");
		}else $("#content-holder, #scrollbar").css("left", "0px");
	}
}

function scrollbarInit(){
	var maxw = 0;
	if($(".pane:visible:has(.menu-items)").length>0){
		$(".pane:visible .menu-items li").each(function(){
			maxw += $(this).outerWidth(true);
		});
		maxw = maxw + parseFloat($(".pane:visible .menu-items").css("marginLeft").replace("px", "")) + parseFloat($(".pane:visible .menu-items").css("marginRight").replace("px", ""));
		if(maxw < $("#content-holder").width()) $("#content-holder").width("100%");
		else $("#content-holder").width(maxw);
	}else $("#content-holder").width("100%");
	var handle = ($("#content-scroll").outerWidth()/$("#content-holder").outerWidth())*100;
	$(".scrollbar .sb-3 .ui-slider-handle").css("width", handle+"%").width(function(){
		return $(this).width() - parseFloat($(this).css("paddingRight").replace("px", "")) + "px";
	});
	if(handle == 100) $(".scrollbar").hide();
	else $(".scrollbar").show();
}

/* jquery visualize function 
@index index color scheme of the array color 0...4
*/
function visualize(type, index){
	if(!index) var index = defaultColorScheme;
	// remove all graphs
	if($('div.visualize').length > 0) $('.visualize').remove();
	$('table.graph').each(function(){
		/* <table class="graph" rel=" {area|line|bar|pie} ">....</table> 
		if you use <table class="graph" rel="line">, the variable type = "line"
		default variable type = "area"
		*/
		if($(this).attr('rel')) type = $(this).attr('rel');
		$(this).hide().visualize({
			type: type,
			width: $('#visualize').width() - 22 +"px",
			height: "200px",
			lineWeight: 2,
			colors: index
		}).appendTo('#visualize').trigger('visualizeRefresh');
	});
}

function show_box(div_id) {
	if(document.getElementById(div_id).style.display == ""){
		document.getElementById(div_id).style.display = "none";
	} else {
		document.getElementById(div_id).style.display = "";
	}
}

function multiupload() { 
	var i=2;
	while ((i < (document.files)) && (i < 6)) { 
		document.getElementById('multifiles_' + i).style.display=''; 
		i=i+1; 
	} 
	document.files=i+1; 
	if (document.files == 7) { 
		document.getElementById('addFile').innerHTML = '<span><i>5 fichiers maximum</i></span>'; 
	} else { 
		if(document.getElementById('addFile').style.display == "none") {
			document.getElementById('multitxt').style.display = "none";
			document.getElementById('addFile').style.display = "";
		}
		//document.getElementById('addFile').innerHTML = '<span>Ajouter un fichier</span>'; 
	} 
}


var TINY={};

function T$(i){return document.getElementById(i)}
function T$$(e,p){return p.getElementsByTagName(e)}

TINY.table=function(){
	function sorter(n){this.n=n; this.pagesize=20; this.paginate=0}
	sorter.prototype.init=function(e,f){
		var t=ge(e), i=0; this.e=e; this.l=t.r.length; t.a=[];
		t.h=T$$('thead',T$(e))[0].rows[0]; t.w=t.h.cells.length;
		for(i;i<t.w;i++){
			var c=t.h.cells[i];
			if(c.className!='nosort'){
				c.className=this.head; c.onclick=new Function(this.n+'.wk(this.cellIndex)')
			}
		}
		for(i=0;i<this.l;i++){t.a[i]={}}
		if(f!=null){var a=new Function(this.n+'.wk('+f+')'); a(); if(this.sortmethod.toLowerCase() == "desc"){a();}}
		if(this.paginate){this.g=1; this.pages()}
	};
	sorter.prototype.wk=function(y){
		var t=ge(this.e), x=t.h.cells[y], i=0;
		for(i;i<this.l;i++){
      t.a[i].o=i; var v=t.r[i].cells[y]; t.r[i].style.display='';
      while(v.hasChildNodes()){v=v.firstChild}
      t.a[i].v=v.nodeValue?v.nodeValue:''
    }
		for(i=0;i<t.w;i++){var c=t.h.cells[i]; if(c.className!='nosort'){c.className=this.head}}
		if(t.p==y){t.a.reverse(); x.className=t.d?this.asc:this.desc; t.d=t.d?0:1}
		else{t.p=y; t.a.sort(cp); t.d=0; x.className=this.asc}
		var n=document.createElement('tbody');
		for(i=0;i<this.l;i++){
			var r=t.r[t.a[i].o].cloneNode(true); n.appendChild(r);
			r.className=i%2==0?this.even:this.odd; var cells=T$$('td',r);
			for(var z=0;z<t.w;z++){cells[z].className=y==z?i%2==0?this.evensel:this.oddsel:''}
		}
		t.replaceChild(n,t.b); if(this.paginate){this.size(this.pagesize)}
	};
	sorter.prototype.page=function(s){
		var t=ge(this.e), i=0, l=s+parseInt(this.pagesize);
		if(this.currentid&&this.limitid){T$(this.currentid).innerHTML=this.g}
		for(i;i<this.l;i++){t.r[i].style.display=i>=s&&i<l?'':'none'}
	};
	sorter.prototype.move=function(d,m){
		var s=d==1?(m?this.d:this.g+1):(m?1:this.g-1);
		if(s<=this.d&&s>0){this.g=s; this.page((s-1)*this.pagesize)}
	};
	sorter.prototype.size=function(s){
		this.pagesize=s; this.g=1; this.pages(); this.page(0);
		if(this.currentid&&this.limitid){T$(this.limitid).innerHTML=this.d}
	};
	sorter.prototype.pages=function(){this.d=Math.ceil(this.l/this.pagesize)};
	function ge(e){var t=T$(e); t.b=T$$('tbody',t)[0]; t.r=t.b.rows; return t};
	function cp(f,c){
		var g,h; f=g=f.v.toLowerCase(), c=h=c.v.toLowerCase();
		var i=parseFloat(f.replace(/(\$|\,)/g,'')), n=parseFloat(c.replace(/(\$|\,)/g,''));
		if(!isNaN(i)&&!isNaN(n)){g=i,h=n}
		i=Date.parse(f); n=Date.parse(c);
		if(!isNaN(i)&&!isNaN(n)){g=i; h=n}
		return g>h?1:(g<h?-1:0)
	};
	return{sorter:sorter}
}();