<div class='comment-form'>
    <form method=post>
        <input type=hidden name="redirect" value="<?=$this->url->create($type)?>">
        <input type=hidden name="savethis" value="<?=$saveThis?>">
        <fieldset>
            <legend>Ange en kommentar</legend>
            <input type="text" name="name" autofocus placeholder="Ange ditt namn" tabindex="1" value="<?=$name?>">
            <input type="email" name="email" autofocus placeholder="Ange din mailadress" tabindex="2"
                   value="<?=$email?>">
            <textarea name='content' placeholder="Skriv din kommentar här" tabindex="3"><?=$comment?></textarea>
            <div class=buttons>
                <input class="small_button red_button" type='submit' name='doRemoveAll' value='Remove all'
                       onClick="this.form.action = '<?=$this->url->create('owncomment/remove-all/'.$type)?>'">
                <input class="small_button red_button" type='reset' value='Reset'>
                <input class="small_button green_button" type='submit' name='doCreate' value='<?=$savebutton?>'
                       onClick="this.form.action = '<?=$this->url->create('owncomment/'.$addOrSave.'/'.$type)?>'">
            </div>
        </fieldset>
    </form>
</div>
