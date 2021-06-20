## INVOICE



Application for add items and create invoice

Modules :
ITEMS ,
INVOICE



- Installation 

*  Install XAMPP  or other server for running 
*  In root , a database folder have database of this project
*  Import database names ad invoice
*  set this folder in server
*  change ROOT_URI path in header.php , Give Your localhost path
*  RUN


 - Spec
```
* . Login  credentials 
    User Id : Admin
    Password : 123
```
* . Items : 
     Add Item
    Edit Item
    Delete item

* .  Invoice
        Select item
        click item and select
        change quantity, discount amount,discount percentage 
        delete item
        print view


-  DESCRIPTION  

LOGIN :

  * Login  required  network connection, because get cdn libraries like bootstrap , 
  * Login , password hashing using sh256 , for security purpose
  * if password is incorrect show error password and is correct redirect to dashboard


SIDEBAR :

* In side bar , 2 links 
    Items 
    Invoice

    In Click Items => Show all items, and item crud
    Can add item with property and edit and delete
    All item data entered to db


    In Click Invoice =>   

        Item :
            Show all added items
            Can search any data with item name
            And select item in invoice [ When click in item]

        Selected Item :
            All selected item show in right side of invoice page
            can change quantity
            can change discount percentage
            can change discount amount
            and delete selected item

            and totalBefore tax and subtotal is calculated,

        Total :
            In the bottom of selected data , 
            Show total after tax of invoice

        Print :
            When click print button, all details of selected invoice ite are shown in printable formate





- language used 


* Php
* HTML
* css
* Javascript
* jquery
* mySQLi


  Backend : PHP 
  Database : MySQLi
  Front End : HTML, css, Javascript






 - note : 

    All calculation of invoice are in front end

    * Can change UI to best user friendly
    * Can add data invoice and keep data 
    * and edit invoice

# invoice

