<?php

// Configuration de la connexion à la base de données
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'spn';

// Nom du fichier de sauvegarde
$backupFile = 'C:/baseSPN/backup_' . date('Y-m-d') . '.sql';

// Commande de sauvegarde
$command = "mysqldump -u $user -p$password -h $host $database > $backupFile";

// Exécution de la commande
exec($command, $output, $returnValue);

// Vérification du succès de la sauvegarde
if ($returnValue == 0) {
    echo "La sauvegarde a été effectuée avec succès dans le fichier : $backupFile";
} else {
    echo "Erreur lors de la sauvegarde : " . implode("\n", $output);
}

?>