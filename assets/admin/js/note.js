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