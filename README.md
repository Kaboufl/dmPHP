# MamaMia - Sites de recettes de cuisine

MamaMia est un site internet regroupant des recettes de cuisine.

### Démarrage du serveur

Le serveur de développement local tourne avec Docker avec un conteneur PHP, NginX et mySQL

#### Prérequis

- Un environnement avec une connexion Internet
- Docker installé et configuré avec le plugin `` docker-compose ``
- Git pour le contenu du site

#### Démarrage :
Se rendre à la racine / du projet et taper la commande :
> ``docker-compose up -d --build``

Pour peupler la base de données exécuter la commande suivante dans le conteneur php :
> ``php scripts/createSeed_schema.php``
