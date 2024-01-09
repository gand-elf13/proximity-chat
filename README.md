# Proximity-Chat

## TO-DO LIST

- Système de chat (WIP)
- Système de calcul de distance (effectué)
- Altération des messages (effectué)
- Applications mobiles (WIP)
- Améliorer l'IHM de la page web (WIP)
- ~~Page d'entrée pour choix de la plateforme (mobile ou PC)~~
La conception du site est réactive (elle s'adapte elle-même pour que le contenu puisse être correctement lu et ajouté par n'importe quel utilisateur peu importe l'appareil employé) !

## Système de chat

Pour accéder au chat, il faut tout simplement cliquer sur le lien ci-dessous
(En pleine amélioration ! On attends vos conseils !)
Voici le lien : [Proximity Chat](https://clerical-chock.000webhostapp.com/)

## Stockage des messages

Chaque message est stocké dans une base de données.
Les informations gardées sont l'identité du message (le quantième message), le pseudonyme, la latitude $\phi$ en $rad$ et la longitude $\lambda$ en $rad$ aussi

## Calcul de la distance 

$\text{Voici la formule :}$\
$D=R_T\cdot(\sin\phi_0\cdot\sin\phi+\cos\phi_0\cdot\cos\phi_1\cdot\cos\Delta\lambda)$\
$R_T=6.3710\cdot10^{3}km\text{ (le rayon de la Terre)}$\
$\phi_0,\phi_1\text{ en } rad\text{ (les latitudes respectives des points } P_0\text{ et }P_1)$\
$\lambda_0,\lambda_1\text{ en } rad\text{ (les longitudes respectives des points } P_0\text{ et }P_1)$\
$\Delta\lambda=\lambda_1-\lambda_0\text{ en }rad$


## Altération des messages 

Plus on s'écarte, plus les caractères ont de chances d'êtres permutés par un autre caractère aléatoire tiré d'une liste définie. La distance entre l'utilisateur et l'expéditeur du message détermine un pourcentage de permutation en fonction du résultat, le caractère a plus ou moins de chance d'être modifié.
- Zone 1 : rayon de moins de 50 m --> message clair et lisible
- Zone 2 : rayon de 50 a 10 000 m --> certains caractères sont permutés, le message pert en lisibilité
- zone 3 : au-delà de 10 km --> le message est entièrement altéré
- zone 4 : qu delà de 15 km --> le message n'est pas affiché

## App mobile

~~WIP, idée de créer une page d'entrée avec le choix d'une version PC ou mobile~~
La conception du site (notamment du fichier `index.php`) est réactive (elle s'adapte elle-même pour que le contenu puisse être correctement lu et ajouté par n'importe quel utilisateur peu importe l'appareil employé) !

## Documentation

la documentation complete se trouve dans le fichier [Documentation.md](Documentation.md)

le site web es composé d'une page principale appelée [`index.php`](WebVersion/index.php) qui sert d'interface.

les messages sont evoyés dans une base de donnée  mySQL hebergée sur le meme server.

la requette contien aussi les coordonnées gps ou le message as été envoyé ce qui permet de calculer la distance entre l'utilisateur et chaque message a afficher a l'aide de [`GetDistanceModule.php`](WebVersion/GetDistanceModule.php). une fois la distance calculée, le fichier [`BlurModule.php`](WebVersion/BlurModule.php) permet d'alterer le message en fonction de la distance.

le fichier [`webscript.js`](WebVersion/webscript.js) permet de recuperer les coordonnées gps et rendre la page plus fluide en mettant as jour les messages automatiquement entre autre.