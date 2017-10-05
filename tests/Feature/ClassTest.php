<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;


class ClassTest extends BrowserKitTestCase
{
    /**
     * Test Black Box: aggiunta utente con codice fiscale corretto
     * Classe di Equivalenza: CE1
     */
    public function testAdminAddUserCFValid()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/user/showAdd')
            ->type('MGGLNZ80D01F205O', 'CF')
            ->type('Lorenzo', 'Name')
            ->type('Maggi', 'Surname')
            ->type('lorenzo80', 'username')
            ->type('a', 'password')
            ->type('maggilorenzo@gmail.com', 'Email')
            ->type('3334107607', 'Phone')
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
            ->type('Sano', 'Surname')
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
            ->type('Sano', 'Surname')
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
            ->type('Sano', 'Surname')
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
            ->type('CRNMRA70B50F839D', 'CF')
            ->type('Maria', 'Name')
            ->type('Carenza', 'Surname')
            ->type('mariacar', 'username')
            ->type('a', 'password')
            ->type('mariacar@hotmail.it', 'Email')
            ->type('3465107577', 'Phone')
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
            ->type('Sano', 'Surname')
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
            ->type('Sano', 'Surname')
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
            ->type('DLISRN00M46A662K', 'CF')
            ->type('Sabrina', 'Name')
            ->type('Dileo', 'Surname')
            ->type('sabrina', 'username')
            ->type('a', 'password')
            ->type('dileo00@gmail.com', 'Email')
            ->type('3351265986', 'Phone')
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
            ->type('LPZRSO49A41A662E', 'CF')
            ->type('Rosa', 'Name')
            ->type('Lopez', 'Surname')
            ->type('rosetta', 'username')
            ->type('a', 'password')
            ->type('rosetta49@gmail.com', 'Email')
            ->type('331237457', 'Phone')
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
            ->type('CLNFRC84L48A662X', 'CF')
            ->type('Federica', 'Name')
            ->type('Colaianni', 'Surname')
            ->type('missfede', 'username')
            ->type('a', 'password')
            ->type('federicacola@hotmail.it', 'Email')
            ->type('3315107577', 'Phone')
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
            ->type('Sano', 'Surname')
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
            ->type('Sano', 'Surname')
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
            ->type('Sano', 'Surname')
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
            ->type('78974125864', 'PI')
            ->type('De Santis SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Viale Salandra', 'Street')
            ->type('84', 'StreetNumber')
            ->type('70124', 'ZipCode')
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
            ->type('36521039586', 'PI')
            ->type('Brunori Spa', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('MI', 'Province')
            ->type('Milano', 'City')
            ->type('Via Papa XXIII', 'Street')
            ->type('89', 'StreetNumber')
            ->type('70150', 'ZipCode')
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
            ->type('85236974100', 'PI')
            ->type('Giannini SRL', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('NA', 'Province')
            ->type('Napoli', 'City')
            ->type('Viale Einaudi', 'Street')
            ->type('8', 'StreetNumber')
            ->type('78590', 'ZipCode')
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
            ->type('75395125864', 'PI')
            ->type('Maldarizzi', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Pavoncelli', 'Street')
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
            ->seePageIs('/admin/client/showAdd');
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
            ->type('74125896325', 'PI')
            ->type('Natuzzi', 'BusinessName')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Fanelli', 'Street')
            ->type('404', 'StreetNumber')
            ->type('70180', 'ZipCode')
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
            ->type('Sito9', 'Name')
            ->type('Campagna', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Trevisani', 'Street')
            ->type('6', 'StreetNumber')
            ->type('70825', 'ZipCode')
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
            ->type('Sito79', 'Name')
            ->type('Container', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via De Rossi', 'Street')
            ->type('7', 'StreetNumber')
            ->type('70129', 'ZipCode')
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
            ->type('Sito99', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('NA', 'Province')
            ->type('Napoli', 'City')
            ->type('Corso Benedetto Croce', 'Street')
            ->type('7A', 'StreetNumber')
            ->type('70105', 'ZipCode')
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
            ->seePageIs('/admin/site/showAdd');
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
            ->type('Sito10', 'Name')
            ->type('Silos', 'Description')
            ->type('Italia', 'Country')
            ->type('BA', 'Province')
            ->type('Bari', 'City')
            ->type('Via Giuseppe Di Vagno', 'Street')
            ->type('55', 'StreetNumber')
            ->type('70128', 'ZipCode')
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
            ->type('GFG-159', 'Model')
            ->type('42.666678', 'Latitude')
            ->type('54.554576', 'Longitude')
            ->type('105', 'MaxValue')
            ->type('26', 'MinValue')
            ->press('insert_sensor')
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
            ->type('POG-888', 'Model')
            ->type('45.669678', 'Latitude')
            ->type('12.551276', 'Longitude')
            ->type('196', 'MaxValue')
            ->type('46', 'MinValue')
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
            ->type('UIP-123', 'Model')
            ->type('42.156678', 'Latitude')
            ->type('2.514776', 'Longitude')
            ->type('59', 'MaxValue')
            ->type('6', 'MinValue')
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
            ->type('TYR-258', 'Model')
            ->type('20.147852', 'Latitude')
            ->type('96.456321', 'Longitude')
            ->type('-27', 'MaxValue')
            ->type('27', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
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
            ->type('LOP-568', 'Model')
            ->type('8.4569852', 'Latitude')
            ->type('56.3698521', 'Longitude')
            ->type('147', 'MaxValue')
            ->type('96', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore minimo corretto
     * Classe di Equivalenza: CE36
     */
    public function testAdminAddSensorMinValid1()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->visit('/admin/sensor/showAdd')
            ->type('ASD-741', 'Model')
            ->type('52.856987', 'Latitude')
            ->type('4.557476', 'Longitude')
            ->type('44', 'MaxValue')
            ->type('-8', 'MinValue')
            ->press('insert_sensor')
            ->seePageIs('/admin/sensors');
    }

    /**
     * Test Black Box: aggiunta sensore con il valore minimo con formato errato
     * Classe di Equivalenza: CE37
     */
    public function testAdminAddSensorMinValWrong1()
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

    //-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    /**
     * Test White Box: aggiunta utente da parte del superadmin (deve riuscire)
     */
    public function testAdminAddUser()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->seeInElement("span", "Utenti");
    }

    /**
     * Test White Box: aggiunta cliente da parte del superadmin (deve riuscire)
     */
    public function testAdminAddClient()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->seeInElement("span", "Clienti");
    }

    /**
     * Test White Box: aggiunta sito da parte del superadmin (deve riuscire)
     */
    public function testAdminAddSite()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->seeInElement("span", "Siti");
    }

    /**
     * Test White Box: aggiunta sensore da parte del superadmin (deve riuscire)
     */
    public function testAdminAddSensor()
    {
        $this->visit('/login')->type('francesco', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->seeInElement("span", "Sensori");
    }

    /**
     * Test White Box: aggiunta utente da parte del responsabile aziendale (deve fallire)
     */
    public function testManagerAddUser()
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->dontSeeInElement("span", "Utenti");
    }

    /**
     * Test White Box: aggiunta cliente da parte del responsabile aziendale (deve fallire)
     */
    public function testManagerAddClient()
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');

        $this->dontSeeInElement("span", "Clienti");
    }

    /**
     * Test White Box: aggiunta sito da parte del responsabile aziendale (deve riuscire)
     */
    public function testManagerAddSite()
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->visit('/sites')->seeInElement('a', 'Aggiungi Sito');
    }

    /**
     * Test White Box: aggiunta sensore da parte del responsabile aziendale (deve riuscire)
     */
    public function testManagerAddSensor()
    {
        $this->visit('/login')->type('roberta', 'username')->type('a', 'password')->press('Login')->See('Benvenuto');
        $this->visit('/site/1/sensors')->seeInElement('a', 'Aggiungi sensore');
    }
}
