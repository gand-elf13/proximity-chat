# Proximity-Chat

## TO-DO LIST

- Système de chat (WIP)
- Système de calcul de distance (effectué)
- Altération des messages (effectué)
- Applications mobiles (WIP)
- Améliorer l'IHM de la page web (WIP)
- ~~Page d'entrée pour choix de la plateforme (mobile ou PC)~~ la conception du site est réactive

## Système de chat

En pleine amélioration ! On attends vos conseils !
Voici le lien : https://bit.ly/proximity-chat/

## Stockage des messages:

Chaque message est stocké dans la base de données.
Les informations gardées sont l'identité du message (le quantième message), le pseudonyme, la latitude $\phi$ en $rad$ et la longitude $\lambda$ en $rad$ aussi

## Calcul de la distance 

$\text{Voici la formule :}$
$D=R_T(\sin\phi_0\cdot\sin\phi+\cos\phi_0\cdot\cos\phi_1\cdot\cos\Delta\lambda)$
avec:
$R_T=6.3710\cdot10^{3}km\text{ (le rayon de la Terre)}$
$\phi_0,\phi_1\text{ en } rad\text{ (les latitudes respectives des points } P_0\text{ et }P_1)$
$\lambda_0,\lambda_1\text{ en } rad\text{ (les longitudes respectives des points } P_0\text{ et }P_1)$
$\Delta\lambda=\lambda_1-\lambda_0\text{ en }rad$ 


## Altération des messages 

Plus on s'écarte, plus les caractères ont de chances d'êtres permutés par un autre caractère aléatoire tiré d'une liste définie. Lla distance entre l'utilisateur et l'expéditeur du message détermine un pourcentage de permutation en fonction du résultat, le caractère a plus ou moins de chance d'être modifié.
- Zone 1 : rayon de moins de 50 m --> message clair et lisible
- Zone 2 : rayon de 50 a 10 000 m --> certains caractères sont permutés, le message pert en lisibilité
- zone 3 : au-delà que 10 000 m --> le message est entièrement altéré

## App mobile

~~WIP, idée de créer une page d'entrée avec le choix d'une version PC ou mobile~~
La conception du site (notamment du fichier `index.php`) est réactive !

