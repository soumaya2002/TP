# Plateforme - Mon Petit CE #

La plateforme requiert un nom de domaine principal pour le site vitrine (ex. monpetitce.com), ainsi qu'un sous-domaine pour chaque boutique. Il est également possible de définir un nom de domaine secondaire spécifique à la boutique YAMBO (ex. yam-bo.fr) afin de pouvoir y accéder via une URL spécifique.




## 📦 Installation 

Cloner le dépôt, puis installer les vendors :
```shell
composer install
```

Dupliquer le fichier `.env` vers `.env.local` et définir les variables d'environnement :
```dotenv
DATABASE_URL=mysql://root:root@localhost:3306/mpce?serverVersion=8&charset:utf8mb4
```

## ⚙️ Configuration [DEV]

> ⚠️ N'effectuer ces actions qu'en environnement de développement !

### 1) Base de données 
(Ré)initialiser la base de données avec les fixtures de développement :
```shell
composer dbinit
```

### 4) Compiler le theme graphique (optionel)
Si vous voulez modifier les thème CSS, il faudra compiler les style Tailwind avec Webpack.\
Pour cela, installez les vendors javascript :
```shell
npm install
```

Puis lancer la compilation des feuilles de style :
```shell
# Minifié (pour la production) 
npm run prod

# ou la version de développement
npm run dev
```
_Attention: toujours compiler le CSS en "prod" pour la version poussée sur le dépôt GIT !_


## ⚙️ Configuration [PROD]

Configurer les variables d'environnement suivantes :

```dotenv
API_SENDINBLUE_KEY=...

```

Puis initialisez la base de données et jouez les migrations.

