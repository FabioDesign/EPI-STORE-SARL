# Titre du projet
EPI STORE SARL

## A Propos
C'est un Site Web de confection et de vente d'équipement de protection individuel et fournitures.

## Dépendences / Prérequis
LARAVEL = 10
PHP > = 8.1
Composer 2.0
MYSQL > = 5.0
Apache 2.4

## Installation des packages
1. Dépôt vide
```
git init
git remote add origin https://github.com/FabioDesign/epistore.git
git branch -M main
```

2. Installer Log-viewer
```
composer require arcanedev/log-viewer
```

3. Installer PHP Mailer
```
composer require phpmailer/phpmailer
```

4. Installer DomPDF
```
composer require barryvdh/laravel-dompdf
php artisan vendor:publish --provider="Barryvdh\DomPDF\ServiceProvider"
```

7. Copier le contenu de .env.example vers .env et modifier les paramètres
```
cp .env.example .env
```

8. Faire la migration de la base de données
```
php artisan migrate
php artisan db:seed
```

9. Exécuter la commande à la fin
```
php artisan key:generate
```

10. Vérifier si tout est bien installé
```
composer dump-autoload
```

11. Lien du swagger
```
php artisan l5-swagger:generate
url/api/documentation
```

## Réalisé avec
Liste des programmes/logiciels utilisés pour développer le projet

* [Laravel] (https://laravel.com/) - Framework PHP
* [Visual Studio Code] (https://code.visualstudio.com/) - Editeur de textes


## Ressource
OGOU Fabrice - R&D Team Lead (https://www.linkedin.com/in/fabiodesign2010)