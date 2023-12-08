# proximity-chat

## TO DO LIST

- systeme de chat (WIP)
- systeme de calcul de distance (effectuer)
- alteration des messages (effectuer)
- applications mobiles (WIP)
- ameliorer l'IHM de la page web (WIP)
- page d'entrée pour choix de la plateforme (mobile ou PC)

## systeme de chat

en plein amélioration ! on attends vos conseils !
host ici https://clerical-chock.000webhostapp.com/

## Stockage des messages:

sous la forme:
la partie pseudo id message est faite
pseudo-id-message-x-y

## calcul de la distance 

on utilise pythagore

## alteration des messages 

plus on s'ecarte plus les caracteres ont de chances d'êtres permutés par un autre caractère aleatoire tiré d'une liste définie, la distance entre l'utilisateur et l'envoyeur du msg détermine un % de permutation en fonction du résultat, le caractère a plus ou moins de chances d'être modifié.
- zone 1 : rayon de moins de 50 m --> msg clair
- zone 2 : rayon de 50 a 10 000 m --> caracteres permutes + possible floutage
- zone 3 : + que 10 000 m --> msg non affiche

## app mobile

WIP, idée de créer une page d'entrée avec le choix d'une version PC ou mobile

## lien pour trouver du code :

- recup coordonnees gps en php :
https://numa-bord.com/miniblog/php-google-map-api-recuperer-coordonees-gps-depuis-adresse-format-humain/

- calcul distance entre 2 coordonnees gps en php : 
https://numa-bord.com/miniblog/php-calcul-de-distance-entre-2-coordonnees-gps-latitude-longitude/

- recuperation de l'ip du user et puis a partir de l'ip, on trouve sa ville :
https://wabeo.fr/coordonnees-gps-utilisateur/

- autre calcul distance :
https://www.awelty.fr/blog/developpement-web/php.html

- tutoriel HTML et CSS :
https://www.cssdebutant.com/
