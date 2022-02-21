<?php
/**
 * 1. Le dossier SQL contient l'export de ma table user.
 * 2. Trouvez comment importer cette table dans une des bases de données que vous avez créées, si vous le souhaitez vous pouvez en créer une nouvelle pour cet exercice.
 * 3. Assurez vous que les données soient bien présentes dans la table.
 * 4. Créez votre objet de connexion à la base de données comme nous l'avons vu
 * 5. Insérez un nouvel utilisateur dans la base de données user
 * 6. Modifiez cet utilisateur directement après avoir envoyé les données ( on imagine que vous vous êtes trompé )
 */

// TODO Votre code ici.

try {
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'bdd_cours';

    $pdo = new PDO("mysql:host=$server;dbname=$db;charset=utf8", $user, $password);

    $stm = $pdo->prepare("
        UPDATE user SET nom = :nom WHERE id = :id
    ");

    $stm->bindParam(':nom', $nom);
    $stm->bindParam(':id', $id);

    $stm->execute();

    if ($stm->rowCount() > 0){
        echo "Utilisateur à été modifié !";
    }
    else{
        "Aucun utilisateur n'a été modifié";
    }

    echo "Utilisateur ajouté";

}
catch(PDOException $e){
    echo "Erreur de co: " . $e->getMEssage();
}



/**
 * Théorie
 * --------
 * Pour obtenir l'ID du dernier élément inséré en base de données, vous pouvez utiliser la méthode: $bdd->lastInsertId()
 *
 * $result = $bdd->execute();
 * if($result) {
 *     $id = $bdd->lastInsertId();
 * }
 */