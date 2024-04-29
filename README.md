# TP Final
## UE Qualité de code
Ce TP régroupe l'ensemble des points abordés tout au long de cette UE. 
Vous allez devoir cloner, commiter, pusher, faire des pull-request, tester ...
Pour se faire vous allez rajouter une fonctionnalité à l'application web
de ce dépôt en respectant les normes et effectuant les tests nécessaires.

## L'appli web
Elle est relativement simple, la page principale `public/index.php` contient 
une liste d'URLs sur des exemples de formulaire. Chaque URLs est de type
`public/forms/exemple.php` et renvoie
sur un script qui met en œuvre un type de validateur de données.   

### Exemple 
La mise en œuvre du validateur longueur minimal **"min_long"** pour une chaine 
de caractères consiste à ajouter un script php que l'on nommera `min_long.php` 
et que l'on enregistra dans le répertoire `public/forms/`. Il contiendra le
code affichant le formulaire et son traitement.
La validation de la donnée proprement dite ( ici la vérification de la 
longueur minimale ) se fait via une classe portant le même nom soit la 
classe `MinLong`, dont le code sera enregistré dans 
`lib/UPJV/Validator/MinLong.php` 

## Votre travail

Tirer au hazard un validateur parmi la liste sur moodle et implémenter ce
validateur. L'implantation du validateur consiste à écrire une classe du nom
du validateur et un exemple. Vous devez donc ajouter deux fichiers : { la
classe, l'exemple } et modifier `public/index.php` pour ajouter un lien vers
l'exemple. Commiter sur une **branche locale** que vous avez créée qui porte
le **même nom que le validateur **. Pusher vos commits, faites une
pull-request sur la branche `dev` lorsque vous pensez avoir fini. Si votre
pull-resquest est acceptée vous avez les points, sinon regardez le commentaire.

## Points d'attentions
1. Il est nécessaire d'avoir un autoload pour que l'application fonctionne 
correctement, l'autoload est créé automatiquement à partir des directives du 
composer.json, vous devez faire un `composer install` après avoir clôné le 
dépôt. De plus cela installera phpunit et phpcs dans `vendor/bin`

1. Le standard de codage n'est pas celui par défaut, c'est celui de symfony 
dont la définition se trouve dans de le répertoire `tests/phpcs/Symfony`

1. Pour les tests unitaires, vous devez avoir une couverture decode de 100% sur 
votre classe.

1. Le fait de modifier le fichier `public/index.php` vous oblige normalement à 
faire un pull des derniers commits sur la branche `dev` avant de faire votre 
pull request.

