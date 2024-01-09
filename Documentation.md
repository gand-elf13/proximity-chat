# Documentation

## Organisation des fichiers

### Fichier [README.md](/README.md)
Ce fichier correspond à la page visible du projet, disponible sur le *repository*, on y liste les consignes du cahier de charge, quelques conventions, astuces, liens utiles, et surtout la liste des tâches en cours, cela nous permet de bien visualiser l'avancée du projet et les tâches restantes ou les points à améliorer, tout en restant au courant de l'avancée de nos camarades.

### Dossier [WebVersion](/WebVersion)
C'est un dossier regroupant l'ensemble des fichiers dédiés au fonctionnement du projet sur le web.

### Fichier [index.php](/WebVersion/index.php)
C'est le fichier `html` superposé sur un fichier `php` rendant cette page dynamique. Le but de ce fichier est d'organiser l'affichage des messages et des boutons. Il se sert du [stylesheet.css](/WebVersion/stylesheet.css) mais le fichier [index.php](/WebVersion/index.php) emploie aussi le fichier [webscript.js](/WebVersion.js), ainsi que les différents modules - c'est-à-dire [GetDistance.php](/WebVersion/GetDistance.php), [BlurModule.php](/WebVersion/BlurModule.php).

### Fichier [stylesheet.css](/WebVersion/stylesheet.css)
C'est le fichier `css` permettant d'ajouter un *design* au site. Il est employé par [index.php](/WebVersion/index.php) via la balise `<link>` située dans le `<head>` du site.

### Fichier [webscript.js](/WebVersion.js)
C'est le fichier `js` aidant au 

### Fichier [GetDistance.php](/WebVersion/GetDistance.php)
C'est un fichier permettant de calculer la distance entre deux points situées sur la Terre, en employant leur latitudes et longitudes. (cf la formule utilisée dans le [README.md](/README.md).

### Fichier [BlurModule.php](/WebVersion/BlurModule.php)
C'est un fichier permettant d'altérer le message envoyé par l'utilisateur en fonction de la distance à laquelle se trouve le destinataire de l'expéditeur.

**Fonctionnement**
On récupère le message envoyé par l'expéditeur et le transforme en une liste de caractères. On définit un "pourcentage de *blur*" (plus ce pourcentage est élevé, plus la possibilité que chaque caractère soit altéré est élevée) selon la distance, puis on effectue une comparaison entre le pourcentage calculé et le nombre donné aléatoirement par l'ordinateur afin de savoir si le caractère est impacté. S'il est impacté, on le remplace par un nouveau caractère choisit aléatoirement  dans une liste déjà défini ; sinon, on ne change pas le caractère. On insère alors le caractère obtenu dans une liste gardant les caractères qui seront affichés, on passe alors au caractère suivant jusqu'à avoir fini de modifier la liste de caractères du message. On transforme la liste nouvellement obtenue en chaîne de caractères, puis on la renvoie au reste du programme comme étant le message après altération.



