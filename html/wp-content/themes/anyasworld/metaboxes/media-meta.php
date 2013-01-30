<div class="media_meta">
<?php
	$posts = get_posts(array('category'=>16, 'numberposts'=>0, 'echo'=>0, 'title_li'=>null));

	$options = array();
	foreach($posts as $post) {
		$options[] = array('value'=>$post->ID, 'label'=>$post->post_title);
	}
?>

 	<p>Select posts for media panel.</p>

 	<p>
		<label>Left Side</label>
		<?php $mb->the_field('leftimg'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
			}
		?>
		</select>
	</p>

	<p>
		<label>Right Side</label>
		<?php $mb->the_field('rightimg'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
			}
		?>
		</select>
	</p>

	<input type="submit" class="button-primary" name="save" value="Save">

</div>