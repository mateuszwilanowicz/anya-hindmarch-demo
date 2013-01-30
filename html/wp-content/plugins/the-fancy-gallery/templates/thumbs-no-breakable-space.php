<?php


/*
Fancy Gallery Template: Thumbnails (non-breaking space)
Description: This template displays the linked thumbnail images separated with a non-breaking space (&amp;nbsp;).
Version: 1.0.1
Author: Dennis Hoppe
Author URI: http://DennisHoppe.de
*/

?>

<div class="gallery fancy-gallery thumbnails-nbsp" id="gallery_<?php Echo $this->gallery->id ?>">
  <?php ForEach($this->gallery->images AS $image) : ?><a
    href="<?php Echo $image->href ?>"
    title="<?php Echo HTMLSpecialChars($image->title) ?>"
    class="<?php Echo $this->gallery->attributes->link_class ?>"><img
      <?php ForEach ($image->attributes AS $attribute => $value) : ?>
        <?php Echo $attribute ?>="<?php Echo HTMLSpecialChars($value) ?>"
      <?php EndForEach; ?>
    /></a>&nbsp;<?php
  EndForEach; ?>
  <div class="clear"></div>
</div>