<?php
    $id = substr($request, 9, strlen($request));
    
    include(__DIR__ . '/mySQL.php');

    $recette = $mysqli->query("SELECT * FROM recipe WHERE id=".$id)->fetch_assoc();
    $id_recette = $recette['id'];
    
    $comments = $mysqli->query("SELECT * FROM comments WHERE recipe_id=".$id_recette);
    
    // var_dump($comments);

    

    
    // $mysqli->close();
?>



<section>
    <div class="recipe-body">
        <div class="recipe-header">
            <div>
                <img src="<?php echo $recette['imgURL'] ?>" alt="" height="100%">
            </div>
            <div>
                <h1><?php echo $recette['name'] ?></h1>
                <h3><?php echo $recette['description'] ?></h3>
            </div>
            <div>
                <span>Temps de préparation :</span>
                <span><b><?php echo $recette['duration'] / 60; ?></b> min</span>
            </div>
        </div>
        
        <div class="recipe-main">
            <div>
                <h4>Ingrédients :</h4>
                <ul>
                    <?php 

$ingredients = explode("|", $recette['ingredients']);

foreach($ingredients as $ingredient)
{
                            echo '<li>',$ingredient,'</li>';
                        }
                        ?>
                    </ul>
                </div>
                
                <div>
                    <h3>Procédure :</h3>
                    <ul>
                        <?php 

$etapes = explode("|", $recette['steps']);

foreach($etapes as $etape)
{
    echo '<li>',$etape,'</li>';
}
?>
                </ul>
                
                
            </div>
        </div>
        
    </div>
    <div class="comments-body">
        <h1>Commentaires</h1>

        <div class="comment-item">
            <h3>Auteur</h3>
            <p>Message du commentaire</p>
        </div>
        
        <?php 
            foreach($comments as $comment)
            {
                $content = $comment['content'];
                $id_user = $comment['id_user'];

                $username = $mysqli->query("SELECT username FROM `db-MamaMia`.users WHERE id=".$id_user)->fetch_assoc();
                echo '
                    <div class="comment-item">
                        <h3>'.$username['username'].'</h3>
                        <p>'.$content.'</p>
                    </div>';
            }

            $mysqli->close();
        ?>

        <?php
            if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
            {

                $username = $_SESSION['username'];

                echo '
                <form class="add-comment" method="POST" action="/post-comment">
                    <h3>Publiez votre commentaire en tant que : '.$username.'</h3>
    
                    <textarea name="comment_body" id="" cols="70" rows="5"></textarea>
                    <input type="hidden" value="'.$id_recette.'" name="recipe_id">
    
                    <button type="submit">Envoyer</button>
                </form>';
            } else {
                echo '
                <div class="add-comment">
                    <h3><a href="/login">Connectez vous</a> pour poster un commentaire</h3>
                </div>';
            }
        ?>

        

        
    </div>
</section>





