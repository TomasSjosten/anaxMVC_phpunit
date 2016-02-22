<h1>Comments</h1>

<?php if (is_array($comments)) : ?>
<div id='comments'>
<?php foreach ($comments as $id => $comment) : ?>
  <div class="comment">
    <img src="http://www.gravatar.com/avatar/<?=md5(strtolower(trim($comment->email)))?>.jpg?s=60" alt="">
    <p class="name"><?=$comment->name?></p>

      <div class="time">
          <time>Created: <?=date('j M Y, G:i', strtotime($comment->created))?></time>
          <time>Updated: <?=date('j M Y, G:i', strtotime($comment->updated))?></time>
      </div>

      <p><?=nl2br(htmlspecialchars($comment->comment))?></p>

      <div class="align_right">
          <a class="small_button blue_button" href="<?=$this->url->create('owncomment/edit/'.$comment->id)?>"><i class="fa fa-cog"></i> Edit</a>
          <a class="small_button red_button" href="<?=$this->url->create('owncomment/remove/'.$comment->id)?>"><i class="fa fa-trash-o"></i> Delete</a>
      </div>
  </div>
<?php endforeach; ?>
</div>
<?php endif; ?>
