
<p>Vous souhaitez créer un nouvel article ? </p>

<?php
//TODO/ Créer un routeur
//Don't forget use or variable don't load

require('../../model/PostManager.php'); ?>



<form method="post" action="createPost.php?page=create_post">
    <input type="text" name="title" id="title" placeholder="Titre"> <br />
    <input type="text" name="content" id="content" placeholder="Contenu"> <br />
    <input type="date" name="date" id="date"> <br />
    <input type="text" name="author" id="author"> <br />
    <button type="submit">Créer</button>

</form>
