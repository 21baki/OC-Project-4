
<div>
    <p>Bonjour et bienvenue sur le site de Jean Rochefort ! </p>
    <a href="view/frontend/register.php">Inscription</a> <br />
    <a href="view/frontend/createPost.php">Créer un post</a>
</div>


<div style="border: 3px solid red;" class="container">
    <?php foreach($data as $value) { ?>
       <div style="border: 1px solid black;">
             <h1>Titre : <?php  echo $value['title']; ?></h1>
           <p> Contenu : <?php echo $value['content']; ?></p>
           <p> Auteur : <?php echo $value['author']; ?></p>
       </div>
    <?php } ?>

</div>


