<h1><?=$title?></h1>

<div>
    <a class="small_button blue_button link_button" href="<?=$this->url->create('users/list')?>">All</a>
    <a class="small_button blue_button link_button" href="<?=$this->url->create('users/active-list')?>">Aktiva</a>
    <a class="small_button blue_button link_button" href="<?=$this->url->create('users/inactive-list')?>">Inaktiva</a>
    <a class="small_button blue_button link_button" href="<?=$this->url->create('users/trash-list')?>">Borttagna</a>
</div>

<div id="user-list">
    <table>
        <tr>
            <th><p>Name</p></th>
            <th><p>Acronym</p></th>
            <th><p>Email</p></th>
            <th><p>Profile</p></th>
            <th><p>Edit</p></th>
            <th><p>Soft-delete</p></th>
            <th><p>Inaktivera</p></th>
            <th><p>Ta bort</p></th>
        </tr>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><p><?=$user->name?></p></td>
                <td><p><?=$user->acronym?></p></td>
                <td><p><?=$user->email?></p></td>
                <td><a href="users/id/<?=$user->id?>"><p><i class="fa fa-user"></i></p></a></td>
                <td><a href="users/edit/<?=$user->id?>"><p><i class="fa fa-cogs"></i></p></a></td>

                <?php if ($user->deleted) : ?>
                    <td><a href="users/undelete/<?=$user->id?>"><p><i class="fa fa-refresh"></i></p></a></td>
                <?php else : ?>
                    <td><a href="users/softdelete/<?=$user->id?>"><p><i class="fa fa-trash"></i></p></a></td>
                <?php endif; ?>

                <?php if ($user->active) : ?>
                    <td><a href="users/inactivate/<?=$user->id?>"><p><i class="fa fa-pause"></i></p></a></td>
                <?php else : ?>
                    <td><a href="users/activate/<?=$user->id?>"><p><i class="fa fa-play"></i></p></a></td>
                <?php endif; ?>

                <td><a href="users/delete/<?=$user->id?>"><p><i class="fa fa-recycle"></i></p></a></td>
            </tr>

        <?php endforeach; ?>
    </table>
</div>
<p><a href='<?=$this->url->create('')?>'>Home</a></p>