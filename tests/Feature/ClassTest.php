<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClassTest extends BrowserKitTestCase
{
    /**
     * Test per controllare che il login da parte del superadmin vada a buon fine
     */
    public function testLoginAdmin()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test per controllare che il login da parte del responsabile aziendale vada a buon fine
     */
    public function testLoginManager()
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test per controllare che il login da parte del dipendente vada a buon fine
     */
    public function testLoginEmployee()
    {
        $this->visit('/login')->type('daniela', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
    }

    /**
     * Test login con dati non validi
     */
    public function testLoginWrong()
    {
        $this->visit('/login')->type('daniela', 'username')->type('b', 'password')->press('Login')->seePageIs('/welcome');
    }

    /**
     * Test per controllare che l'aggiunta di un utente da parte dell'admin risulta valida
     */
    public function testAdminAddUserValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('LVRMSM95T18A662Z', 'CF')
            ->type('Massimo', 'Name')
            ->type('Lavermicocca', 'Surname')
            ->type('Massimo95', 'username')
            ->type('a', 'password')
            ->type('b@b.com', 'Email')
            ->type('3334107564', 'Phone')
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
            ->type('CLNFNC96H22A662', 'CF')
            ->type('Francesco', 'Name')
            ->type('Colaianni', 'Surname')
            ->type('Frax22', 'username')
            ->type('a', 'password')
            ->type('fra@hotmail.com', 'Email')
            ->type('3334107565', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Nome non valido
     */
    public function testAdminAddUserNameWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('CLNFNC96H22A662K', 'CF')
            ->type('1111', 'Name')
            ->type('Colaianni', 'Surname')
            ->type('Frax22', 'username')
            ->type('a', 'password')
            ->type('fra@hotmail.com', 'Email')
            ->type('3334107565', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Cognome non valido
     */
    public function testAdminAddUserSurnameWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('CLNFNC96H22A662', 'CF')
            ->type('Francesco', 'Name')
            ->type('11111', 'Surname')
            ->type('Frax22', 'username')
            ->type('a', 'password')
            ->type('fra@hotmail.com', 'Email')
            ->type('3334107565', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test aggiunta utente da parte dell'admin con Telefono non valido
     */
    public function testAdminAddUserPhoneWrong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('CLNFNC96H22A662', 'CF')
            ->type('Francesco', 'Name')
            ->type('Colaianni', 'Surname')
            ->type('Frax22', 'username')
            ->type('a', 'password')
            ->type('fra@hotmail.com', 'Email')
            ->type('aaaaaa', 'Phone')
            ->press('insert_user')
            ->seePageIs('/admin/users');
    }

    /**
     * Test per controllare che l'aggiunta di un cliente da parte dell'admin risulta valida
     */
    public function testAdminAddClientValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('10', 'StreetNumber')
            ->type('70122', 'ZipCode')
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
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('10', 'StreetNumber')
            ->type('70122', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Provincia errata
     */
    public function testAdminAddClientWrongProvince()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('10', 'StreetNumber')
            ->type('70122', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con città errata
     */
    public function testAdminAddClientWrongCity()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('11', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('10', 'StreetNumber')
            ->type('70122', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Numero Civico errato
     */
    public function testAdminAddClientWrongStNumber()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('AB', 'StreetNumber')
            ->type('70122', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test aggiunta cliente da parte dell'admin con Codice Postale errato
     */
    public function testAdminAddClientWrongZipCode()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/client/showAdd')
            ->type('25647921365', 'PI')
            ->type('Prova', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Via Di Mola', 'Street')
            ->type('10', 'StreetNumber')
            ->type('701226', 'ZipCode')
            ->press('insert_client')
            ->seePageIs('/admin/clients');
    }

    /**
     * Test per controllare che l'aggiunta di un sito da parte dell'admin risulti valida
     */
    public function testAdminAddSiteValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Modugno', 'Street')
            ->type('78', 'StreetNumber')
            ->type('70123', 'ZipCode')
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
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BARI', 'Province')
            ->type('Bari', 'City')
            ->type('Via Modugno', 'Street')
            ->type('78', 'StreetNumber')
            ->type('70123', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test aggiunta sito da parte dell'admin con città errata
     */
    public function testAdminAddSiteWrongCity()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('75', 'City')
            ->type('Via Modugno', 'Street')
            ->type('78', 'StreetNumber')
            ->type('70123', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test aggiunta sito da parte dell'admin con N. civico errato
     */
    public function testAdminAddSiteWrongStNumber()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Modugno', 'Street')
            ->type('AB', 'StreetNumber')
            ->type('70123', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test aggiunta sito da parte dell'admin con codice civio errato
     */
    public function testAdminAddSiteWrongZipCode()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/site/showAdd')
            ->type('Sito9', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Modugno', 'Street')
            ->type('78', 'StreetNumber')
            ->type('701236', 'ZipCode')
            ->press('insert_site')
            ->seePageIs('/admin/sites');
    }

    /**
     * Test per controlalre che l'aggiunta di un sensore da parte dell'admin sia valida
     */
    public function testAdminAddSensorValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-555', 'Model')
            ->type('42.666666', 'Latitude')
            ->type('54.554566', 'Longitude')
            ->type('100', 'MaxValue')
            ->type('20', 'MinValue')
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
            ->type('GFG-555', 'Model')
            ->type('42.6', 'Latitude')
            ->type('54.554566', 'Longitude')
            ->type('100', 'MaxValue')
            ->type('20', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con longitudine errata
     */
    public function testAdminAddSensorWrongLong()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-555', 'Model')
            ->type('42.666666', 'Latitude')
            ->type('54.5', 'Longitude')
            ->type('100', 'MaxValue')
            ->type('20', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con valore massimo errato
     */
    public function testAdminAddSensorWrongMaxValue()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-555', 'Model')
            ->type('42.666666', 'Latitude')
            ->type('54.554566', 'Longitude')
            ->type('100.50', 'MaxValue')
            ->type('20', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test aggiunta sensore da parte dell'admin con valore minimo errato
     */
    public function testAdminAddSensorWrongMinValue()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('GFG-555', 'Model')
            ->type('42.666666', 'Latitude')
            ->type('54.554566', 'Longitude')
            ->type('100', 'MaxValue')
            ->type('20.50', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }
}
