
<div>Bonjour et bienvenue sur le site de Jean Rochefort ! </div>


    <?php

    use OC4\Model\PostManager; //Don't forget use or variable don't load

    $manager = new PostManager();
    $data = $manager->getPosts();?>

<div style="border: 3px solid red;" class="container">
    <?php foreach ($data as $value): ?>
       <div style="border: 1px solid black;">
             <h1><?php echo $value->getTitle(); ?></h1>
             <p><?php echo $value->getContent(); ?></p>
             <p>Rédigé par : <?php echo $value->getAuthor(); ?></p>
             <p>Crée le : <?php echo $value->getCreationDate(); ?> </p>
       </div>
    <?php endforeach; ?>
</div>


