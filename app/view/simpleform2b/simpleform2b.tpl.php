<!-- Extract variables from array set in controller -->
<?php extract($form); ?>
<!-- Extraction Complete -->

<!-- Count input-types -->
<?php $arrayCount = count($formInput) - 1; ?>
<!-- Count Complete -->

<!-- Start form output -->
<form method="<?=$formDetails['method']?>" action="<?=$formDetails['action']?>" class="<?=$formDetails['class']?>">

    <!-- Add input-types if isset -->
    <?php for ($i = 0; $i <= $arrayCount; $i++) {

        //Add label if isset
        if (isset($formInput[$i]['label'])) { ?>
            <label for="<?=$formInput[$i]['name']?>"><?=$formInput[$i]['label']?></label>
            <br>
        <?php } ?>

        <input type="<?=$formInput[$i]['type']?>"
               name="<?=$formInput[$i]['name']?>"
        <?php if (isset($formInput[$i]['value'])) { ?>
            value="<?=$formInput[$i]['value']?>"
        <?php } ?>
        <?php if (isset($formInput[$i]['placeholder'])) { ?>
            placeholder="<?=$formInput[$i]['placeholder']?>"
        <?php } ?>
        <?php if (isset($formInput[$i]['id'])) { ?>
            id="<?=$formInput[$i]['id']?>" />
        <?php } ?>
        <br>
    <?php } ?>
    <!-- Input-types added -->


    <!-- Add textarea if isset -->
    <?php if (isset($textArea)) {
        if (isset($textArea['label'])) { ?>
            <!-- Add label if isset -->
            <label for="<?=$textArea['name']?>"><?=$textArea['label']?></label>
            <br>
        <?php } ?>
        <textarea name="<?=$textArea['name']?>"
          <?php if (isset($textArea['id'])) { ?>
              id="<?=$textArea['id']?>"
          <?php } ?>>
								<?php if (isset($textArea['value'])) { ?>
                                    <?=$textArea['value']?>"
                                <?php } ?>
            <?php if (isset($textArea['placeholder'])) { ?>
                <?=$textArea['placeholder']?>"
            <?php } ?>
								</textarea>
    <?php } ?>
    <!-- Textarea is complete -->


    <!-- Finally, add submitbutton if isset -->
    <?php if (isset($submitInput)) { ?>
        <br>
        <input type="submit" name="<?=$submitInput['name']?>" value="<?=$submitInput['value']?>"/>
    <?php } ?>
    <!-- Submitbutton Complete -->

    <!-- Close Form -->
</form>
<!-- Form Closed -->
