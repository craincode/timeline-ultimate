<?php

function timeline_um_body_flat($post_id)
	{
		
		
		
		$timeline_um_bg_img = get_post_meta( $post_id, 'timeline_um_bg_img', true );
		$timeline_um_themes = get_post_meta( $post_id, 'timeline_um_themes', true );
		$timeline_um_total_items = get_post_meta( $post_id, 'timeline_um_total_items', true );		
		$timeline_um_column_number = get_post_meta( $post_id, 'timeline_um_column_number', true );
		$timeline_um_auto_play = get_post_meta( $post_id, 'timeline_um_auto_play', true );
		$timeline_um_stop_on_hover = get_post_meta( $post_id, 'timeline_um_stop_on_hover', true );
		$timeline_um_slider_navigation = get_post_meta( $post_id, 'timeline_um_slider_navigation', true );
		$timeline_um_slide_speed = get_post_meta( $post_id, 'timeline_um_slide_speed', true );
				
		$timeline_um_slider_pagination = get_post_meta( $post_id, 'timeline_um_slider_pagination', true );
		$timeline_um_pagination_slide_speed = get_post_meta( $post_id, 'timeline_um_pagination_slide_speed', true );
		$timeline_um_slider_pagination_count = get_post_meta( $post_id, 'timeline_um_slider_pagination_count', true );
		
		$timeline_um_slider_pagination_bg = get_post_meta( $post_id, 'timeline_um_slider_pagination_bg', true );		
		
		
		$timeline_um_slider_touch_drag = get_post_meta( $post_id, 'timeline_um_slider_touch_drag', true );
		$timeline_um_slider_mouse_drag = get_post_meta( $post_id, 'timeline_um_slider_mouse_drag', true );
		
		$timeline_um_content_source = get_post_meta( $post_id, 'timeline_um_content_source', true );
		$timeline_um_content_year = get_post_meta( $post_id, 'timeline_um_content_year', true );
		$timeline_um_content_month = get_post_meta( $post_id, 'timeline_um_content_month', true );
		$timeline_um_content_month_year = get_post_meta( $post_id, 'timeline_um_content_month_year', true );
		
		$timeline_um_post_content = get_post_meta( $post_id, 'timeline_um_post_content', true );			
		$timeline_um_posttype = get_post_meta( $post_id, 'timeline_um_posttype', true );			
		$timeline_um_taxonomy = get_post_meta( $post_id, 'timeline_um_taxonomy', true );		
		$timeline_um_taxonomy_category = get_post_meta( $post_id, 'timeline_um_taxonomy_category', true );	
			
		$timeline_um_post_ids = get_post_meta( $post_id, 'timeline_um_post_ids', true );


		$timeline_um_middle_line_bg = get_post_meta( $post_id, 'timeline_um_middle_line_bg', true );
		$timeline_um_middle_circle_bg = get_post_meta( $post_id, 'timeline_um_middle_circle_bg', true );		
		

		$timeline_um_items_title_color = get_post_meta( $post_id, 'timeline_um_items_title_color', true );			
		$timeline_um_items_title_font_size = get_post_meta( $post_id, 'timeline_um_items_title_font_size', true );		

		$timeline_um_items_content_color = get_post_meta( $post_id, 'timeline_um_items_content_color', true );
		$timeline_um_items_content_font_size = get_post_meta( $post_id, 'timeline_um_items_content_font_size', true );

		
		$timeline_um_items_thumb_size = get_post_meta( $post_id, 'timeline_um_items_thumb_size', true );
		$timeline_um_items_thumb_max_hieght = get_post_meta( $post_id, 'timeline_um_items_thumb_max_hieght', true );
		
		$timeline_um_ribbon_name = get_post_meta( $post_id, 'timeline_um_ribbon_name', true );		
		
		
		
		
		$timeline_um_body = '';
		$timeline_um_body = '<style type="text/css"></style>';
		
		
		
		$timeline_um_body .= '
		<div  class="timeline_um-container" style="background-image:url('.$timeline_um_bg_img.')">
		<div style="background:'.$timeline_um_middle_line_bg.'" class="middle-line"></div>
		<ul  id="timeline_um-'.$post_id.'" class="timeline_um-items timeline_um-'.$timeline_um_themes.'">';
		
		global $wp_query;
		


		
		if(($timeline_um_content_source=="latest"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => $timeline_um_total_items,
						
						) );
			
			
			}		
		
		elseif(($timeline_um_content_source=="older"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,
						'orderby' => 'date',
						'order' => 'ASC',
						'posts_per_page' => $timeline_um_total_items,
						
						) );

			}		

		elseif(($timeline_um_content_source=="featured"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,
						'meta_query' => array(
							array(
								'key' => '_featured',
								'value' => 'yes',
								)),
						'posts_per_page' => $timeline_um_total_items,
						
						) );

			}	


		elseif(($timeline_um_content_source=="year"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,
						'year' => $timeline_um_content_year,
						'posts_per_page' => $timeline_um_total_items,
						) );

			}

		elseif(($timeline_um_content_source=="month"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,
						'year' => $timeline_um_content_month_year,
						'monthnum' => $timeline_um_content_month,
						'posts_per_page' => $timeline_um_total_items,
						
						) );

			}

		elseif($timeline_um_content_source="taxonomy")
			{
				$wp_query = new WP_Query(
					array (
						'post_type' => $timeline_um_posttype,							
						'posts_per_page' => $timeline_um_total_items,
						
						'tax_query' => array(
							array(
								   'taxonomy' => $timeline_um_taxonomy,
								   'field' => 'id',
								   'terms' => $timeline_um_taxonomy_category,
							)
						)
						
						) );
			}


		
		elseif(($timeline_um_content_source=="post_id"))
			{
			
				$wp_query = new WP_Query(
					array (
						'post__in' => $timeline_um_post_ids,
						'post_type' => $timeline_um_posttype,
						
						
						) );
			
			
			}

			

								
		
		if ( $wp_query->have_posts() ) :
		
		
		
		$i=0;
		
		while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
		$timeline_um_featured = get_post_meta( get_the_ID(), '_featured', true );
		$timeline_um_thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $timeline_um_items_thumb_size );
		$timeline_um_thumb_url = $timeline_um_thumb['0'];
		
		
		
		
		if($i%2==0)
			{
				$even_odd = "even";
			}
		else
			{
				$even_odd = "odd";
			}
			
			
		
		$timeline_um_body.= '<li class="timeline_um-item '.$even_odd.'" >';
		$timeline_um_body.= '<div style="background:'.$timeline_um_middle_circle_bg.'" class="timeline_um-button"></div>';
		$timeline_um_body.= '<div class="timeline_um-post">';		
		$timeline_um_body.= '<div class="timeline_um-arrow"></div>';

		
			
		if($timeline_um_featured=="yes")
			{
			$timeline_um_body.= '<div class="timeline_um-featured"></div>';
			}
		
		if(!empty($timeline_um_thumb_url))
			{
					$timeline_um_body.= '
		<div style="max-height:'.$timeline_um_items_thumb_max_hieght.';" class="timeline_um-thumb">
			<a href="'.get_permalink().'">
				<img src="'.$timeline_um_thumb_url.'" />
			</a>
		</div>';
			}
				
		$timeline_um_body.= '
			<div class="timeline_um-title" style="color:'.$timeline_um_items_title_color.';font-size:'.$timeline_um_items_title_font_size.'">'.get_the_title().'
			</div>
			
<div class="timeline_um-share" >

<span class="fb">
	<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.get_permalink().'"> </a>
</span>
<span class="twitter">
	<a target="_blank" href="https://twitter.com/intent/tweet?url='.get_permalink().'&text='.get_the_title().'"></a>
</span>
<span class="gplus">
	<a target="_blank" href="https://plus.google.com/share?url='.get_permalink().'"></a>
</span>

</div>	
			
			
			
			<div class="timeline_um-content" style="color:'.$timeline_um_items_content_color.';font-size:'.$timeline_um_items_content_font_size.'">'.timeline_um_get_content($timeline_um_post_content, get_the_ID(), $post_id ).'
			</div>			
			
			</div>

		</li>';
		
		
		$i++;
		
		endwhile;
		
		wp_reset_query();
		endif;
		

			
		$timeline_um_body .= '</ul></div>';
		

		
		
		return $timeline_um_body;
		
		    
		
		
		
		
		
		
		
		
		
		
		
		
	}