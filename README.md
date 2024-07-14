
# ESP News

ESP News est une application de nouvelles développée en PHP en suivant le modèle architectural MVC (Model-View-Controller). Elle permet de gérer et d'afficher des articles classés par catégories.

## Structure du projet

```plaintext
/ESPNews
├── /controllers
│   ├── ArticleController.php
│   └── CategoryController.php
├── /models
│   ├── Article.php
│   └── Category.php
├── /views
│   ├── header.php
│   ├── footer.php
│   ├── nav.php
│   ├── home.php
│   ├── category.php
│   └── article.php
├── index.php
├── db.php
└── style.css
```

## Installation

### 1. Clonez le dépôt

```bash
git clone https://github.com/cheikht1/esp-news.git
cd esp-news
```

### 2. Configurez la base de données

Créez une base de données MySQL et importez les tables nécessaires.

### 3. Configurez la connexion à la base de données

Modifiez le fichier `db.php` pour ajouter les informations de connexion à votre base de données :

```php
<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=espnews', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
```

### 4. Lancez l'application

Accédez à l'application via un serveur web (par exemple, Apache ou Nginx) en ouvrant le fichier `index.php` dans votre navigateur.

## Utilisation

L'application affiche une liste de catégories. En sélectionnant une catégorie, vous verrez les articles associés. En cliquant sur un article, vous pourrez lire son contenu.

## Structure MVC

- **Modèles (Models)** : Les modèles `Article.php` et `Category.php` gèrent les interactions avec la base de données.
- **Vues (Views)** : Les vues dans le dossier `views` gèrent l'affichage des données à l'utilisateur.
- **Contrôleurs (Controllers)** : Les contrôleurs `ArticleController.php` et `CategoryController.php` gèrent la logique de l'application et la coordination entre les modèles et les vues.

## Contributions

Les contributions sont les bienvenues ! Pour contribuer :

1. Forkez le dépôt.
2. Créez une branche pour votre fonctionnalité :

    ```bash
    git checkout -b feature/nouvelle-fonctionnalite
    ```

3. Commitez vos modifications :

    ```bash
    git commit -am "Ajout d'une nouvelle fonctionnalité"
    ```

4. Poussez votre branche :

    ```bash
    git push origin feature/nouvelle-fonctionnalite
    ```

5. Créez une Pull Request.

## Plan pour la version suivante : DevOps

Pour la prochaine version, nous allons appliquer les principes DevOps en utilisant les outils suivants :

- **Docker** : Conteneurisation de l'application pour garantir la cohérence des environnements.
- **Kubernetes** : Orchestration des conteneurs pour déployer et gérer l'application à grande échelle.
- **Jenkins** : Automatisation des builds et des déploiements.
- **Terraform** : Infrastructure as Code (IaC) pour la gestion des ressources cloud.
- **ELK Stack** : Monitoring et analyse des logs.
- **SonarQube** : Analyse de la qualité du code.
- **Prometheus & Grafana** : Monitoring des performances et visualisation des métriques.

<!-- ## Licence

Ce projet est sous licence MIT. Voir le fichier [LICENSE](./LICENSE) pour plus de détails. -->

## Auteurs

- **CHEIKH MOUHAMED TIDIANE THIAM**

Pour plus d'informations, visitez notre [dépôt GitHub](https://github.com/cheikht1/esp-news).

## Contact

Pour toute question ou demande, veuillez contacter [cmtt1004@gmail.com](mailto:cmtt1004@gmail.com).
