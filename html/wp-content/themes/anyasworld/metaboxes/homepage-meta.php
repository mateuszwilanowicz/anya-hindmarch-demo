<div class="homepage_meta">
<?php

	$pages = wp_list_pages(array('echo'=>0));
	wp_reset_query();
	$posts = get_posts(array('numberposts'=>-1 ));
	$tags = get_tags(array('hide_empty'=>false));

	$options = array('pages'=>array(), 'posts'=>array(), 'tags'=>array());
	$pagematches = simplexml_load_string($pages);
	foreach($pagematches->ul->li as $match) {
		$pageID = (string)$match['class'];
		$loc = strrpos($pageID, '-');
		$pageID = substr($pageID, $loc + 1);
		$options['pages'][] = array('value'=>'page-' . $pageID, 'label'=>(string)$match->a);
	}
	foreach($posts as $post) {
		$options['posts'][] = array('value'=>'post-' . $post->ID, 'label'=>$post->post_title);
	}
	foreach($tags as $tag) {
		$options['tags'][] = array('value'=>'tags-' . $tag->term_id, 'label'=>$tag->name);
	}
?>

 	<p>Select sections for homepage.</p>

 	<p>
		<label>Large Area 1 (340 x 400)</label>
		<?php $mb->the_field('large1'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<p>
		<label>Large Area 2 (340 x 400)</label>
		<?php $mb->the_field('large2'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<p>
		<label>Small Area 1 (160 x 190)</label>
		<?php $mb->the_field('small1'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<p>
		<label>Small Area 2 (160 x 190)</label>
		<?php $mb->the_field('small2'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<p>
		<label>Small Area 3 (160 x 190)</label>
		<?php $mb->the_field('small3'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<p>
		<label>Small Area 4 (160 x 190)</label>
		<?php $mb->the_field('small4'); ?>
		<select name="<?php $mb->the_name(); ?>">
			<option value="">(please select)</option>
		<?php
			foreach($options as $key=>$opts) {
				echo '<optgroup label="' . ucfirst($key) . '">';
				foreach($opts as $opt) {
		?>
			<option value="<?= $opt['value'] ?>" <?= $mb->the_select_state($opt['value']) ?>><?= $opt['label'] ?></option>
		<?php
				}
				echo '</optgroup>';
			}
		?>
		</select>
	</p>

	<input type="submit" class="button-primary" name="save" value="Save">

</div>