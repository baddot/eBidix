$(document).ready(function(){

    var auctions = '';
    var auctionObjects = [];

    $('.auction-item').each(function() {
        var auctionId = $(this).attr('id');	
		var auctionTitle = auctionId.substr(auctionId.lastIndexOf('_') + 1);
		
        if ($('#' + auctionId + ' .countdown').length) {
            auctions = auctions + auctionId + '=' + auctionTitle + '&';

            auctionObjects[auctionId]                           = $('#' + auctionId);
            auctionObjects[auctionId]['flash-elements']         = $('#' + auctionId + ' .countdown, #' + auctionId + ' .bid-price, #' + auctionId + ' .bid-bidder');
            auctionObjects[auctionId]['countdown']              = $('#' + auctionId + ' .countdown');
            auctionObjects[auctionId]['bid-bidder']             = $('#' + auctionId + ' .bid-bidder');
            auctionObjects[auctionId]['bid-button']             = $('#' + auctionId + ' .bid-button');
            auctionObjects[auctionId]['bid-button-a']           = $('#' + auctionId + ' .bid-button a');
            auctionObjects[auctionId]['bid-price']              = $('#' + auctionId + ' .bid-price');
            auctionObjects[auctionId]['bid-message']            = $('#' + auctionId + ' .bid-message');
            auctionObjects[auctionId]['bid-histories']          = $('#bidHistoryTable' + auctionTitle);
            auctionObjects[auctionId]['bid-histories-tbody']    = $('#bidHistoryTable' + auctionTitle + ' tbody');
        }
    });
	
    var bidOfficialTime = $('.bid-official-time');
    var bidBalance = $('.bid-balance');
    var price = '';
    var getstatus_url;

    if ($('.bid-histories').length) {
        getstatus_url = '/getstatus.php?histories=yes';
    } else {
        getstatus_url = '/getstatus.php';
    }

    function convertToNumber(sourceString){
        return sourceString.replace(/&#[0-9]{1,};/gi, "")
                            .replace(/&[a-z]{1,};/gi, "")
                            .replace(/[a-zA-Z]+/gi, "")
                            .replace(/[^0-9\,\.]/gi, "");
    }
	
	// Do the loop when auction available only
    if(auctions){
        setInterval(function(){
            $.ajax({
                url: getstatus_url,
                dataType: 'json',
                type: 'post',
                data: auctions,
                success: function(data){
                    if (data[0]) {
                        if (data[0].Auction.serverTimeString) {
                            if (bidOfficialTime.html()) {
                                bidOfficialTime.html(data[0].Auction.serverTimeString);
                            }
                        }
						
						if (data[0].Balance) {
							if (bidBalance.html()) {
                                bidBalance.html(data[0].Balance.balance);
                            }
                        }
                    }

                    $.each(data, function(i, item){
						if (auctionObjects[item.Auction.element]['bid-price'].length > 1) {
							auctionObjects[item.Auction.element]['bid-price'].each(function() {
								price = $(this).html();
							});
						} else {
							price = auctionObjects[item.Auction.element]['bid-price'].html();
						}
                        price = convertToNumber(price);

                        if (auctionObjects[item.Auction.element]['bid-bidder'].html() != item.LastBid.username) {
                            auctionObjects[item.Auction.element]['bid-bidder'].html(item.LastBid.username);
                        }

                        if (price != convertToNumber(item.Auction.price)) {
                            auctionObjects[item.Auction.element]['bid-price'].html(item.Auction.price);
                            auctionObjects[item.Auction.element]['flash-elements'].effect("highlight", {startcolor: "#ffffff", endcolor: "#ffffff"}, 500);
                        }

                        if (item.Auction.peak_only == 1 && item.Auction.isPeakNow == 0 && item.Auction.status_id > 1) {
                            auctionObjects[item.Auction.element]['countdown'].html('Pause');
                            auctionObjects[item.Auction.element]['bid-button-a'].hide();
                        } else if (item.Auction.status_id == 1) {
							auctionObjects[item.Auction.element]['countdown'].html('Bientôt');
						} else {
                            if (item.Auction.end_time - item.Auction.serverTimestamp > 0) {
								auctionObjects[item.Auction.element]['countdown'].html(item.Auction.end_time_string);

                                if (item.Auction.time_left <= 10) {
                                    auctionObjects[item.Auction.element]['countdown'].css('color', '#ff0000');
                                } else {
                                    auctionObjects[item.Auction.element]['countdown'].removeAttr('style');
                                }
                            } else {
								auctionObjects[item.Auction.element]['countdown'].html("Vérification...");
							}
                        }

                        if (item.Auction.time_left < 1 && item.Auction.closed == 1) {
                            auctionObjects[item.Auction.element]['countdown'].html('Terminé!');
							auctionObjects[item.Auction.element]['bid-button'].hide();
                        }
						
						if (auctionObjects[item.Auction.element]['bid-histories'].length) {
							auctionObjects[item.Auction.element]['bid-histories-tbody'].empty();
							
							if (item.Histories) {
								$.each(item.Histories, function(n, tRow) {
									var row = '<tr style="border-bottom:1px dotted #f1f1f1; font-size:12px;"><td>' + tRow.Bid.created + '</td><td>' + tRow.Bid.amount + '</td><td style="text-align:center;">' + tRow.Bid.username + '</td><td>' + tRow.Bid.description + '</td></tr>';
									auctionObjects[item.Auction.element]['bid-histories-tbody'].append(row);
								});
							}

						}
                    });
                }
            });
        }, 1000);
    } else {
        if (bidOfficialTime.length) {
            setInterval(function() {
                $.get("/gettime.php", function(data) {
					bidOfficialTime.html(data);
				});
            }, 1000);
        }
    }
	
    $('.bid-button a').on("click", function() {
        var auctionElement = '#auction_' + $(this).attr('id');
		var auctionURL = '/bid.php?id=' + $(this).attr('id');		
		$.get(auctionURL, function(data) {
			$(auctionElement).find(".bid-message").html(data).slideDown("fast").delay(2000).slideUp("fast");
		});
    });
	
	$('#login').on("click", function() {
		$(".login-box").slideToggle();
		if ($(this).hasClass("on")) {
			$(this).removeClass("on");
		} else {
			$(this).addClass("on");
		}
		$("#username-input").focus();
	});
	
	$('#auction-options-link').on("click", function() {
		$(".auction-options").slideToggle();
	});

});