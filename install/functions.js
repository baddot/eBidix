var errorOccured = false;

//params
configIsOk = false;
validSiteInfos = false;

function nextTab() {
	if(verifyThisStep()) {
		showStep(step+1, 'next');
	}
}
function backTab() {
	if (step != 6) {
		showStep(step - 1, 'back');
	} else {
		showStep(1, 'back');
	} 
}

function showStep(aStep, way) {
	step = aStep;
	
	//show the sheet
	$('div.sheet.shown').fadeOut('fast', function() {
		$($('div.sheet')[(step-1)]).fadeIn('slow').addClass('shown');
	}).removeClass('shown');
	
	//upgrade the tab
	$('#tabs li')
		.removeClass("selected")
		.removeClass("finished");
	if (step < 6) {
		if (step == 5)
			$('#tabs li:nth-child(' + step + ')').addClass("finished");
		else
			$('#tabs li:nth-child(' + step + ')').addClass("selected");
		$('#tabs li:lt(' + (step - 1) + ')').addClass("finished");
	} else {
		switch (step){
			
			case 6 :
			$('#tabs li:nth-child(1)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(2)').addClass("selected").removeClass("finished");
			$('#tabs li:nth-child(3)').removeClass("selected").removeClass("finished");
			$('#tabs li:nth-child(4)').removeClass("selected").removeClass("finished");
			break;
			
			case 7 :
			$('#tabs li:nth-child(1)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(2)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(3)').addClass("selected").removeClass("finished");
			$('#tabs li:nth-child(4)').removeClass("selected").removeClass("finished");
			break;
			
			case 8 :
			$('#tabs li:nth-child(1)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(2)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(3)').addClass("selected").removeClass("finished");
			$('#tabs li:nth-child(4)').removeClass("selected").removeClass("finished");
			break;
			
			case 9 :
			$('#tabs li:nth-child(1)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(2)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(3)').removeClass("selected").addClass("finished");
			$('#tabs li:nth-child(4)').addClass("finished");
			break;
			
		}
	}
	
	switch(step) {
		case 1:
			$("#bigTitle").html(txtTabInstaller1);
			$("#btBack").hide();
		break;
		
		case 2:
			application = "install";
			verifyAndSetRequire(1);	
			$("#btBack").show('slow');
			$("#bigTitle").html(txtTabInstaller2);
		break;
		
		case 3:
			$("#bigTitle").html(txtTabInstaller3);
		break;
		
		case 4:
			$("#bigTitle").html(txtTabInstaller4);
			$("#btBack").hide('slow');
		break;
		
		case 5:
			$("#bigTitle").html(txtTabInstaller5);
			$("#btNext").hide();
		break;
	}
}

function verifyThisStep() {
	switch (step) {
		case 1 :
			showStep(2, 'next');
			return false;
		break;
		
		case 2 :
			return configIsOk;
		break;
		
		case 3 :
			createDB();
			return false;
		break;
		
		case 4 :
			verifySiteInfos();
			return validSiteInfos;
		break;
		
		case 6 :
			return true;
		break;
		
	}
	
}

function setInstallerLanguage() {
	$("#formSetInstallerLanguage").submit();
}

function verifyAndSetRequire(firsttime) {
	$("div#sheet_require > ul").slideUp("1500");
	$.ajax({
		url: "model.php",
		data: "method=checkConfig&firsttime="+firsttime,
		success: function(ret) {
			testLists = ret.getElementsByTagName('testList');
			
			configIsOk = true;
			
			testListRequired = testLists[0].getElementsByTagName('test');
			for(i = 0; i < testListRequired.length; i++){
				result = testListRequired[i].getAttribute("result");
				$($("div#sheet_require > ul#required .required")[i])
				.removeClass( (result == "fail") ? "ok" : "fail" )
				.addClass(result);
				if(result == "fail") configIsOk = false;
			}
			
			testListOptional = testLists[1].getElementsByTagName('test');
			optionalIsOk = true;
			
			for(i = 0; i < testListOptional.length; i++){
				result = testListOptional[i].getAttribute("result");
				$($("div#sheet_require > ul#optional li.optional")[i])
					.removeClass( (result == "fail") ? "ok" : "fail" )
					.addClass(result);
				if (result == "fail") optionalIsOk = false;
			}
			
			if (!configIsOk) {
				$('#btNext').hide();
				$('h2#resultConfig').html(txtConfigIsNotOk).removeClass('okBlock').addClass('errorBlock').slideDown('slow');
				$("div#sheet_require > ul").slideDown("1500");
				$('#stepList li:contains("Etape 2")').addClass('ko');
			} else {
				$("#btNext").show();
				var firsttime = ret.getElementsByTagName('firsttime');
				if(firsttime && firsttime[0].getAttribute("value") == 1 && optionalIsOk) {
					$("#btNext").click();
				} else {
					$('h2#resultConfig').html(txtConfigIsOk).removeClass('errorBlock').addClass('okBlock').slideDown('slow');
					$("div#sheet_require > ul").slideDown("1500");
				}
			}
		}
	});
}

