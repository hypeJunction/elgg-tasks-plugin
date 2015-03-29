
<script type="text/javascript">
$(document).ready(function () {
    $('a.share_more_info').click(function () {
		$(this.parentNode).children("[class=share_desc]").slideToggle("fast");
		return false;
    });
}); /* end document ready function */
</script>

	<?php

	    //get the num of shares the user want to display
		$num = $vars['entity']->num_display;
		
		//if no number has been set, default to 4
		if(!$num)
			$num = 4;
			
        //grab the users tasked items
		$shares = get_entities('object', 'tasks',0, "", $num, 0, false);
		
		if($shares){

			foreach($shares as $s){
			
				//get the owner
				$owner = $s->getOwnerEntity();

				//get the time
				$friendlytime = friendly_time($s->time_created);

				//get the user icon
				$icon = elgg_view(
						"profile/icon", array(
										'entity' => $owner,
										'size' => 'tiny',
									  )
					);

				//get the task title
				$info = "<p class=\"shares_title\"><a href=\"{$s->getURL()}\">{$s->title}</a></p>";
				
				//get the user details
				$info .= "<p class=\"shares_timestamp\"><small><a href=\"{$owner->getURL()}\">{$owner->name}</a> {$friendlytime}</small></p>";

				//get the task description
				if($s->description)
					$info .= "<a href=\"javascript:void(0);\" class=\"share_more_info\">".elgg_echo('tasks:more')."</a><br /><div class=\"share_desc\"><p>{$s->description}</p></div>";
		
				//display 
				echo "<div class=\"shares_widget_wrapper\">";
				echo "<div class=\"shares_widget_icon\">" . $icon . "</div>";
				echo "<div class=\"shares_widget_content\">" . $info . "</div>";
				echo "</div>";

			}

		}
	
	
      ?>