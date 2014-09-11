<?php


function timeline_um_posttype_register() {
 
        $labels = array(
                'name' => _x('Timeline Ultimate', 'timeline_um'),
                'singular_name' => _x('Timeline Ultimate', 'timeline_um'),
                'add_new' => _x('New Timeline Ultimate', 'timeline_um'),
                'add_new_item' => __('New Timeline Ultimate'),
                'edit_item' => __('Edit Timeline Ultimate'),
                'new_item' => __('New Timeline Ultimate'),
                'view_item' => __('View Timeline Ultimate'),
                'search_items' => __('Search Timeline Ultimate'),
                'not_found' =>  __('Nothing found'),
                'not_found_in_trash' => __('Nothing found in Trash'),
                'parent_item_colon' => ''
        );
 
        $args = array(
                'labels' => $labels,
                'public' => true,
                'publicly_queryable' => true,
                'show_ui' => true,
                'query_var' => true,
                'menu_icon' => null,
                'rewrite' => true,
                'capability_type' => 'post',
                'hierarchical' => false,
                'menu_position' => null,
                'supports' => array('title'),
				'menu_icon' => 'dashicons-media-spreadsheet',
				
          );
 
        register_post_type( 'timeline_um' , $args );

}

add_action('init', 'timeline_um_posttype_register');





/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function meta_boxes_timeline_um()
	{
		$screens = array( 'timeline_um' );
		foreach ( $screens as $screen )
			{
				add_meta_box('timeline_um_metabox',__( 'Timeline Ultimate Options','timeline_um' ),'meta_boxes_timeline_um_input', $screen);
			}
	}
add_action( 'add_meta_boxes', 'meta_boxes_timeline_um' );


