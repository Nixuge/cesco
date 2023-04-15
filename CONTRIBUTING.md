# Contributing

# Contributing to cescosite :
You want to contribute to the project, but you don't know how? 

Here is a simple tutorial :
## 1. Create the mysql database locally :

First you need to install apache, php and phpmyadmin :
```bash
sudo apt install apache2 php phpmyadmin
```
**For the server selection, choose `apache2`.**

Then restart apache : 
```bash
sudo systemctl restart apache2
```
**You can now acess your mysql database with phpmadmin at :** [localhost/phpmyadmin](http://localhost/phpmyadmin)

<br></br>
Clone CescoSite from github :
```bash
git clone https://github.com/asterjdm/CescoSite.git cescosite
```
**Now import all the mysql required tables and columns from the `db.sql` file.**

Click on import and select the `db.sql` file into the `cescosite` directory.

To let cescosite use your database you musst create a `db.php` file in the root directory of CescoSite. 

Your `db.php` musst be like this:
```php
<?php
  //CHANGE THIS LINES
  $servername = "Your server name, Example : `localhost`";
  $dbname = "The name of your database";
  $username = "username";
  $password = "A secure password";

  // DON'T CHANGE THIS LINES:    
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

?>
```
### **Congratulation your databse is ready!**

## 2. Add trumbowyg :
Cescosite use the [trumbowyg editor](https://github.com/Alex-D/Trumbowyg) to use it in cescosite you must download it into the cescosite root directory:
```bash
cd cescosite
```
```bash
git clone https://github.com/asterjdm/trumbowyg-cescosite.git trumbowyg
```

## 3. Run php locally :
_(First step is requierd)_

<br>

Copy cescosite to `/var/www/html/` :

**_Do that after each modifications_**
```bash
sudo cp cescosite /var/www/html/
```
### **Now you can go to [localhost/cescosite](http://localhost/cescosite) to see cescosite in your machine !**

<br><br><br><br><br><br><br><br><br><br>

# Contributing to make the world a better place : 

**(_This has no relation with cecosite :_)**

If you're looking to contribute to making the world a better place, there are a variety of ways you can get involved. Here are a few ideas to get you started:

1. Volunteer your time: One of the most impactful ways to make a difference is by volunteering your time and skills to organizations and causes that you care about. Whether it's serving at a local food bank, tutoring children in need, or helping out at an animal shelter, there are countless opportunities to make a positive impact in your community and beyond.

2. Donate to a good cause: If you're not able to volunteer your time, consider donating to a reputable charity or nonprofit organization. There are many great causes out there, from disaster relief to environmental conservation to education and beyond.

3. Support ethical businesses: Another way to make a difference is by supporting businesses that prioritize ethical and sustainable practices. Whether it's buying products made from sustainable materials or supporting companies that give back to their communities, your purchasing decisions can have a real impact.

4. Raise awareness: Sometimes, simply raising awareness about an issue can make a big difference. Whether it's sharing information on social media or organizing an event to bring attention to a cause, spreading the word is a powerful way to effect change.

_No matter how you choose to get involved, remember that every little bit helps. Together, we can make the world a better, more just, and more equitable place for all._
