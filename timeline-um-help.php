<div class="wrap">
	<?php echo "<h2>".__(timeline_um_plugin_name.' Help')."</h2>";?>
    <br />

		  
        
        
<h3>Have any issue ?</h3>

<p>Feel free to Contact with any issue for this plugin <a href="<?php echo timeline_um_conatct_url; ?>"><?php echo timeline_um_conatct_url; ?></a>
</p>

<?php

$timeline_um_customer_type = get_option('timeline_um_customer_type');
$timeline_um_version = get_option('timeline_um_version');


?>
<?php
if($timeline_um_customer_type=="free")
	{
		echo '<p>You are using <strong> '.$timeline_um_customer_type.' version  '.$timeline_um_version.'</strong> of '.timeline_um_plugin_name.', To get more feature you could try our premium version. ';
		
		echo '<a href="'.timeline_um_pro_url.'">'.timeline_um_pro_url.'</a></p>';
		
		
	}
elseif($timeline_um_customer_type=="pro")
	{

		echo '<p>Thanks for using <strong> '.$timeline_um_customer_type.' version  '.$timeline_um_version.'</strong> of <strong>'.timeline_um_plugin_name.'</strong> </p>';
		
		
	}

 ?>




<?php
if($timeline_um_customer_type=="free")
	{
?>
<br />
<b>Premium Version Features</b><br />

<ul class="timeline_um-pro-features">

	<li>Fully responsive and mobile ready.</li>
	<li>Unlimited Timeline anywhere.</li>
	<li>Query post from latest post, Older Published, Featured Items, by Only Year, by Month of a year, Taxonomy &amp; Categories, post id.</li>
	<li>Different Theme.</li>
	<li>Custom number of Timeline post to query.</li>
	<li>Timeline post Thumbnail images Size selection.</li>
	<li>Featured Timeline post marker.</li>
	<li>Background Image for Timeline area.</li>
	<li>Timeline Post Title Color</li>
	<li>Timeline Post Title Font Size</li>    
</ul>



</p>
        
        
        
      <?php
      }
	  
	  ?>  
      
<br /> 
<h3>Please share this plugin with your friends?</h3>
<table>
<tr>
<td width="100px"> 
<!-- Place this tag in your head or just before your close body tag. -->
<script type="text/javascript" src="https://apis.google.com/js/platform.js"></script>

<!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium" data-href="<?php echo timeline_um_share_url; ?>"></div>

</td>
<td width="100px">
<iframe src="//www.facebook.com/plugins/like.php?href=<?php echo timeline_um_share_url; ?>&amp;width=100&amp;layout=button_count&amp;action=like&amp;show_faces=false&amp;share=false&amp;height=21&amp;appId=743541755673761" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>

 </td>
<td width="100px"> 





<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo timeline_um_share_url; ?>" data-text="<?php echo timeline_um_plugin_name;  ?>">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
</td>

</tr>

</table>
        
        
         
</div>
<style type="text/css">
.timeline_um-pro-features{}

.timeline_um-pro-features li {
  list-style: disc inside none;
}

</style>