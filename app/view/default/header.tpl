<!DOCTYPE html>
<html lang="{$settings.app.language}">
<head>
	<meta charset="{$settings.app.encoding}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{$settings.app.default_meta_title}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="{$settings.app.default_meta_description}">
	<meta name="keywords" content="{$settings.app.default_meta_keywords}">
	<link type="text/css" media="screen" rel="stylesheet" href="/assets/css/style.css" />
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico" />
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Custom CSS -->
    <link href="/assets/css/blog-home.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<!-- Add fancyBox -->
<link rel="stylesheet" href="/assets/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/assets/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />

<link rel="stylesheet" href="/assets/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&appId=573818542715607&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>



	<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Ebidix</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
									<li class="dropdown {if isset($active) && $active == 2}active{/if}">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$lang.Menu.Categories} <span class="caret"></span></a>
										<ul class="dropdown-menu">
											{foreach from=$categories item=category}
												<li><a href="/auction/category/{$category.id}">{$category.name}</a></li>
											{/foreach}
										</ul>
									</li>
									<li class="{if isset($active) && $active == 3}active{/if}"><a href="/closed-auctions">{$lang.Menu.Closed_auctions}</a></li>
									<li class="{if isset($active) && $active == 4}active{/if}"><a href="/how-it-works">{$lang.Menu.How_it_works}</a></li>
									{if isset($smarty.session.user_id)}
										<li class="{if isset($active) && $active == 5}active{/if}"><a href="/packages">{$lang.Menu.Buy_credits}</a></li>
										<li class="dropdown {if isset($active) && $active == 6}active{/if}">
											<a href="/account" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{$lang.Menu.My_account} <span class="caret"></span></a>
											<ul class="dropdown-menu">
<<<<<<< HEAD
												{if isset($smarty.session.user_id)}
												{if isset($smarty.session.admin)}<li><a href="/admin" class="admin">Admin</a></li>{/if}
												
													<li><a href="/user/logout">{$lang.logout}</a></li>
												
												{/if}
=======
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
												<li><a href="/edit-account">{$lang.User_menu.Edit_account}</a></li>
												<li><a href="/edit-password">{$lang.User_menu.Change_password}</a></li>
												<li><a href="/messages">{$lang.User_menu.My_messages}</a></li>
												<li><a href="/watchlist">{$lang.User_menu.My_watchlist}</a></li>
												<li><a href="/autobids">{$lang.User_menu.My_autobids}</a></li>
												<li><a href="/email-alerts">{$lang.User_menu.My_email_alerts}</a></li>
												<li><a href="/won-auctions">{$lang.User_menu.My_won_auctions}</a></li>
												<li><a href="/credits">{$lang.User_menu.My_credits}</a></li>
												<li><a href="/debits">{$lang.User_menu.My_debits}</a></li>
												<li><a href="/referrals">{$lang.User_menu.Referrals}</a></li>
												{*<li><a href="/users/invit">{$lang.User_menu.Invit_my_friends}</a></li>*}
<<<<<<< HEAD

=======
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
											</ul>
										</li>
									{else}
										<li class="btn-success {if isset($active) && $active == 7}active{/if}"><a class="signup" href="/signup">{$lang.Menu.Sign_up}</a></li>
									{/if}
                </ul>

								<ul class="nav navbar-nav navbar-right">
									<li>
											<a href="#">{if $settings.app.show_server_time == 'yes'}<div class="bid-official-time">&nbsp;</div>{/if}</a>
									</li>
									<li>

<<<<<<< HEAD
											{if !isset($smarty.session.user_id)}
												<a href="#" id="login" data-toggle="modal" data-target="#myModal">{$lang.Login}</a>
=======
											{if isset($smarty.session.user_id)}
												{if isset($smarty.session.admin)}<a href="/admin" class="admin">Admin</a> - {/if}
												<a href="/user/logout">{$lang.logout}</a>
											{else}
												<a href="#" id="login">{$lang.Login}</a>
>>>>>>> 61ea784ce2063bc7be7f33a27a060646a4812729
											{/if}

									</li>
									<li>
										<a href="/?lang=fr"><img src="/assets/img/flags/fr.png" alt=""></a>
									</li>
									<li>
										<a href="/?lang=en"><img src="/assets/img/flags/uk.png" alt=""></a>
									</li>
								</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

		<div class="container">
			<div class="wrap">
			{if isset($smarty.session.flash_message)}{$smarty.session.flash_message}{/if}
