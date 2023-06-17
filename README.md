# Habbo CMS Open Source

[![PHP Version](https://img.shields.io/badge/PHP-7.4-blue.svg)](https://www.php.net/releases/7_4_0.php)
[![MySQL Version](https://img.shields.io/badge/MySQL-5.7.42-blue.svg)](https://dev.mysql.com/doc/relnotes/mysql/5.7/en/)

Bienvenue dans le projet Habbo CMS Open Source ! Ce CMS est conçu pour faciliter la création et la gestion d'un site web pour votre rétro serveur Habbo.

## Configuration requise
- PHP 7.4 ou version ultérieure
- MySQL 5.7.42 ou version ultérieure

## Installation
1. Clonez le dépôt GitHub dans votre répertoire web :
   ```bash
   git clone https://github.com/votre-utilisateur/habbo-cms.git
   ```

2. Configurez votre serveur web pour pointer vers le répertoire `habbo-cms`.

3. Copiez le fichier `.env.example` et renommez-le en `.env`. Modifiez les paramètres de configuration selon votre environnement, en particulier les informations de connexion à la base de données.

4. Exécutez les commandes suivantes pour installer les dépendances PHP via Composer :
   ```bash
   cd habbo-cms
   composer install
   ```

5. Créez une nouvelle base de données MySQL pour le CMS Habbo et importez le fichier de structure fourni.

6. Assurez-vous que les permissions d'accès en écriture sont correctement configurées pour les dossiers et fichiers nécessaires au bon fonctionnement du CMS.

7. Accédez à votre site web via votre navigateur et suivez les étapes de l'installation pour configurer votre Habbo CMS.

## Contributions
Les contributions sont les bienvenues ! Si vous souhaitez améliorer ou ajouter des fonctionnalités au CMS Habbo, veuillez soumettre une pull request. Assurez-vous de suivre les bonnes pratiques de codage et d'inclure une description claire des modifications apportées.

## Licence
Ce projet est sous licence MIT. Veuillez consulter le fichier [LICENSE](LICENSE) pour plus d'informations.

## Contact
Si vous avez des questions, des suggestions ou des problèmes liés au CMS Habbo, n'hésitez pas à me contacter ici : [zorked#8888].

Merci d'utiliser le CMS Habbo Open Source ! Nous espérons qu'il vous sera utile pour la création de votre rétro serveur Habbo.
