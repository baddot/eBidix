{include file='admin/elements/header.tpl'}

	<div class="container_12">
		<div class="crumb">&raquo <a href="/admin/polls">{$lang.Polls}</a> &raquo {$lang.Edit}</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3>{$lang.Polls}</h3>
					</div>
					<div class="bcont">
						<form method="post" action="/admin/polls/edit/{$poll.id}">
							<p>
								<label>{$lang.Question} <span style="color:red;">*</span> :</label><br />
								<input type="text" name="question" class="inputtext medium" value="{$poll.question}" />
							</p>
							<p>
								<label>{$lang.Response} 1 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_1" class="inputtext medium" value="{$poll.response_1}" />
							</p>
							<p>
								<label>{$lang.Response} 2 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_2" class="inputtext medium" value="{$poll.response_2}" />
							</p>
							<p>
								<label>{$lang.Response} 3 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_3" class="inputtext medium" value="{$poll.response_3}" />
							</p>
							<p>
								<label>{$lang.Response} 4 <span style="color:red;">*</span> :</label><br />
								<input type="text" name="response_4" class="inputtext medium" value="{$poll.response_4}" />
							</p>
							<p>
								<input type="checkbox" name="active" value="1" class="checkbox" {if $poll.active == 1}checked="checked"{/if} /> <label>{$lang.Activate}</label>
							</p>							
							<p>
								<button name="submit" class="button green"><span>{$lang.Edit}</span></button> <br /><br />{$lang.fields_required}
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

{include file='admin/elements/footer.tpl'}