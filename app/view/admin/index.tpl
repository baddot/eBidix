{include file='admin/elements/header.tpl'}
		
		<div class="container_12">
			<div class="crumb">&raquo {$lang.Home}</div>
			<div class="grid_4">
				<div class="sb-box">
					<div class="sb-box-inner content">
						<div class="header">
							<h3>{$lang.Infos}</h3>
						</div>
						
						<div class="bcont">
							<p>
								<b>{$lang.Income} :</b>
								<ul class="fast_links">
									<li>{$lang.Today} : <a href="/admin/auctions/bids?type=package&sort_by=today">{$data.today_income}&euro;</a></li>
									<li>{$lang.Yesterday} : <a href="/admin/auctions/bids?type=package&sort_by=yesterday">{$data.yesterday_income}&euro;</a></li>
									<li>{$lang.This_week} : <a href="/admin/auctions/bids?type=package&sort_by=this_week">{$data.weekly_income}&euro;</a></li>
									<li>{$lang.This_month} : <a href="/admin/auctions/bids?type=package&sort_by=this_month">{$data.monthly_income}&euro;</a></li>
									<li>{$lang.Last_month} : <a href="/admin/auctions/bids?type=package&sort_by=last_month">{$data.last_month_income}&euro;</a></li>
									<li>{$lang.This_year} : <a href="/admin/auctions/bids?type=package&sort_by=this_year">{$data.yearly_income}&euro;</a></li>
									<li style="margin-top:10px;">{$lang.Registered_users} : <a href="/admin/user">{$data.registered_users}</a></li>
									<li>{$lang.Online_users} : <a href="/admin/dashboard/online_users">{$data.online_users}</a></li>
								</ul>
							</p>
							<p>
								<b>{$lang.Fast_links}</b>
								<ul class="fast_links">
									<li><a href="/admin/product/add">{$lang.Add_product}</a></li>
									<li><a href="/admin/user/add">{$lang.Add_user}</a></li>
									<li><a href="/admin/product">{$lang.Start_new_auction}</a></li>
									<li><a href="http://www.google.com/analytics/" target="_blank">{$lang.Usage_stats}</a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="grid_8">
				<div class="sb-box">
					<div class="sb-box-inner content">
						<div class="header">
							<h3>{$lang.Stats}</h3>
							<ul class="tabs" id="vis-setter">
								<li><a href="#" rel="area">Area</a></li>
								<li><a href="#" rel="line">Line</a></li>
								<li><a href="#" rel="bar">Bar</a></li>
								<li><a href="#" rel="pie">Pie</a></li>
							</ul>
						</div>
						<div class="bcont" id="visualize">
							<table class="graph">
								<caption>{$month}</caption>
								<thead>
									<tr>
										<td></td>
										{foreach from=$days item=day}
											<th scope="col">{$day}</th>
										{/foreach}
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row">{$lang.Income}</th>
										<td>673</td>
										<td>31</td>
										<td>10</td>
										<td>5</td>
										<td>478</td>
										<td>641</td>
										<td>518</td>
										<td>372</td>
										<td>346</td>
										<td>296</td>
										<td>200</td>
										<td>133</td>
										<td>177</td>
										<td>185</td>
										<td>192</td>
										<td>196</td>
										<td>150</td>
										<td>114</td>
										<td>121</td>
										<td>192</td>
										<td>128</td>
										<td>158</td>
										<td>168</td>
										<td>155</td>
									</tr>
									<tr>
										<th scope="row">{$lang.Outgoings}</th>
										<td>800</td>
										<td>35</td>
										<td>19</td>
										<td>6</td>
										<td>559</td>
										<td>764</td>
										<td>1083</td>
										<td>507</td>
										<td>426</td>
										<td>368</td>
										<td>250</td>
										<td>147</td>
										<td>236</td>
										<td>225</td>
										<td>260</td>
										<td>249</td>
										<td>191</td>
										<td>136</td>
										<td>142</td>
										<td>237</td>
										<td>153</td>
										<td>193</td>
										<td>208</td>
										<td>185</td>
									</tr>	
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<div class="clearingfix"></div>
		</div>

{include file='admin/elements/footer.tpl'}