{include file='elements/header.tpl'}
	
	{literal}
	<script type="text/javascript">
	$(document).ready(function() { 
	 
		$("ul.notes_scale").addClass("js"); 
		$("ul.notes_scale li").addClass("note-off"); 
		 
		$("ul.notes_scale li").mouseover(function() { 
			$(this).nextAll("li").addClass("note-off"); 
			$(this).prevAll("li").removeClass("note-off"); 
			$(this).removeClass("note-off"); 
		}); 
			 
		$("ul.notes_scale").mouseout(function() { 
			$(this).children("li").addClass("note-off"); 
			$(this).find("li input:checked").parent("li").trigger("mouseover"); 
		}); 
		
		$("ul.notes_scale input")
		.focus(function() {         
			$(this).parent("li").nextAll("li").addClass("note-off"); 
			$(this).parent("li").prevAll("li").removeClass("note-off"); 
			$(this).parent("li").removeClass("note-off"); 
		}) 
		.blur(function() { 
			if($(this).parents("ul.notes_scale").find("li input:checked").length == 0) { 
				$(this).parents("ul.notes_scale").find("li").addClass("note-off"); 
			} 
		});
		
		$("ul.notes_scale input") 
		.focus(function() { 
			$(this).parents("ul.notes_scale").find("li").removeClass("note-focus"); 
			$(this).parent("li").addClass("note-focus"); 
		}) 
		.blur(function() { 
			$(this).parents("ul.notes_scale").find("li").removeClass("note-focus"); 
		}) 
		.click(function() { 
			$(this).parents("ul.notes_scale").find("li").removeClass("note-checked"); 
			$(this).parent("li").addClass("note-checked"); 
		});
		
		$("ul.notes_scale input:checked").parent("li").trigger("mouseover"); 
		$("ul.notes_scale input:checked").trigger("click");
	});
	</script>
	{/literal}
	
	<div id="total-column">
		<div id="case">
			<div class="title">{$lang.My_account}</div>
		</div>
		<div id="user-menu">
			{include file='elements/user_menu.tpl'}
		</div>
		<div id="user-content">
			<div class="crumb">&raquo {$lang.Leave_comment}</div>
			
			{if !empty($errors_text)}
				<div style="color:red; font-weight:bold; margin-bottom:15px;">
					{$errors_text}
				</div>
			{/if}
			
			<div>{$lang.Testimonial_text}</div>
			
			<div style="margin-top:20px; text-align:left;">
				<form method="post" action="/testimonials/add/{$id}" enctype="multipart/form-data">
					<ul style="list-style-type:none;">
						<li style="margin:10px 0 10px 0;">{$lang.Image} : <input type="hidden" name="MAX_FILE_SIZE" value="1000000" /><input type="file" name="image" /></li>
						<li style="padding-bottom:25px; margin:10px 0 10px 0;"><div style="float:left; display:inline;">{$lang.Note} <span style="color:red;">*</span> : </div>
							<div style="float:left; display:inline; margin-left:10px;"><ul class="notes_scale"> 
								<li><label for="note01" title="{$lang.Note} : 1/5">1</label> <input type="radio" name="note" id="note01" value="1" /></li> 
								<li><label for="note02" title="{$lang.Note} : 2/5">2</label> <input type="radio" name="note" id="note02" value="2" /></li> 
								<li><label for="note03" title="{$lang.Note} : 3/5">3</label> <input type="radio" name="note" id="note03" value="3" /></li>
								<li><label for="note04" title="{$lang.Note} : 4/5">4</label> <input type="radio" name="note" id="note04" value="4" /></li>
								<li><label for="note05" title="{$lang.Note} : 5/5">5</label> <input type="radio" name="note" id="note05" value="5" /></li>
							</ul></div>
						</li>
						<li style="margin:10px 0 10px 0;">{$lang.Message} <span style="color:red;">*</span> : <br /><textarea cols="50" rows="10" name="text"></textarea></li>
						<li style="margin:10px 0 10px 0;"><button class="button green" name="submit"><span>{$lang.Add}</span></button> <br /><br />{$lang.fields_required}</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
	
</div>
{include file='elements/footer.tpl'}
