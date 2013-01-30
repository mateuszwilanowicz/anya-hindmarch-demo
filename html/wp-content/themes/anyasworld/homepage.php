<?php
/**
 * Template Name: Homepage
 **/
get_header();

$meta = get_post_meta(get_the_ID());
$fields = array('_home_large1', '_home_large2', '_home_small1', '_home_small2', '_home_small3', '_home_small4');
$content = array();

foreach($fields as $key) {
	$metafield = $meta[$key][0];
	$type = substr($metafield, 0, 4);
	$id = substr($metafield, 5);
	$imgsize = strpos($key, 'large') === false ? 'thumbnail' : 'large';

	switch($type) {
		case 'post':
		case 'page':
			$tmp = wp_get_single_post($id);
			$post_meta = get_post_meta($id);
			$content[$key]['title'] = empty($post_meta['Homepage Title'][0]) ? $tmp->post_title : $post_meta['Homepage Title'][0];
			$content[$key]['text'] = empty($post_meta['Homepage Description'][0]) ? $tmp->post_excerpt : $post_meta['Homepage Description'][0];
			$content[$key]['link'] = get_permalink($id);
			$content[$key]['image'] = get_the_post_thumbnail($id, $imgsize);
			break;
		case 'tags':
			$tmp = get_tag($id);
			$posts = get_posts(array('tag_id'=>$id, 'orderby'=>'date', 'order'=>'ASC', 'posts_per_page'=>1));
			$post = $posts[0]->ID;
			$content[$key]['title'] = $tmp->name;
			$content[$key]['text'] = $tmp->description;
			$content[$key]['link'] = site_url('tag/' . $tmp->slug);
			$content[$key]['image'] = get_the_post_thumbnail($post, $imgsize);
			break;
	}
}

?>

<div id="container">
	<div id="content">
		<div id="large_panels">
			<div>
				<a href="<?= $content['_home_large1']['link'] ?>">
					<?= $content['_home_large1']['image'] ?>
					<span>
						<span class="home_title"><?= $content['_home_large1']['title'] ?></span><br />
						<?= $content['_home_large1']['text'] ?>
						<!-- <span class="readmore">Read More &gt;</span> -->
					</span>
				</a>
			</div>
			<div>
				<a href="<?= $content['_home_large2']['link'] ?>">
					<?= $content['_home_large2']['image'] ?>
					<span>
						<span class="home_title"><?= $content['_home_large2']['title'] ?></span><br />
						<?= $content['_home_large2']['text'] ?>
						<!-- <span class="readmore">Read More &gt;</span> -->
					</span>
				</a>
			</div>
		</div>

		<div class="clearer"></div>

		<div id="small_panels">
			<div>
				<a href="<?= $content['_home_small1']['link'] ?>">
					<?= $content['_home_small1']['image'] ?>
				</a>
				<span class="home_title"><?= $content['_home_small1']['title'] ?></span><br />
				<span class="small_caption"><?= $content['_home_small1']['text'] ?></span>
			</div>
			<div>
				<a href="<?= $content['_home_small2']['link'] ?>">
					<?= $content['_home_small2']['image'] ?>
				</a>
				<span class="home_title"><?= $content['_home_small2']['title'] ?></span><br />
				<span class="small_caption"><?= $content['_home_small2']['text'] ?></span>
			</div>
			<div>
				<a href="<?= $content['_home_small3']['link'] ?>">
					<?= $content['_home_small3']['image'] ?>
				</a>
				<span class="home_title"><?= $content['_home_small3']['title'] ?></span><br />
				<span class="small_caption"><?= $content['_home_small3']['text'] ?></span>
			</div>
			<div style="padding-right: 0">
				<a href="<?= $content['_home_small4']['link'] ?>">
					<?= $content['_home_small4']['image'] ?>
				</a>
				<span class="home_title"><?= $content['_home_small4']['title'] ?></span><br />
				<span class="small_caption"><?= $content['_home_small4']['text'] ?></span>
			</div>
		</div>

		<div class="clearer"></div>

		<div id="read_news">
			<a href="<?= site_url('/category/news/'); ?>">Read All News &gt;</a>
		</div>


	</div><!-- #content -->
</div><!-- #container -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
