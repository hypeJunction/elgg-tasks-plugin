<?php
	$worker=get_entity($vars['entity']->assigned_to);
	$owner = $vars['entity']->getOwnerEntity();
	$container = get_entity($vars['entity']->getContainer());
	$friendlytime = friendly_time($vars['entity']->time_created);
?>
				<table width="100%" class="tasks" >
					<tr>
						<td>
			  				<b><a href="<?php echo $vars['entity']->getURL(); ?>"><?php echo $vars['entity']->title; ?></a></b>
						</td>
						<td style="text-align: right;">
							<a href="<?php echo $vars['url']; ?>pg/tasks/<?php echo $container->username; ?>"><?php echo $container->name; ?></a>&nbsp;<?php echo $friendlytime; ?>
						</td>
					</tr>
				</table>
	
				
				<table width="100%" class="tasks" >
					<tr>
						<td width="33%">
						<b><?php echo elgg_echo('tasks:task_type'); ?></b>
						<?php echo elgg_view('output/text',array('value' => elgg_echo("tasks:task_type_{$vars['entity']->task_type}"))); ?>
						</td>
						<td width="33%">
						<b><?php echo elgg_echo('tasks:status'); ?></b>
						<?php echo elgg_view('output/text',array('value' => elgg_echo("tasks:task_status_{$vars['entity']->status}"))); ?>
						</td>
						<td width="33%" style="text-align: right;">
						<b><?php echo $worker ? elgg_echo('tasks:assigned_to') :""; ?></b>
						<?php if ($worker) { ?>
						<a href="<?php echo $vars['url']; ?>pg/profile/<?php echo $worker->username; ?>"><?php echo $worker->name; ?></a>
            <?php } ?>
						</td>
					</tr>
				</table>
				
				<table width="100%" class="tasks">
					<tr>
						<td width="33%">
						<b><?php 	echo elgg_echo('tasks:start_date'); ?></b>
						<?php   echo elgg_view('output/text',array('value' => $vars['entity']->start_date)); ?>
						</td>
						<td width="33%">
						<b><?php 	echo elgg_echo('tasks:end_date'); ?></b>
						<?php   echo elgg_view('output/text',array('value' => $vars['entity']->end_date)); ?>
						</td>
						<td width="33%" style="text-align: right;">
						<?php   echo elgg_view('output/text',array('value' => elgg_echo("tasks:task_percent_done_{$vars['entity']->percent_done}"))); ?>
						<b><?php 	echo elgg_echo('tasks:percent_done'); ?></b>
					
						<b><?php 	echo elgg_echo('tasks:work_remaining'); ?></b>
						<?php   echo elgg_view('output/text',array('value' => $vars['entity']->work_remaining)); ?>
						</td>
					</tr>
				</table>
				