function verifyDbAccess () {
	//local verifications
	if($("#dbServer[value=]").length > 0){
		$("#dbResultCheck").addClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html(txtDbServerEmpty).slideDown('slow');
		return false;
	} else {
		$("#dbResultCheck").removeClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html('');
	}
	
	if($("#dbLogin[value=]").length > 0) {
		$("#dbResultCheck").addClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html(txtDbLoginEmpty).slideDown('slow');
		return false;
	} else {
		$("#dbResultCheck").removeClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html('');
	}
	
	if($("#dbName[value=]").length > 0) {
		$("#dbResultCheck").addClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html(txtDbNameEmpty).slideDown('slow');
		return false;
	} else {
		$("#dbResultCheck").removeClass("errorBlock").removeClass("okBlock").removeClass('infosBlock').html('');
	}
	
	//external verifications and sets
	$.ajax({
		cache: false,
		url: "model.php",
		data: 
			"method=checkDB"
			+"&type=MySQL"
			+"&server="+ $("#dbServer").val()
			+"&login="+ $("#dbLogin").val()
			+"&password="+encodeURIComponent($("#dbPassword").val())
			+"&engine="+$("#dbEngine option:selected").val()
			+"&name="+ $("#dbName").val(),
		success: function(ret) {
			ret = ret.getElementsByTagName('action')[0];
			if (ret.getAttribute("result") == "ok") {
				$("#dbResultCheck")
					.addClass("okBlock")
					.removeClass("errorBlock")
					.html(txtError[23])
					.slideDown('slow');
				$("#dbCreateResultCheck")
					.slideUp('slow');
			} else {
				$("#dbResultCheck")
					.addClass("errorBlock")
					.removeClass("okBlock")
					.html(txtError[parseInt(ret.getAttribute("error"))])
					.slideDown('slow');
				$("#dbCreateResultCheck")
					.slideUp('slow');
			}
		}
	});	 	 
}

function createDB() {
	$("#dbResultCheck").hide();
	$.ajax({
	   url: "model.php",
	   cache: false,
	   data:
	   	"method=createDB"+
		"&tablePrefix="+ $("#db_prefix").val()+
		"&type=MySQL"+
		"&server="+ $("#dbServer").val()+
		"&login="+ $("#dbLogin").val()+
		"&password="+encodeURIComponent($("#dbPassword").val())+
		"&engine="+$("#dbEngine option:selected").val()+
		"&name="+ $("#dbName").val()+
		"&language="+ id_lang
	   ,
	   success: function(ret) {
			var action_ret;
			try {
				action_ret = ret.getElementsByTagName('action')[0];
			} catch (e) {
				$("#dbCreateResultCheck")
					.addClass("errorBlock")
					.removeClass("okBlock")
					.removeClass('infosBlock')
					.html(ret)
					.show();
				return;
			}
			if (action_ret.getAttribute("result") == "ok") {
				showStep(step+1, 'next');
			} else {
				if (action_ret.getAttribute("error") == "11") {
					$("#dbCreateResultCheck")
						.addClass("errorBlock")
						.removeClass("okBlock")
						.removeClass('infosBlock')
						.html(
							txtError[11]+ "<br />\'"+
							action_ret.getAttribute("sqlQuery") + "\'<br/>"+
							action_ret.getAttribute("sqlMsgError") + "(" + txtError[18] + " : " + action_ret.getAttribute("sqlNumberError") +")"
						)
						.show();
				} else {
					$("#dbCreateResultCheck")
						.addClass("errorBlock")
						.removeClass("okBlock")
						.removeClass('infosBlock')
						.html(txtError[parseInt(action_ret.getAttribute("error"))])
						.show();
				}
			}
	   }
	});
}

