<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;


class ClassTest extends BrowserKitTestCase
{
    /**
     * Test per controllare che il login da parte del superadmin vada a buon fine
     */
    public function testLoginAdmin() //white
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test per controllare che il login da parte del responsabile aziendale vada a buon fine
     */
    public function testLoginManager() //white
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test per controllare che il login da parte del dipendente vada a buon fine
     */
    public function testLoginEmployee() //white
    {
        $this->visit('/login')->type('daniela', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test login con dati non validi
     */
    public function testLoginWrong() //black
    {
        $this->visit('/login')->type('daniela', 'username')->type('b', 'password')->press('Login')->seeStatusCode(200);
    }

    /**
     * Test per controllare che l'aggiunta di un utente da parte dell'admin risulta valida
     */
    public function testAdminAddUserValid() //white
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Codice Fiscale non valido
     */
    public function testAdminAddUserCFWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A66', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria80@gmail.com', 'Email')
            ->type('3334107587', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Nome non valido
     */
    public function testAdminAddUserNameWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('11114', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria80@gmail.com', 'Email')
            ->type('3334107565', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Cognome non valido
     */
    public function testAdminAddUserSurnameWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('1111154', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria80@gmail.com', 'Email')
            ->type('3334107576', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Telefono non valido
     */
    public function testAdminAddUserPhoneWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria80@gmail.com', 'Email')
            ->type('aaaaaab', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test per controllare che l'aggiunta di un cliente da parte dell'admin risulta valida
     */
    public function testAdminAddClientValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Partiva Iva errata
     */
    public function testAdminAddClientWrongPI()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('256479213ab', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Provincia errata
     */
    public function testAdminAddClientWrongProvince()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con città errata
     */
    public function testAdminAddClientWrongCity()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('89g', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Numero Civico errato
     */
    public function testAdminAddClientWrongStNumber()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('AB', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Codice Postale errato
     */
    public function testAdminAddClientWrongZipCode()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('701256', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test per controllare che l'aggiunta di un sito da parte dell'admin risulti valida
     */
    public function testAdminAddSiteValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test aggiunta sito da parte dell'admin con provincia errata
     */
    public function testAdminAddSiteWrongProvince()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test aggiunta sito da parte dell'admin con città errata
     */
    public function testAdminAddSiteWrongCity()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('76', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test aggiunta sito da parte dell'admin con N. civico errato
     */
    public function testAdminAddSiteWrongStNumber()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('AB', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test aggiunta sito da parte dell'admin con codice civico errato
     */
    public function testAdminAddSiteWrongZipCode()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('7012565', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test per controlalre che l'aggiunta di un sensore da parte dell'admin sia valida
     */
    public function testAdminAddSensorValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con latitudine errata
     */
    public function testAdminAddSensorWrongLat()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.7', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con longitudine errata
     */
    public function testAdminAddSensorWrongLong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.6', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con valore massimo errato
     */
    public function testAdminAddSensorWrongMaxValue()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105.87', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con valore minimo errato
     */
    public function testAdminAddSensorWrongMinValue()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26.87', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * Test Black Box: aggiunta utente con codice fiscale corretto
     * Classe di Equivalenza: CE1
     */
    public function testAdminAddUserCFValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test Black Box: aggiunta utente con codice fiscale con lunghezza <16
     * Classe di Equivalenza: CE2
     */
    public function testAdminAddUserCFWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A66', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con codice fiscale con lunghezza >16
     * Classe di Equivalenza: CE3
     */
    public function testAdminAddUserCFWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662IXS', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con codice fiscale con formato errato
     * Classe di Equivalenza: CE4
     */
    public function testAdminAddUserCFWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('80D54SNAMRAA662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con nome corretto
     * Classe di equivalenza: CE5
     */
    public function testAdminAddUserNameValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test Black Box: aggiunta utente con nome con un solo carattere
     * Classe di Equivalenza: CE6
     */
    public function testAdminAddUserNameWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('M', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con nome con un carattere ed un numero
     * Classe di Equivalenza: CE7
     */
    public function testAdminAddUserNameWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('M7', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con cognome corretto
     * Classe di Equivalenza: CE5
     */
    public function testAdminAddUserSurmnameValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test Black Box: aggiunta utente con cognome con un solo carattere
     * Classe di Equivalenza: CE6
     */
    public function testAdminAddUserSurmnameWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('S', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con cognome con un carattere ed un numero
     * Classe di Equivalenza: CE7
     */
    public function testAdminAddUserSurmnameWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('S8', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con telefono corretto con 9 cifre
     * Classe di Equivalenza: CE8
     */
    public function testAdminAddUserPhoneValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('333410757', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test Black Box: aggiunta utente con telefono corretto con 10 cifre
     * Classe di Equivalenza: CE9
     */
    public function testAdminAddUserPhoneValid1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('3334107577', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test Black Box: aggiunta utente con telefono con meno di 9 cifre
     * Classe di Equivalenza: CE10
     */
    public function testAdminAddUserPhoneWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('33341075', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con telefono con più di 10 cifre
     * Classe di Equivalenza: CE11
     */
    public function testAdminAddUserPhoneWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('33341075778', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta utente con telefono con formato non valido
     * Classe di Equivalenza: CE12
     */
    public function testAdminAddUserPhoneWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('SNAMRA80D54A662I', 'CF')
            ->type('Maria', 'Name')
            ->type('Sanò', 'Surname')
            ->type('missmaria80', 'username')
            ->type('a', 'password')
            ->type('missmaria@gmail.com', 'Email')
            ->type('33341075DYH', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/user/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con P.IVA corretta
     * Classe di Equivalenza: CE13
     */
    public function testAdminAddClientPIValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con P.IVA con formato errato
     * Classe di Equivalenza: CE14
     */
    public function testAdminAddClientPIWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921ABG', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con P.IVA con meno di 11 cifre
     * Classe di Equivalenza: CE15
     */
    public function testAdminAddClientPIWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('256479213', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con P.IVA con più di 11 cifre
     * Classe di Equivalenza: CE16
     */
    public function testAdminAddClientPIWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('2564792136576', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con Provincia corretta
     * Classe di Equivalenza: CE17
     */
    public function testAdminAddClientProvinceValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con Provincia con meno di 2 lettere
     * Classe di Equivalenza: CE18
     */
    public function testAdminAddClientProvinceWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('B', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con Provincia con più di 2 lettere
     * Classe di Equivalenza: CE19
     */
    public function testAdminAddClientProvinceWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BAR', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con Provincia con formato errato
     * Classe di Equivalenza: CE20
     */
    public function testAdminAddClientProvinceWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('B8', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con Città corretta
     * Classe di Equivalenza: CE21
     */
    public function testAdminAddClientCityValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con Città con formato errato
     * Classe di Equivalenza: CE22
     */
    public function testAdminAddClientCityWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('34', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con Città con meno di 2 lettere
     * Classe di Equivalenza: CE23
     */
    public function testAdminAddClientCityWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('B', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con civico corretto
     * Classe di Equivalenza: CE24
     */
    public function testAdminAddClientStNumberValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con civico corretto
     * Classe di Equivalenza: CE25
     */
    public function testAdminAddClientStNumberValid1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8B', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con civico errato (una sola lettera)
     * Classe di Equivalenza: CE26
     */
    public function testAdminAddClientStNumberWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('A', 'StreetNumber')
            ->type('70122', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con civico con formato errato
     * Classe di Equivalenza: CE27
     */
    public function testAdminAddClientStNumberWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8BC', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con codice postale corretto
     * Classe di Equivalenza: CE28
     */
    public function testAdminAddClientZipCodeValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8B', 'StreetNumber')
            ->type('70120', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test Black Box: aggiunta cliente con codice postale con formato errrato
     * Classe di Equivalenza: CE29
     */
    public function testAdminAddClientZipCodeWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8B', 'StreetNumber')
            ->type('7012H', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con codice postale con meno di 5 cifre
     * Classe di Equivalenza: CE30
     */
    public function testAdminAddClientZipCodeWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8B', 'StreetNumber')
            ->type('701', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta cliente con codice postale con più di 5 cifre
     * Classe di Equivalenza: CE31
     */
    public function testAdminAddClientZipCodeWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Amarcord SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale King', 'Street')
            ->type('8B', 'StreetNumber')
            ->type('7012077', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/client/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Provincia corretta
     * Classe di Equivalenza: CE17
     */
    public function testAdminAddSiteProvinceValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Provincia con meno di 2 lettere
     * Classe di Equivalenza: CE18
     */
    public function testAdminAddSiteProvinceWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('B', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Provincia con più di 2 lettere
     * Classe di Equivalenza: CE19
     */
    public function testAdminAddSiteProvinceWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BAR', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Provincia con formato errrato
     * Classe di Equivalenza: CE20
     */
    public function testAdminAddSiteProvinceWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('B1', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Città corretta
     * Classe di Equivalenza: CE21
     */
    public function testAdminAddSiteCityValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Città con formato errato
     * Classe di Equivalenza: CE22
     */
    public function testAdminAddSiteCityWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('45', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Città con meno di 2 lettere
     * Classe di Equivalenza: CE23
     */
    public function testAdminAddSiteCityWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('B', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Civico corretto
     * Classe di Equivalenza: CE24
     */
    public function testAdminAddSiteStNumberValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Civico corretto
     * Classe di Equivalenza: CE25
     */
    public function testAdminAddSiteStNumberValid1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7A', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Civico errato
     * Classe di Equivalenza: CE26
     */
    public function testAdminAddSiteStNumberWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Modugno', 'Street')
            ->type('A', 'StreetNumber')
            ->type('70123', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Civico con formato errato
     * Classe di Equivalenza: CE27
     */
    public function testAdminAddSiteStNumberWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7AA', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Codice Postale corretto
     * Classe di Equivalenza: CE28
     */
    public function testAdminAddSiteZipCodeValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70125', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test Black Box: aggiunta sito con Codice Postale con formato errato
     * Classe di Equivalenza: CE29
     */
    public function testAdminAddSiteZipCodeWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('701UY', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Codice Postale con meno di 5 cifre
     * Classe di Equivalenza: CE30
     */
    public function testAdminAddSiteZipCodeWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('701', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
     * Test Black Box: aggiunta sito con Codice Postale con più di 5 cifre
     * Classe di Equivalenza: CE31
     */
    public function testAdminAddSiteZipCodeWrong3()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito65', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('7012665', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/site/showAdd');
    }

    /**
 * Test Black Box: aggiunta sensore con la latitudine corretta
 * Classe di Equivalenza: CE32
 */
    public function testAdminAddSensorLatitudeValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con la latitudine con più di 2 cifre prima del punto
     * Classe di Equivalenza: CE33
     */
    public function testAdminAddSensorLatitudeWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('4255.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con la latitudine con meno di 6 cifre dopo il punto
     * Classe di Equivalenza: CE34
     */
    public function testAdminAddSensorLatitudeWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.67', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con la longitudine corretta
     * Classe di Equivalenza: CE32
     */
    public function testAdminAddSensorLongitudeValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con la longitudine con più di 2 cifre prima del punto
     * Classe di Equivalenza: CE33
     */
    public function testAdminAddSensorLongitudeWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('5488.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con la longitudine con meno di 6 cifre dopo il punto
     * Classe di Equivalenza: CE34
     */
    public function testAdminAddSensorLongitudeWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.56', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore massimo corretto
     * Classe di Equivalenza: CE35
     */
    public function testAdminAddSensorMaxValValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore massimo corretto
     * Classe di Equivalenza: CE36
     */
    public function testAdminAddSensorMaxValValid1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('-27', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore massimo con formato errato
     * Classe di Equivalenza: CE37
     */
    public function testAdminAddSensorMaxValWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105.78', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore minimo corretto
     * Classe di Equivalenza: CE35
     */
    public function testAdminAddSensorMinValValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore minimo corretto
     * Classe di Equivalenza: CE36
     */
    public function testAdminAddSensorMinValWrong1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('-8', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore minimo con formato errato
     * Classe di Equivalenza: CE37
     */
    public function testAdminAddSensorMinValWrong2()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-578', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26.9', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensor/showAdd');
    }
}
