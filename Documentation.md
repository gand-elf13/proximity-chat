# Documentation

## Organisation des fichiers

### fichier README
page visible du projet, disponible sur le repository, on y liste quelques méthodes de travails, astuces, liens utiles et surtout la liste des tâches en cours, cela nous permet de bien visualiser l'avancée du projet et les tâches restantes ou les points à améliorer, tout en restant au courant de l'avancée de nos camarades.

### fichier gitattributes
fichier donnant les consignes à git hub afin de permettre au programme de fonctionner correctement malgré les différents fichiers

### fichier BlurModule
fichier permettant d'altérer le message envoyé par l'utilisateur en fonction de la distance à laquelle se trouve le destinataire de l'envoyeur

**fonctionnement**
On récupère le msg envoyé par l'envoyeur et le transforme en une liste de caractère. On définit un pourcentage selon la distance, puis on effectue calcul afin de savoir si le caractère est impacté, si il est impacté on le remplace par un nouveau caractère choisit aléatoirement  dans une liste déjà définit sinon on ne change pas le caractère. On insère alors le caractère obtenu dans une liste, on passe alors au suivant. Jusqu'à avoir finit l'ensemble de modifier la liste de caractère du message, on transforme la liste nouvellement obtenu en chaine de caractères, puis on la renvoi au reste du programme comme étant le msg après altération.

### fichier GodotVersion
tentative avortée de rendre notre projet disponible en application Godot, en effet, le moteur de jeu utilisé ici en tant qu'éditeur empêche la manipulation aisée des données de géolocalisition, bloquant toute poursuite du projet

### fichier MobileVersion
dossier regroupant l'ensemble des programmes dédiés au fonctionnement du projet sur mobile

### fichier WebVersion
dossier regroupant l'ensemble des programmes dédiés au fonctionnement du projet sur PC