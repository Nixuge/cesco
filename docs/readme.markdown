# CESCO
⚠️ Right now, Cesco is only in french, but, in future updates, it will be multy-languages ⚠️



## Why Cesco ?
* ### Cesco is **free** and **open source**.
  * The philosophy of Cesco is to want a **more open internet**, in a **spirit of exchange** and not of profits.
  * Cesco does not have and **will never have advertising or paid subscriptions**
* ### Cesco is focused on **privacy** : 
  * Unlike many other social networks, Cesco **does not collect any personal data about you**.
  * Many social networks have personalized recommendations, based on collected personal data. **On cescosit, you can choose the order of the posts with the click of a button**.
* ### Cesco thinks that everyone has the right to **express himself**.
  * We let **everyone have their say**, regardless of their opinion.
  * Everybody can say his opinion, but it doesn't mean that you can say what you want against someone, that's why we have very clear [rules](https://rmbi.ch/Cesco/pages/rules.html) on the subject.

### Enjoy 😁!!

## Run Cesco locally :
_If you are not on linux, follow this tutorial:  https://ubuntu.com/tutorials/install-ubuntu-desktop#1-overview._ 
### Install apache, php, phpmyadmin and mysql-server :
```bash
sudo apt install apache2 php phpmyadmin mysql-server
```
At this step you will be asked to choose a phpmyadmin password, remember it.
### Start apache :
```bash
sudo service apache2 start
```

### You can now access PhpMyAdmin on http://localhost/phpmyadmin

### Clone Cesco from github :
```bash
git clone https://github.com/asterjdm/cesco.git cesco
```
### Import mysql required tables :
- Go to phpmyadmin on http://localhost/phpmyadmin
- Click on import and select the db.sql file into the cesco directory.
### Create config.php :
- Create a new file in the cesco directory called `config.php`. You can copy and paste `config.example.php` content for example.
__Your database is ready, you can now,__

### Run cesco :
- __Copy Cesco to /var/www/html/ :__ :
_Do this after each modification_:
```bash
sudo cp cesco /var/www/html/
```
### Now you can go to http://localhost/cesco !

# __1'000__ commits on GitHub !!!!!!!!