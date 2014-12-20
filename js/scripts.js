
jQuery(document).ready(function($)
	{
		

		
		$(document).on('click', '.timeline_um_content_source', function()
			{	
				var source = $(this).val();
				var source_id = $(this).attr("id");
				
				$(".content-source-box.active").removeClass("active");
				$(".content-source-box."+source_id).addClass("active");
				
			})
		

		
		
		
		jQuery(".timeline_um_taxonomy").click(function()
			{
				
				var taxonomy = jQuery(this).val();
				
				jQuery(".timeline_um_loading_taxonomy_category").css('display','block');

						jQuery.ajax(
							{
						type: 'POST',
						url: timeline_um_ajax.timeline_um_ajaxurl,
						data: {"action": "timeline_um_get_taxonomy_category","taxonomy":taxonomy},
						success: function(data)
								{	
									jQuery(".timeline_um_taxonomy_category").html(data);
									jQuery(".timeline_um_loading_taxonomy_category").fadeOut('slow');
								}
							});

		
			})
		
	
 		

	});	







