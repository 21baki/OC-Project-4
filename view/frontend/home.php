
<div>
    <p>Bonjour et bienvenue sur le site de Jean Rochefort ! </p>
    <a href="view/frontend/register.php">Inscription</a> <br />
    <a href="view/frontend/createPost.php">Créer un post</a>
</div>

<?php foreach($data as $value) { ?>
<div style="border: 3px solid red;" class="container">

       <div style="border: 1px solid black;">
             <h1><?php  echo $value['id']; ?></h1>
       </div>
    <?php } ?>

</div>


