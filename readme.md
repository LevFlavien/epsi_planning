# Installation

#### Pré-requis :

Installation des composants nécessaires :

`composer install`

Configurer la base de données : spécifier le chemin d'accès du fichier sqlite.

`DB_DATABASE="path"`

Installation de la base de données :

`php artisan migrate`


#### (Optionnel) Développement front-end :

Installation des packages :

`npm install`

Compilation des assets :

`npm run dev`

#### Lancement de l'application

Utiliser le serveur built-in :

`php artisan serve`