	</div>
</div>

<footer id="footer">
	<div class="main">
		<div class="inner">
			<div class="useful-links">
				<h3>{$lang.Useful_links}</h3>
				<ul>
					<li><a href="/how-it-works">{$lang.Menu.How_it_works}</a></li>
					<li><a href="/faq">{$lang.Faq}</a></li>
					<li><a href="/promotions">{$lang.Promotions}</a></li>
					<li><a href="/sitemap">{$lang.Sitemap}</a></li>
				</ul>
			</div>
			<div class="infos">
				<h3>{$lang.Informations}</h3>
				<ul>
					<li><a href="/about">{$lang.Who_are_us}</a></li>
					<li><a href="/privacy">{$lang.Privacy_policy_data_protection}</a></li>
					<li><a href="/terms">{$lang.cgu}</a></li>
					<li><a href="/contact">{$lang.Contact}</a></li>
				</ul>
			</div>
			<div class="social">
				<h3>{$lang.Social_networks}</h3>
				<div class="fb-like-box" data-href="https://www.facebook.com/FacebookDevelopers" data-width="250" data-height="200" data-colorscheme="dark" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
			</div>
		</div>
	</div>
	<div class="bottom">
		<div class="inner">
			&copy; 2009 - 
			{literal}
				<script type="text/javascript">
					d = new Date;
					document.write(d.getFullYear());
				</script> 
			{/literal} 
			eBidix &reg; Tous droits réservés / All rights reserved
		</div>
	</div>
</footer>

<script type="text/javascript" src="/assets/js/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
{if $settings.google_analytics.active}
	{literal}
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', '{/literal}{$settings.google_analytics.id}{literal}']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
	{/literal}
{/if}

</body>
</html>