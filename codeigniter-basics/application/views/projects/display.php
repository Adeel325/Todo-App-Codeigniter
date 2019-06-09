
<div class="col-xs-9">


	<p class="bg-success">
		
		<?php if($this->session->flashdata('marked_complete')): ?>
		
			<?php echo $this->session->flashdata('marked_complete'); ?>

		<?php endif; ?>

		<?php if($this->session->flashdata('marked_in_complete')): ?>

			<?php echo $this->session->flashdata('marked_in_complete'); ?>
		<?php endif; ?>


	</p>


	<h1>Project Name: <?php echo $project_data->project_name ?></h1>
	<p>Date Created: <?php echo $project_data->date_created; ?></p>
	<h3>Project Description: </h3>
	<p><?php echo $project_data->project_body; ?></p>

	<h3>Active Tasks</h3>
	<?php if($task_not_completed): ?>
		<ul>
			<?php foreach($task_not_completed as $task): ?>
				<li>
					<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id ?>">
						<?php echo $task->task_name; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php else: ?>
			<p>You have no pending tasks</p>
		
	<?php endif; ?>

	<h3>Tasks Completed</h3>
	<?php if($task_completed): ?>
		<ul>
			<?php foreach($task_completed as $task): ?>
				<li>
					<a href="<?php echo base_url(); ?>tasks/display/<?php echo $task->id ?>">
						<?php echo $task->task_name; ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>

		<?php else: ?>
			<p>You have no pending tasks</p>
		
	<?php endif; ?>
</div>





<div class="col-xs-3 pull-right">
<ul class="list-group">
	<h4>Project Actions</h3>
	<li class="list-group-item">
		<a href="<?php echo base_url() ?>tasks/create/<?php echo $project_data->id ?>">Create Task</a>
	</li>
	<li class="list-group-item">
		<a href="<?php echo base_url() ?>projects/edit/<?php echo $project_data->id ?>">Edit Project</a>
	</li>
	<li class="list-group-item">
		<a href="<?php echo base_url() ?>projects/delete/<?php echo $project_data->id ?>">Delete Project</a>
	</li>
</ul>
</div>