function ajaxRefreshField(nthField, idResultField, fieldsList, inputId) {
	var result = fieldsList[nthField].getAttribute("result");
	if (result != "ok") {
		$("#"+idResultField)
			.html( txtError[parseInt(fieldsList[nthField].getAttribute("error"))] )
			.addClass("errorBlock")
			.show();
		if (validSiteInfos)
			$("#"+inputId).focus();
		return false;
	} else {
		$("#"+idResultField)
			.html("")
			.removeClass("errorBlock")
			.show("slow");
		return true;
	}
}

function verifySiteInfos() {
	$.ajax({
	   url: "model.php",
	   async: true,
	   cache: false,
	   data:
		"method=checkSiteInfos"+
		"&infosFirstname="+ encodeURIComponent($("input#infosFirstname").val())+
		"&infosName="+ encodeURIComponent($("input#infosName").val())+
		"&infosEmail="+ encodeURIComponent($("input#infosEmail").val())+
		"&infosPassword="+ encodeURIComponent($("input#infosPassword").val())+
		"&infosPasswordRepeat="+ encodeURIComponent($("input#infosPasswordRepeat").val()),
	   success: function(ret)
	   {
			fieldsList = ret.getElementsByTagName('siteConfig')[0].getElementsByTagName('field');
			validSiteInfos = true;
			if (!ajaxRefreshField(0, "resultInfosFirstname", fieldsList, "infosFirstname")) validSiteInfos = false;
			else if (!ajaxRefreshField(1, "resultInfosName", fieldsList, "infosName")) validSiteInfos = false;
			else if (!ajaxRefreshField(2, "resultInfosEmail", fieldsList, "infosEmail")) validSiteInfos = false;
			else if (!ajaxRefreshField(5, "resultInfosPassword", fieldsList, "infosPassword")) validSiteInfos = false;
			else if (!ajaxRefreshField(6, "resultInfosPasswordRepeat", fieldsList, "infosPasswordRepeat")) validSiteInfos = false;
			else if (!ajaxRefreshField(3, "resultInfosFirstname", fieldsList, "validateFirstname")) validSiteInfos = false;
			else if (!ajaxRefreshField(4, "resultInfosName", fieldsList, "validateName")) validSiteInfos = false;
			else if (!ajaxRefreshField(7, "resultInfosSQL", fieldsList, "infosInsertSQL")) validShopInfos = false;
			else {
				$('#endFirstName').html($('input#infosFirstname').val());
				$('#endName').html($('input#infosName').val());
				$('#endEmail').html($('input#infosEmail').val());
				showStep(5);
			}
	   }
	});
}

function constructInstallerTabs()
{
	$("#tabs")
		.empty()
		.append("<li id='tab_lang' class='selected'><span class='number1' >"+txtTabInstaller1+"</span></li>")
		.append("<li id='tab_require'><span class='number2' >"+txtTabInstaller2+"</span></li>")
		.append("<li id='tab_db'><span class='number3' >"+txtTabInstaller3+"</span></li>")
		.append("<li id='tab_infos'><span class='number4' >"+txtTabInstaller4+"</span></li>")
		.append("<li id='tab_end'><span class='number5' >"+txtTabInstaller5+"</span></li>")
	;
}

$(document).ready(function() {
	$("#container").show();
	$("#btBack").hide();
	$("div#sheet_require").hide();
	$("div#sheet_db").hide();
	$("div#sheet_infos").hide();
	$("div#sheet_end").hide();
	
	//ajax animation
	$("#loaderSpace").ajaxStart(
		function()
		{
			$(this).fadeIn('slow');
			$(this).children('div').fadeIn('slow');
		}
	);
	$("#loaderSpace").ajaxComplete(
		function(e, xhr, settings)
		{
			$(this).fadeOut('slow');
			$(this).children('div').fadeOut('slow');
			errorOccured = false;
		}
	);
	
	$('#btNext').bind("click",nextTab);
	$('#btBack').bind("click",backTab);
	
	$('#btRefresh').click(
		function(){
			verifyAndSetRequire(0);
		}
	);
	
	constructInstallerTabs();
	
	step=1;
});