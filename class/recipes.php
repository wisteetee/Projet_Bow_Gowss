<?php

include_once ('connexion.php');
class recipes
{

    public function register($title, $content, $duree, $image, $persons, $isVegan, $user_id)
    {
        $bdd = connexion::connexionBdd();
        $reg = $bdd->prepare('INSERT INTO recipe (title, content, image, duree, persons, isVegan, user_id) VALUES (:title, :content, :image, :duree, :persons, :isVegan, :user_id)');
        $reg->execute(array(
            'title'=>$title,
            'content'=>$content,
            'image'=>$image,
            'duree'=>$duree,
            'persons'=>$persons,
            'isVegan'=>$isVegan,
            'user_id'=>$user_id
        ));
        $reg->debugDumpParams();
        #header('index.php');
    }

    public function update($id, $title, $content, $duree, $image)
    {
        $bdd = connexion::connexionBdd();
        $updt = $bdd->prepare('UPDATE recipe 
                        SET title= :title,
                        content= :content,
                        image= :image, 
                        duree= :duree  
                        WHERE id=:id');

        $updt->execute(array($title,$content,$image,$duree,$id));
    }
    public function delete($id){
        $bdd = connexion::connexionBdd();
        $del = $bdd->prepare('DELETE FROM recipe WHERE id=:id');
        $del-> execute(array($id));
    }
}
