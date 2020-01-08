
<p>Vous souhaitez créer un nouvel article ? </p>

<?php
//TODO/ Créer un routeur
use OC4\Model\PostManager; //Don't forget use or variable don't load

$manager = new PostManager(); ?>



<form method="post" action="../../index.php?nom=baki">
    <input type="text" name="title" id="title" placeholder="Titre"> <br />
    <textarea></textarea> <br />
    <input type="date" name="date" id="date"> <br />
    <input type="text" name="author" id="author"> <br />
    <button type="submit">Créer</button>

</form>
