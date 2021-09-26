# Super Agri PRO #

Application permettant la mise en relation de particuliers à la recherche de prestation de service, avec des professionnels qualifiés à Abidjan (Côte d'Ivoire)




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
```bash
composer dbinit
```


### Tests
Création de la BDD de test :
```bash
php bin/console doctrine:database:drop --env=test --if-exists --force
php bin/console doctrine:database:create --env=test
```

### 4) Compiler le theme graphique (optionel)
Si vous voulez modifier les thème CSS, il faudra compiler les style Tailwind avec Webpack.\
Pour cela, installez les vendors javascript :
```bash
npm install
```


