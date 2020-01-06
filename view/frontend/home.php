
<div>Bonjour et bienvenue sur le site de Jean Rochefort ! </div>


    <?php

    use OC4\Model\PostManager;

    $manager = new PostManager();
    $data = $manager->getPosts();?>
    <?php foreach ($data as $value): ?>
       <div style="border:1px solid black;"> <p><?php echo $value->getId(); ?></p>
             <p><?php echo $value->getName(); ?></p>
             <p><?php echo $value->getContent(); ?></p>
       </div>
    <?php endforeach; ?>


