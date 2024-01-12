
# Documentation

## Remarques

Cette documentation ne prend pas en compte le fichier `admin.php` qui est réservé uniquement aux modérateurs/administrateurs/programmeurs...
Le code est similaire à celui de `index.php` avec quelques ajouts pour un meilleur *debugging*, et une meilleure modération.

## Organisation des fichiers

### Fichier [README.md](/README.md)

Ce fichier correspond à la page visible du projet, disponible sur le *repository*, on y liste les consignes du cahier de charge, quelques conventions, astuces, liens utiles, et surtout la liste des tâches en cours, cela nous permet de bien visualiser l'avancée du projet et les tâches restantes ou les points à améliorer, tout en restant au courant de l'avancée de nos camarades.

### Dossier [WebVersion](/WebVersion)

C'est un dossier regroupant l'ensemble des fichiers dédiés au fonctionnement du projet sur le web.
On y retrouve:
- Le fichier principal du site [index.php](#fichier-index.php) gérant le *HTML* de façon dynamique et responsable
- Le fichier [webscript.js](#fichier-webscript.js) aidant `index.php` à l'*UX* et gérant les données de géolocalisation avec le fichier principal du site
- Le fichier [stylesheet.css](#fichier-stylesheet.css) ajoutant du style au site et améliorant la gestion de l'espace par chaque élément *HTML*
- Le fichier [GetDistanceModule.php](#fichier-getdistancemodule.php) permettant à `webscript.js` et `index.php` afin de calculer la distance entre l'utilisateur et la localisation de chaque message afin de *blur* les messages correctement
- Le fichier [BlurModule.php](#fichier-blurmodule.php) censurant les messages en fonction de la localisation du message et celle de l'utilisateur à l'aide d'un pourcentage déterminé à l'aide de `GetDistanceModule.php`

### Fichier [index.php](/WebVersion/index.php)

C'est le fichier `html` superposé sur un fichier `php` rendant cette page dynamique. Le but de ce fichier est d'organiser l'affichage des messages et des boutons. Il se sert du [stylesheet.css](#fichier-stylesheet.css) mais le fichier `index.php` emploie aussi le fichier [webscript.js](#fichier-webscript.js), ainsi que les différents modules - c'est-à-dire [GetDistanceModule.php](#fichier-getdistancemodule.php), [BlurModule.php](#fichier-blurmodule.php).

### Fichier [stylesheet.css](/WebVersion/stylesheet.css)

C'est le fichier `css` permettant d'ajouter un *design* au site. Il est employé par [index.php](#fichier-index.php) via la balise `<link>` située dans le `<head>` du site.
Il permet aussi de mieux organiser la mise en page des lignes d'entrées via les différentes propriétés *CSS* de `flex` employées grâce à la ligne `display: flex;` permettant une meilleure gestion de l'espace prise par chaque élément *HTML*.

### Fichier [webscript.js](/WebVersion/webscript.js)

C'est le fichier `js` aidant au fichier principal du site. Ce fichier est multifonctionnel :
- Il recueille les données de géolocalisation de l'utilisateur, ensuite employé par [index.php](#fichier-index.php)
- Il améliore l'*UX*
	-  en gardant le nom d'utilisteur entré et sa géolocalisation dans le site après les *refresh*
	- en conservant la progression de l'utilisateur (via `window.scrollY`) après que le site se recharge
	- en sélectionnant la ligne d'entrée sélectionnée antérieurement après le rechargement du site (puisque chaque *refresh* provoque une désélection, "défocalisation" de l'objet HTML avec lequel l'utilisateur intéragit à l'instant du *refresh*)

### Fichier [GetDistanceModule.php](/WebVersion/GetDistanceModule.php)

C'est un fichier permettant de calculer la distance entre deux points situées sur la Terre, en employant leur latitudes et longitudes. (cf la formule utilisée dans le [README.md](#fichier-readme.md).

### Fichier [BlurModule.php](/WebVersion/BlurModule.php)

C'est un fichier permettant d'altérer le message envoyé par l'utilisateur en fonction de la distance à laquelle se trouve le destinataire de l'expéditeur.

On récupère le message envoyé par l'expéditeur et le transforme en une liste de caractères. On définit un "pourcentage de *blur*" (plus ce pourcentage est élevé, plus la possibilité que chaque caractère soit altéré est élevée) selon la distance, puis on effectue une comparaison entre le pourcentage calculé et le nombre donné aléatoirement par l'ordinateur afin de savoir si le caractère est impacté. S'il est impacté, on le remplace par un nouveau caractère choisit aléatoirement  dans une liste déjà défini ; sinon, on ne change pas le caractère. On insère alors le caractère obtenu dans une liste gardant les caractères qui seront affichés, on passe alors au caractère suivant jusqu'à avoir fini de modifier la liste de caractères du message. On transforme la liste nouvellement obtenue en chaîne de caractères, puis on la renvoie au reste du programme comme étant le message après altération.




