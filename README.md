
# Proximity-Chat

## TO-DO LIST

- Système de chat (effectué)
- Système de calcul de distance (effectué)
- Altération des messages (effectué)
- Améliorer l'IHM de la page web (effectué)
-  ~~Applications mobiles~~
- ~~Page d'entrée pour choix de la plateforme (mobile ou PC)~~
La conception du site est réactive (elle s'adapte elle-même pour que le contenu puisse être correctement lu et ajouté par n'importe quel utilisateur peu importe l'appareil employé) !

## Système de chat

Pour accéder au chat, il faut tout simplement cliquer sur le lien ci-dessous
(En pleine amélioration ! On attends vos conseils !).
Voici le lien : [Proximity Chat](https://clerical-chock.000webhostapp.com/)

## Stockage des messages

Chaque message est stocké dans une base de données.
Les informations gardées sont l'identité du message (le quantième message), le pseudonyme, la latitude $\phi$ en $rad$ et la longitude $\lambda$ en $rad$ aussi.

## Calcul de la distance 

$D=R_T\cdot(\sin\phi_0\cdot\sin\phi_1+\cos\phi_0\cdot\cos\phi_1\cdot\cos\Delta\lambda)$\
$D\text{ en }km\text{, la distance entre les deux points}$\
$R_T=6.3710\cdot10^{3}km\text{ (le rayon de la Terre)}$\
$\phi_0,\phi_1\text{ en } rad\text{ (les latitudes respectives des points } P_0\text{ et }P_1)$\
$\lambda_0,\lambda_1\text{ en } rad\text{ (les longitudes respectives des points } P_0\text{ et }P_1)$\
$\Delta\lambda=\lambda_1-\lambda_0\text{ en }rad$


## Altération des messages 

Plus on s'écarte, plus les caractères ont de chances d'êtres permutés par un autre caractère aléatoire tiré d'une liste définie. La distance entre l'utilisateur et l'expéditeur du message détermine un pourcentage de permutation en fonction du résultat, le caractère a plus ou moins de chance d'être modifié.
- Zone 1 : rayon de moins de $50 m$ $\rightarrow$ message clair et lisible
- Zone 2 : rayon de $50m$ a $10km$ $\rightarrow$ certains caractères sont permutés, le message perd en lisibilité
- zone 3 : au-delà de $10 km$ $\rightarrow$ le message est entièrement altéré
- zone 4 : au delà de $15 km$ $\rightarrow$ le message n'est pas affiché

## App mobile

~~WIP, idée de créer une page d'entrée avec le choix d'une version PC ou mobile~~
La conception du site (notamment du fichier `index.php`) est réactive (elle s'adapte elle-même pour que le contenu puisse être correctement lu et ajouté par n'importe quel utilisateur peu importe l'appareil employé) !
Ainsi, il n'y a pas besoin de recréer une page web pour les appareils électroniques mobiles : le fichier `index.php` est responsable.

## Documentation

[Voici la comparaison](https://chat.openai.com/share/08af03a7-3c1d-4c27-8ded-28a146059ddf) faite entre notre code et celle de ChatGPT effectuée après la réalisation du programme, afin de voir comment est-ce que l'on pourrait optimiser le fonctionnement de notre site.

Le site web est composé d'une page principale stockée dans le fichier [index.php](/WebVersion/index.php) qui sert d'interface. Les messages sont envoyés dans une base de donnée *mySQL* hebergée sur le même *server*.

La requête contient aussi les coordonnées GPS de l'envoi du message, ce qui permet de calculer la distance entre l'utilisateur et la localisation de l'envoie de chaque message à afficher, à l'aide de [GetDistanceModule.php](/WebVersion/GetDistanceModule.php). Une fois la distance calculée, le fichier [BlurModule.php](/WebVersion/BlurModule.php) permet d'altérer le message en fonction d'un pourcentage déterminé selon la distance.

Le fichier [webscript.js](/WebVersion/webscript.js) permet de récupérer les coordonnées GPS et de rendre la page plus fluide et d'améliorer l'expérience de l'utilisateur à l'aide de plusieurs techniques, telles qu'en mettant à jour les messages automatiquement après chaque intervalle de temps défini dans le fichier.

La documentation exhaustive se trouve dans le fichier [Documentation.md](/Documentation.md) pour ceux qui sont intéressés.