function meta_boxes_timeline_um_input( $post ) {
	
	global $post;
	wp_nonce_field( 'meta_boxes_timeline_um_input', 'meta_boxes_timeline_um_input_nonce' );
	
	
	$timeline_um_bg_img = get_post_meta( $post->ID, 'timeline_um_bg_img', true );
	$timeline_um_themes = get_post_meta( $post->ID, 'timeline_um_themes', true );
	$timeline_um_total_items = get_post_meta( $post->ID, 'timeline_um_total_items', true );	
		
	
	$timeline_um_post_content = get_post_meta( $post->ID, 'timeline_um_post_content', true );	
	$timeline_um_post_excerpt_count = get_post_meta( $post->ID, 'timeline_um_post_excerpt_count', true );	
	$timeline_um_post_excerpt_text = get_post_meta( $post->ID, 'timeline_um_post_excerpt_text', true );		
	
	$timeline_um_content_source = get_post_meta( $post->ID, 'timeline_um_content_source', true );
	$timeline_um_content_year = get_post_meta( $post->ID, 'timeline_um_content_year', true );
	$timeline_um_content_month = get_post_meta( $post->ID, 'timeline_um_content_month', true );
	$timeline_um_content_month_year = get_post_meta( $post->ID, 'timeline_um_content_month_year', true );	

	$timeline_um_posttype = get_post_meta( $post->ID, 'timeline_um_posttype', true );
	$timeline_um_taxonomy = get_post_meta( $post->ID, 'timeline_um_taxonomy', true );
	$timeline_um_taxonomy_category = get_post_meta( $post->ID, 'timeline_um_taxonomy_category', true );
	
	$timeline_um_post_ids = get_post_meta( $post->ID, 'timeline_um_post_ids', true );	

	
	$timeline_um_middle_line_bg = get_post_meta( $post->ID, 'timeline_um_middle_line_bg', true );		
	$timeline_um_middle_circle_bg = get_post_meta( $post->ID, 'timeline_um_middle_circle_bg', true );		
	
	$timeline_um_items_title_color = get_post_meta( $post->ID, 'timeline_um_items_title_color', true );	
	$timeline_um_items_title_font_size = get_post_meta( $post->ID, 'timeline_um_items_title_font_size', true );
	
	$timeline_um_items_content_color = get_post_meta( $post->ID, 'timeline_um_items_content_color', true );	
	$timeline_um_items_content_font_size = get_post_meta( $post->ID, 'timeline_um_items_content_font_size', true );		
	
	
	$timeline_um_items_thumb_size = get_post_meta( $post->ID, 'timeline_um_items_thumb_size', true );	
	$timeline_um_items_thumb_max_hieght = get_post_meta( $post->ID, 'timeline_um_items_thumb_max_hieght', true );	
	
	
	
	
	
	
 






		$timeline_um_customer_type = get_option('timeline_um_customer_type');

		if($timeline_um_customer_type=="free")
			{
				echo '<script>
					jQuery(document).ready(function()
						{
							jQuery(".timeline_um_taxonomy_category, .timeline_um_post_ids, #timeline_um_items_title_color, .timeline_um_themes_saiga, .timeline_um_themes_sako, .timeline_um_themes_anti_ruger, #timeline_um_content_source_taxonomy, #timeline_um_content_source_post_id").attr("title","Only For Premium Version")
							jQuery(".timeline_um_taxonomy_category, .timeline_um_post_ids, #timeline_um_items_title_color, .timeline_um_themes_saiga, .timeline_um_themes_sako, .timeline_um_themes_anti_ruger, #timeline_um_content_source_taxonomy, #timeline_um_content_source_post_id").attr("disabled","disabled")
						
						})
	 				</script>';
      
			}
		elseif($timeline_um_customer_type=="pro")
			{
				//premium customer support.
			}

?>




















<table class="form-table">





<tr valign="top">
		<td >
        
        <strong>Shortcode</strong><br />
  <span style=" color:#22aa5d;font-size: 12px;">Copy this shortcode and paste on page or post where you want to display timeline, <br />Use PHP code to your themes file to display timeline.</span>
        
        <br /> <br /> 
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" >[timeline_um <?php echo ' id="'.$post->ID.'"';?> ]</textarea>
        <br /><br />
        PHP Code:<br />
        <textarea cols="50" rows="1" style="background:#bfefff" onClick="this.select();" ><?php echo '<?php echo do_shortcode("[timeline_um id='; echo "'".$post->ID."' ]"; echo '"); ?>'; ?></textarea>  
        
 <br />

		</td>
	</tr>






    <tr valign="top">

        <td style="vertical-align:middle;">
        
        <ul class="tab-nav">
            <li nav="1" class="nav1 active">Timeline Options</li>
            <li nav="2" class="nav2">Timeline Style</li>
            <li nav="3" class="nav3">Timeline Content</li>
        
        </ul>


        <ul class="box">
            <li style="display: block;" class="box1 tab-box active">
            
            
            <table>
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Number of post to display.</strong><br /><br /> 
                        
                        <input type="text" placeholder="ex:5 - Number Only"   name="timeline_um_total_items" value="<?php if(!empty($timeline_um_total_items))echo $timeline_um_total_items; else echo 5; ?>" />
                
                    </td>
                </tr>
                
                
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Thumbnail Size</strong><br /><br /> 
                    <select name="timeline_um_items_thumb_size" >
                    <option value="none" <?php if($timeline_um_items_thumb_size=="none")echo "selected"; ?>>None</option>
                    <option value="thumbnail" <?php if($timeline_um_items_thumb_size=="thumbnail")echo "selected"; ?>>Thumbnail</option>
                    <option value="medium" <?php if($timeline_um_items_thumb_size=="medium")echo "selected"; ?>>Medium</option>
                    <option value="large" <?php if($timeline_um_items_thumb_size=="large")echo "selected"; ?>>Large</option>                               
                    <option value="full" <?php if($timeline_um_items_thumb_size=="full")echo "selected"; ?>>Full</option>   

                    </select>
                    </td>
				</tr>
                
                
<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Thumbnail max hieght(px)</strong><br /><br />
                    <input type="text" name="timeline_um_items_thumb_max_hieght" placeholder="ex:150px number with px" id="timeline_um_items_thumb_max_hieght" value="<?php if(!empty($timeline_um_items_thumb_max_hieght)) echo $timeline_um_items_thumb_max_hieght; else echo ""; ?>" />
                    </td>
				</tr>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
                

                
                
            </table>
            
            
            
            
            
            </li>
            <li class="box2 tab-box">
            
            <table>
                <tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Themes</strong><br /><br /> 
                    <select name="timeline_um_themes"  >
                    <option class="timeline_um_themes_flat" value="flat" <?php if($timeline_um_themes=="flat")echo "selected"; ?>>Flat</option>
                  
                    </select>
                    </td>
				</tr>


                


				

                
                
                
                
                                           
            <script>
            jQuery(document).ready(function(jQuery)
                {
                        jQuery(".timeline_um_bg_img_list li").click(function()
                            { 	
                                jQuery('.timeline_um_bg_img_list li.bg-selected').removeClass('bg-selected');
                                jQuery(this).addClass('bg-selected');
                                
                                var timeline_um_bg_img = jQuery(this).attr('data-url');
            
                                jQuery('#timeline_um_bg_img').val(timeline_um_bg_img);
                                
                            })	
            
                                
                })
            
            </script> 
                            
                            
                            
                            
                            
                            
            <tr valign="top">
            
                    <td style="vertical-align:middle;">
                    
                    <strong>Background Image</strong><br /><br /> 
                    
            
            <?php
            
            
            
                $dir_path = timeline_um_plugin_dir."css/bg/";
                $filenames=glob($dir_path."*.png*");
            
            
                $timeline_um_bg_img = get_post_meta( $post->ID, 'timeline_um_bg_img', true );
                
                if(empty($timeline_um_bg_img))
                    {
                    $timeline_um_bg_img = "";
                    }
            
            
                $count=count($filenames);
                
            
                $i=0;
                echo "<ul class='timeline_um_bg_img_list' >";
            
                while($i<$count)
                    {
                        $filelink= str_replace($dir_path,"",$filenames[$i]);
                        
                        $filelink= timeline_um_plugin_url."css/bg/".$filelink;
                        
                        
                        if($timeline_um_bg_img==$filelink)
                            {
                                echo '<li  class="bg-selected" data-url="'.$filelink.'">';
                            }
                        else
                            {
                                echo '<li   data-url="'.$filelink.'">';
                            }
                        
                        
                        echo "<img  width='70px' height='50px' src='".$filelink."' />";
                        echo "</li>";
                        $i++;
                    }
                    
                echo "</ul>";
                
                echo "<input style='width:100%;' value='".$timeline_um_bg_img."'    placeholder='Please select image or left blank' id='timeline_um_bg_img' name='timeline_um_bg_img'  type='text' />";
            
            
            
            ?>
                    </td>
                </tr>
                      

				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Middle Circle Background Color</strong><br /><br />
                    <input type="text" name="timeline_um_middle_circle_bg" id="timeline_um_middle_circle_bg" value="<?php if(!empty($timeline_um_middle_circle_bg)) echo $timeline_um_middle_circle_bg; else echo "#28c8a8"; ?>" />
                    </td>
				</tr>


         
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Middle Line Background Color</strong><br /><br />
                    <input type="text" name="timeline_um_middle_line_bg" id="timeline_um_middle_line_bg" value="<?php if(!empty($timeline_um_middle_line_bg)) echo $timeline_um_middle_line_bg; else echo "#28c8a8"; ?>" />
                    </td>
				</tr>
                

                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Title Color</strong><br /><br />
                    <input type="text" name="timeline_um_items_title_color" id="timeline_um_items_title_color" value="<?php if(!empty($timeline_um_items_title_color)) echo $timeline_um_items_title_color; else echo "#28c8a8"; ?>" />
                    </td>
				</tr>                
                
                
				<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Title Font Size</strong><br /><br />
                    <input type="text" name="timeline_um_items_title_font_size" placeholder="ex:14px number with px" id="timeline_um_items_title_font_size" value="<?php if(!empty($timeline_um_items_title_font_size)) echo $timeline_um_items_title_font_size; else echo "14px"; ?>" />
                    </td>
				</tr>                   




<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Content Color</strong><br /><br />
                    <input type="text" name="timeline_um_items_content_color" id="timeline_um_items_content_color" value="<?php if(!empty($timeline_um_items_content_color)) echo $timeline_um_items_content_color; else echo "#fff"; ?>" />
                    </td>
				</tr>



<tr valign="top">
                	<td style="vertical-align:middle;">
                    <strong>Post Content font size</strong><br /><br />
                    <input type="text" name="timeline_um_items_content_font_size" id="timeline_um_items_content_font_size" value="<?php if(!empty($timeline_um_items_content_font_size)) echo $timeline_um_items_content_font_size; else echo "13px"; ?>" />
                    </td>
				</tr>








 
		</table>


            </li>
            
            
            <li class="box3 tab-box">
            

            <table>
            
            
            
            
                <tr valign="top">
                    <td style="vertical-align:middle;">
                    
<strong>Post Content Display</strong><br /><br />
                    
                    
                    <ul class="content_source_area" >

                        <li>
                        	<input class="timeline_um_content_source" name="timeline_um_post_content" id="timeline_um_post_content" type="radio" value="full" <?php if($timeline_um_post_content=="full")  echo "checked";?> /> 
                            <label for="timeline_um_post_content">Display full content</label>
                            <div class="timeline_um_post_content content-source-box">
                            Timeline Content will display from full content.
                            </div>
                        </li>
                        
                        
                        <li>
                        	<input class="timeline_um_content_source" name="timeline_um_post_content" id="timeline_um_post_excerpt" type="radio" value="excerpt" <?php if($timeline_um_post_content=="excerpt")  echo "checked";?> /> 
                            <label for="timeline_um_post_excerpt">Display excerpt</label>
                            <div class="timeline_um_post_excerpt content-source-box">
                            Timeline Content will display from excerpt.<br />
                            Excrept Length:
                            <input type="text" placeholder="25" size="4" name="timeline_um_post_excerpt_count" value="<?php if(!empty($timeline_um_post_excerpt_count))  echo $timeline_um_post_excerpt_count; ?>" />
                            <br />
                            Read More Text: 
                            <input type="text" placeholder="Read More..." size="10" name="timeline_um_post_excerpt_text" value="<?php if(!empty($timeline_um_post_excerpt_text))  echo $timeline_um_post_excerpt_text; ?>" />
                            
                            </div>
                        </li>                        
                        
                        
                        
                        
                        
                        
                        

            
					</ul>
                    
                    
                    
                    </td>           
            
				</tr>
            

            
            
                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Timeline Content Posttype</strong><br /><br /> 
     
<?php

$post_types = get_post_types( '', 'names' ); 

foreach ( $post_types as $post_type ) {

	if($post_type=='post')
		{
		   echo '<label for="timeline_um_posttype['.$post_type.']"><input class="timeline_um_posttype" type="checkbox" name="timeline_um_posttype['.$post_type.']" id="timeline_um_posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $timeline_um_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
	   
		}

	else
		{
		   echo '<label for="timeline_pro-posttype['.$post_type.']"><input type="checkbox" name="timeline_um_posttype['.$post_type.']" class="timeline_um_posttype" id="timeline_pro-posttype['.$post_type.']"  value ="'.$post_type.'" ' ?> 
		   <?php if ( isset( $timeline_um_posttype[$post_type] ) ) echo "checked"; ?>
		   <?php echo' >'. $post_type.'</label><br />' ;
   
		}

}
?>
   
                
                    </td>
                </tr>

                <tr valign="top">
                    <td style="vertical-align:middle;">
                        <strong>Filter Content</strong><br /><br /> 
<ul class="content_source_area" >

            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_latest" type="radio" value="latest" <?php if($timeline_um_content_source=="latest")  echo "checked";?> /> <label for="timeline_um_content_source_latest">Display from Latest Published</label>
            <div class="timeline_um_content_source_latest content-source-box">Slider items will query from latest published product.</div>
            </li>
            
            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_older" type="radio" value="older" <?php if($timeline_um_content_source=="older")  echo "checked";?> /> <label for="timeline_um_content_source_older">Display from Older Published</label>
            <div class="timeline_um_content_source_older content-source-box">Slider items will query from older published product.</div>
            </li>            
            
            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_featured" type="radio" value="featured" <?php if($timeline_um_content_source=="featured")  echo "checked";?> /> <label for="timeline_um_content_source_featured">Display from Featured Post</label>
            
            <div class="timeline_um_content_source_featured content-source-box">Slider items will query from featured marked product.</div>
            </li>
            
            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_year" type="radio" value="year" <?php if($timeline_um_content_source=="year")  echo "checked";?> /> <label for="timeline_um_content_source_year">Display from Only Year</label>
            
            <div class="timeline_um_content_source_year content-source-box">Slider items will query from a year.
            <input type="text" size="7" class="timeline_um_content_year" name="timeline_um_content_year" value="<?php if(!empty($timeline_um_content_year))  echo $timeline_um_content_year;?>" placeholder="2014" />
            </div>
            </li>
            
            
            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_month" type="radio" value="month" <?php if($timeline_um_content_source=="month")  echo "checked";?> /> <label for="timeline_um_content_source_month">Display from Month</label>
            
            <div class="timeline_um_content_source_month content-source-box">Slider items will query from Month of a year.		<br />
			<input type="text" size="7" class="timeline_um_content_month_year" name="timeline_um_content_month_year" value="<?php if(!empty($timeline_um_content_month_year))  echo $timeline_um_content_month_year;?>" placeholder="2014" />            
			<input type="text" size="7" class="timeline_um_content_month" name="timeline_um_content_month" value="<?php if(!empty($timeline_um_content_month))  echo $timeline_um_content_month;?>" placeholder="06" />
            </div>
            </li>            

            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_taxonomy" type="radio" value="taxonomy" <?php if($timeline_um_content_source=="taxonomy")  echo "checked";?> /> <label for="timeline_um_content_source_taxonomy">Display from Taxonomy & Categories</label>
            
            <div class="timeline_um_content_source_taxonomy content-source-box" >
            
            
<table style="width:100%;" >

        	<tr style="overflow:scroll; vertical-align:top;">
            	<td style="overflow:scroll; vertical-align:top; padding:0; width:45%;">
                 
                
                 
<?php 
$timeline_um_taxonomies = get_object_taxonomies( $timeline_um_posttype ); 
if(!empty($timeline_um_taxonomies))
	{
		foreach ($timeline_um_taxonomies as $taxonomy ) {
			?>
		
			
		  <label ><input type="radio" class="timeline_um_taxonomy" name="timeline_um_taxonomy" value="<?php echo $taxonomy; ?>" <?php if($timeline_um_taxonomy==$taxonomy)  echo "checked";?> /><?php echo $taxonomy; ?></label><br />
		  
		  <?php
		}
	}
else
	{
		echo 'No Taxomony found for ';
		echo '<strong>'.implode(', ', $timeline_um_posttype).'</strong>';
	}

?>
                
                </td>
                <td style=" height:auto;vertical-align:top; padding:0; width:45%;">
                <span class="timeline_um_loading_taxonomy_category" ></span>
                <div class="timeline_um_taxonomy_category">
                
				<?php
                if(!empty($timeline_um_taxonomy))
					{
					timeline_um_get_taxonomy_category($post->ID);
					}
				else
					{
					
					}
				
				?>
                
                
				</div>
                
                </td>
            </tr>
 
            
</table>
            

            
            </div>
            </li>           
            <li><input class="timeline_um_content_source" name="timeline_um_content_source" id="timeline_um_content_source_post_id" type="radio" value="post_id" <?php if($timeline_um_content_source=="post_id")  echo "checked";?> /> <label for="timeline_um_content_source_post_id">Display by Post id</label>
            
            <div  class="timeline_um_content_source_post_id content-source-box" >
            
<table style="width:100%;" >


			<tr style="overflow:scroll; vertical-align:top;">
            	<td colspan="2" style="overflow:scroll; vertical-align:top; padding:0; width:45%;">
                
                <div class="" style="max-height:300px; overflow-y:scroll; overflow-x:hidden;max-width:100%;" >
				<?php

                        timeline_um_get_all_post_ids($post->ID);

                ?>
                
                </div>
                
                
                
                </td>
            </tr>


            
            
</table>
            
            
            </div>
            </li>
            </ul>
                
                    </td>
                </tr>
               </table>
            


            </li>
            
            
            
            
            
            
            
        </ul>
        
        
        
        </td>
    </tr> 

</table>
















<?php


	
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function meta_boxes_timeline_um_save( $post_id ) {

  /*
   * We need to verify this came from the our screen and with proper authorization,
   * because save_post can be triggered at other times.
   */

  // Check if our nonce is set.
  if ( ! isset( $_POST['meta_boxes_timeline_um_input_nonce'] ) )
    return $post_id;

  $nonce = $_POST['meta_boxes_timeline_um_input_nonce'];

  // Verify that the nonce is valid.
  if ( ! wp_verify_nonce( $nonce, 'meta_boxes_timeline_um_input' ) )
      return $post_id;

  // If this is an autosave, our form has not been submitted, so we don't want to do anything.
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) 
      return $post_id;



  /* OK, its safe for us to save the data now. */

  // Sanitize user input.
	$timeline_um_bg_img = sanitize_text_field( $_POST['timeline_um_bg_img'] );	
	$timeline_um_themes = sanitize_text_field( $_POST['timeline_um_themes'] );
	$timeline_um_total_items = sanitize_text_field( $_POST['timeline_um_total_items'] );		
	
	
	$timeline_um_post_content = sanitize_text_field( $_POST['timeline_um_post_content'] );
	$timeline_um_post_excerpt_count = sanitize_text_field( $_POST['timeline_um_post_excerpt_count'] );	
	$timeline_um_post_excerpt_text = sanitize_text_field( $_POST['timeline_um_post_excerpt_text'] );


	$timeline_um_content_source = sanitize_text_field( $_POST['timeline_um_content_source'] );
	$timeline_um_content_year = sanitize_text_field( $_POST['timeline_um_content_year'] );
	$timeline_um_content_month = sanitize_text_field( $_POST['timeline_um_content_month'] );
	$timeline_um_content_month_year = sanitize_text_field( $_POST['timeline_um_content_month_year'] );	

	$timeline_um_posttype = stripslashes_deep( $_POST['timeline_um_posttype'] );
	$timeline_um_taxonomy = sanitize_text_field( $_POST['timeline_um_taxonomy'] );
	$timeline_um_taxonomy_category = stripslashes_deep( $_POST['timeline_um_taxonomy_category'] );
	
	$timeline_um_post_ids = stripslashes_deep( $_POST['timeline_um_post_ids'] );	


	$timeline_um_middle_line_bg = sanitize_text_field( $_POST['timeline_um_middle_line_bg'] );
	$timeline_um_middle_circle_bg = sanitize_text_field( $_POST['timeline_um_middle_circle_bg'] );
	
	$timeline_um_items_title_color = sanitize_text_field( $_POST['timeline_um_items_title_color'] );	
	$timeline_um_items_title_font_size = sanitize_text_field( $_POST['timeline_um_items_title_font_size'] );	

	$timeline_um_items_content_color = sanitize_text_field( $_POST['timeline_um_items_content_color'] );	
	$timeline_um_items_content_font_size = sanitize_text_field( $_POST['timeline_um_items_content_font_size'] );	

	$timeline_um_items_thumb_size = sanitize_text_field( $_POST['timeline_um_items_thumb_size'] );
	$timeline_um_items_thumb_max_hieght = sanitize_text_field( $_POST['timeline_um_items_thumb_max_hieght'] );	
	
	
	
			


  // Update the meta field in the database.
	update_post_meta( $post_id, 'timeline_um_bg_img', $timeline_um_bg_img );	
	update_post_meta( $post_id, 'timeline_um_themes', $timeline_um_themes );
	update_post_meta( $post_id, 'timeline_um_total_items', $timeline_um_total_items );	

	
	update_post_meta( $post_id, 'timeline_um_slider_pagination_bg', $timeline_um_slider_pagination_bg );
	update_post_meta( $post_id, 'timeline_um_slider_pagination_text_color', $timeline_um_slider_pagination_text_color );		
	
	update_post_meta( $post_id, 'timeline_um_post_content', $timeline_um_post_content );
	update_post_meta( $post_id, 'timeline_um_post_excerpt_count', $timeline_um_post_excerpt_count );	
	update_post_meta( $post_id, 'timeline_um_post_excerpt_text', $timeline_um_post_excerpt_text );	
	
	
	update_post_meta( $post_id, 'timeline_um_content_source', $timeline_um_content_source );
	update_post_meta( $post_id, 'timeline_um_content_year', $timeline_um_content_year );
	update_post_meta( $post_id, 'timeline_um_content_month', $timeline_um_content_month );
	update_post_meta( $post_id, 'timeline_um_content_month_year', $timeline_um_content_month_year );	

	update_post_meta( $post_id, 'timeline_um_posttype', $timeline_um_posttype );
	update_post_meta( $post_id, 'timeline_um_taxonomy', $timeline_um_taxonomy );
	update_post_meta( $post_id, 'timeline_um_taxonomy_category', $timeline_um_taxonomy_category );

	update_post_meta( $post_id, 'timeline_um_post_ids', $timeline_um_post_ids );	

	update_post_meta( $post_id, 'timeline_um_middle_line_bg', $timeline_um_middle_line_bg );
	update_post_meta( $post_id, 'timeline_um_middle_circle_bg', $timeline_um_middle_circle_bg );	

	update_post_meta( $post_id, 'timeline_um_items_title_color', $timeline_um_items_title_color );
	update_post_meta( $post_id, 'timeline_um_items_title_font_size', $timeline_um_items_title_font_size );

	update_post_meta( $post_id, 'timeline_um_items_content_color', $timeline_um_items_content_color );
	update_post_meta( $post_id, 'timeline_um_items_content_font_size', $timeline_um_items_content_font_size );


	update_post_meta( $post_id, 'timeline_um_items_thumb_size', $timeline_um_items_thumb_size );	
	update_post_meta( $post_id, 'timeline_um_items_thumb_max_hieght', $timeline_um_items_thumb_max_hieght );
	

	

}
add_action( 'save_post', 'meta_boxes_timeline_um_save' );


























?>