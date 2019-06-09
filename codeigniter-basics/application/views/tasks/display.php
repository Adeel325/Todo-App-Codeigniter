<h1>Tasks</h1>


<table class="table table-bordered">

	<thead>
		<tr>
			<th>Task Name</th>
			<th>Task Body</th>
			<th>Date</th>
			<th></th>
			<th></th>

		</tr>
	</thead>
	<tbody>
		
			<tr>
				<td>
					<div class="task_name">
						<?php echo $task_data->task_name; ?></a>
					</div>
					<div class="task_actions">
						<a href="<?php echo base_url() ?>tasks/edit/<?php echo $task_data->id ?>">Edit</a>	
						<a href="<?php echo base_url() ?>tasks/delete/<?php echo $task_data->project_id; ?>/<?php echo $task_data->id; ?>">Delete</a>	
					</div>
				</td>
				<td>
					<?php echo $task_data->task_body; ?>
				</td>
				<td>
					<?php echo $task_data->date_created; ?>
				</td>
				<td>
					<a href="<?php echo base_url() ?>tasks/mark_complete/<?php echo $task_data->id ?>">Mark Complete</a>
				</td>
				<td>
					<a href="<?php echo base_url() ?>tasks/mark_in_complete/<?php echo $task_data->id ?>">Mark Incomplete</a>
				</td>
			<tr>
				


	</tbody>

</table>