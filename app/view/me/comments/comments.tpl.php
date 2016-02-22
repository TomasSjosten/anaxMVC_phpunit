<?php if (isset($addLink) && $addLink) : ?>
    <a href="<?=$this->url->create('owncomment/addcomment/'.$type)?>">
        <button class="medium_button blue_button">Kommentera</button>
    </a>
<?php endif; ?>

<div id="comments">
    <?php foreach ($output as $key => $val): ?>
        <div class="comment">
            <img src="http://www.gravatar.com/avatar/<?=md5(strtolower(trim($val['email'])))?>.jpg?s=60" alt="">
            <p class="name"><?=$val['name']?></p>
            <div class="time">
                <time>Created: <?=date('j M Y, G:i', $val['created'])?></time>
                <time>Updated: <?=date('j M Y, G:i', $val['updated'])?></time>
            </div>
            <p><?=htmlspecialchars($val['content'])?></p>

            <form method="post">
                <input type="hidden" name="editthis" value="<?=$key?>">
                <input type="hidden" name="redirect" value="<?=$this->url->create($type)?>">
                <div class="align_right">
                    <input class="small_button blue_button" type='submit' name='editButton' value='Editera'
                           onClick="this.form.action = '<?=$this->url->create('owncomment/edit/'.$type)?>'">
                    <input class="small_button red_button" type='submit' name='removeButton' value='Ta bort'
                           onClick="this.form.action = '<?=$this->url->create('owncomment/remove/'.$type)?>'">
                </div>
            </form>
        </div>
    <?php endforeach; ?>
</div>
