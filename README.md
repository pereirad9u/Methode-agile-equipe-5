# Gestion d'appel d'offre
C'est une application pour simplifier les démarche lors des interactions de tiers autour des appels d'offres

## Aspect technique
- Eloquent ORM
- Flash messages
- CSRF protection
- Authentication (Sentinel)
- Validation (Respect)
- Twig templating engine
- Twig cache
- Twig debug extension

## Installation
### 1. Création du projet
```bash
$ git clone https://Iryu54@bitbucket.org/depinfoens/maeo-equipe-05.git
$ composer install
```

### 2. Ajouter les permissions
```bash
$ cd [app-name]
$ chmod 777 cache
```

### 3. Configurer la base de donnée
Naviguer au dossier `bootstrap/` et copier `db.php.dist` en `db.php`
```bash
$ cd bootstrap
$ cp db.php.dist db.php
```

Vous pouvez maintenant éditer votre configuration de base de donnée dans le fichier db.php

## Dossier clés
- `public/index.php`: Poit d'entrée de l'application
- `cache/twig/`: Twig cache
- `bootstrap/`: Fichiers de configuration
    - `controllers.php`: Enregistrer les controlleurs pour l'application
    - `db.php.dist`: Fichier de configuration (à remplir une fois copier)
    - `dependencies.php`: Services pour Pimple
    - `middleware.php`: Application middleware
    - `settings`: fichier de configuration de l'application
- `src/`
    - `App/`
        - `Controller/`: Controlleurs de l'application
            - `Controller.php`: Controlleur de base hérité par tout les autres controlleurs
        - `Model/`: Modeles Eloquent
        - `Resources/`
            - `routes/`: Routes de l'application
                - `app.php`: Routes principales
                - `auth.php`: Routes pour l'authentification
            - `views/`: Twig templates
