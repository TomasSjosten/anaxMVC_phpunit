<h1>Användare: <?=$user->acronym?></h1>

<div id="user">
    <ul>
        <li><p><span>ID:</span> <?=$user->id?></p></li>
        <li><p><span>Namn:</span> <?=$user->name?></p></li>
        <li><p><span>Acronym:</span> <?=$user->acronym?></p></li>
        <li><p><span>Email:</span> <?=$user->email?></p></li>
        <li><p><span>Created:</span> <?=$user->created?></p></li>
        <li><p><span>Updated:</span> <?=$user->updated?></p></li>
        <li><p><span>Deleted:</span> <?=$user->deleted?></p></li>
        <li><p><span>Active:</span> <?=$user->active?></p></li>
    </ul>
</div>
<p><a href='<?=$this->url->create($_SERVER['HTTP_REFERER'])?>'>Tillbaka</a></p>