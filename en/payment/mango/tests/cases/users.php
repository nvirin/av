<?php
namespace MangoPay\Tests;
require_once 'base.php';

/**
 * Tests basic CRUD methods for users
 */
class Users extends Base {

   function test_Users_CreateNatural() {
        $john = $this->getJohn();
        $this->assertTrue($john->Id > 0);
        $this->assertIdentical($john->PersonType, \MangoPay\PersonType::Natural);
    }

    function test_Users_CreateLegal() {
        $matrix = $this->getMatrix();
        $this->assertTrue($matrix->Id > 0);
        $this->assertIdentical($matrix->PersonType, \MangoPay\PersonType::Legal);
    }

    function test_Users_CreateLegal_FailsIfRequiredPropsNotProvided() {
        $user = new \MangoPay\UserLegal();
        $this->expectException();
        
        $ret = $this->_api->Users->Create($user);
        
        $this->fail("Creation should fail because required props are not set");
    }

    function test_Users_CreateLegal_PassesIfRequiredPropsProvided() {
        $user = new \MangoPay\UserLegal();
        $user->HeadquartersAddress = new \MangoPay\Address();
        $user->HeadquartersAddress->AddressLine1 = 'AddressLine1';
        $user->HeadquartersAddress->AddressLine2 = 'AddressLine2';
        $user->HeadquartersAddress->City = 'City';
        $user->HeadquartersAddress->Country = 'FR';
        $user->HeadquartersAddress->PostalCode = '11222';
        $user->HeadquartersAddress->Region = 'Region';
        $user->Name = "SomeOtherSampleOrg";
        $user->Email = "mail@test.com";
        $user->LegalPersonType = \MangoPay\LegalPersonType::Business;
        $user->LegalRepresentativeFirstName = "FirstName";
        $user->LegalRepresentativeLastName = "LastName";
        $user->LegalRepresentativeAddress = new \MangoPay\Address();
        $user->LegalRepresentativeAddress->AddressLine1 = 'AddressLine1';
        $user->LegalRepresentativeAddress->AddressLine2 = 'AddressLine2';
        $user->LegalRepresentativeAddress->City = 'City';
        $user->LegalRepresentativeAddress->Country = 'FR';
        $user->LegalRepresentativeAddress->PostalCode = '11222';
        $user->LegalRepresentativeAddress->Region = 'Region';
        $user->LegalRepresentativeBirthday = mktime(0, 0, 0, 12, 21, 1975);
        $user->LegalRepresentativeNationality = "FR";
        $user->LegalRepresentativeCountryOfResidence = "FR";

        $ret = $this->_api->Users->Create($user);

        $this->assertTrue($ret->Id > 0, "Created successfully after required props set");
        $this->assertIdenticalInputProps($user, $ret);
    }

    function test_Users_GetNatural() {
        $john = $this->getJohn();

        $user1 = $this->_api->Users->Get($john->Id);
        $user2 = $this->_api->Users->GetNatural($john->Id);

        $this->assertIdentical($user1, $john);
        $this->assertIdentical($user2, $john);
        $this->assertIdenticalInputProps($user1, $john);
    }

    function test_Users_GetNatural_FailsForLegalUser() {
        $matrix = $this->getMatrix();
        $this->expectException();
        
        $user = $this->_api->Users->GetNatural($matrix->Id);
        
        $this->fail("GetNatural should fail when called with legal user id");
    }

    function test_Users_GetLegal_FailsForNaturalUser() {
        $john = $this->getJohn();
        $this->expectException();
        
        $user = $this->_api->Users->GetLegal($john->Id);
        
        $this->fail("GetLegal should fail when called with natural user id");
    }

    function test_Users_GetLegal() {
        $matrix = $this->getMatrix();

        $user1 = $this->_api->Users->Get($matrix->Id);
        $user2 = $this->_api->Users->GetLegal($matrix->Id);

        $this->assertIdentical($user1, $matrix);
        $this->assertIdentical($user2, $matrix);
        $this->assertIdenticalInputProps($user1, $matrix);
    }

    function test_Users_Save_Natural() {
        $john = $this->getJohn();
        $john->LastName .= " - CHANGED";
        
        $userSaved = $this->_api->Users->Update($john);
        $userFetched = $this->_api->Users->Get($john->Id);
        
        $this->assertIdenticalInputProps($userSaved, $john);
        $this->assertIdenticalInputProps($userFetched, $john);
    }
    
    function test_Users_Save_NaturalAndClearAddresIfNeeded() {
        $user = new \MangoPay\UserNatural();
        $user->FirstName = "John";
        $user->LastName = "Doe";
        $user->Email = "john.doe@sample.org";
        $user->Birthday = mktime(0, 0, 0, 12, 21, 1975);
        $user->Nationality = "FR";
        $user->CountryOfResidence = "FR";
        $newUser = $this->_api->Users->Create($user);

        $userSaved = $this->_api->Users->Update($newUser);
        
        $this->assertTrue($userSaved->Id > 0);
    }

    function test_Users_Save_Legal() {
        $matrix = $this->getMatrix();
        $matrix->LegalRepresentativeLastName .= " - CHANGED";
        
        $userSaved = $this->_api->Users->Update($matrix);
        $userFetched = $this->_api->Users->Get($matrix->Id);
        
        $this->assertIdenticalInputProps($userSaved, $matrix);
        $this->assertIdenticalInputProps($userFetched, $matrix);
    }
    
    function test_Users_Save_LegalAndClearAddresIfNeeded() {
        $user = new \MangoPay\UserLegal();
        $user->Name = "MartixSampleOrg";
        $user->Email = "mail@test.com";
        $user->LegalPersonType = \MangoPay\LegalPersonType::Business;
        $user->LegalRepresentativeFirstName = "FirstName";
        $user->LegalRepresentativeLastName = "LastName";
        $user->LegalRepresentativeBirthday = mktime(0, 0, 0, 12, 21, 1975);
        $user->LegalRepresentativeNationality = "FR";
        $user->LegalRepresentativeCountryOfResidence = "FR";
        $newUser = $this->_api->Users->Create($user);
        
        $userSaved = $this->_api->Users->Update($newUser);
        
        $this->assertTrue($userSaved->Id > 0);
    }
    
    function test_Users_CreateBankAccount_IBAN() {
        $john = $this->getJohn();
        $account = $this->getJohnsAccount();
        
        $this->assertTrue($account->Id > 0);
        $this->assertIdentical($account->UserId, $john->Id);
    }

    function test_Users_CreateBankAccount_GB() {
        $john = $this->getJohn();
        $account = new \MangoPay\BankAccount();
        $account->OwnerName = $john->FirstName . ' ' . $john->LastName;
        $account->OwnerAddress = $john->Address;
        $account->Details = new \MangoPay\BankAccountDetailsGB();
        $account->Details->AccountNumber = '63956474';
        $account->Details->SortCode = '200000';
        
        $createAccount = $this->_api->Users->CreateBankAccount($john->Id, $account);
        
        $this->assertTrue($createAccount->Id > 0);
        $this->assertIdentical($createAccount->UserId, $john->Id);
        $this->assertIdentical($createAccount->Type, 'GB');
        $this->assertIdentical($createAccount->Details->AccountNumber, '63956474');
        $this->assertIdentical($createAccount->Details->SortCode, '200000');
    }
    
    function test_Users_CreateBankAccount_US() {
        $john = $this->getJohn();
        $account = new \MangoPay\BankAccount();
        $account->OwnerName = $john->FirstName . ' ' . $john->LastName;
        $account->OwnerAddress = $john->Address;
        $account->Details = new \MangoPay\BankAccountDetailsUS();
        $account->Details->AccountNumber = '234234234234';
        $account->Details->ABA = '234334789';
        
        $createAccount = $this->_api->Users->CreateBankAccount($john->Id, $account);
        
        $this->assertTrue($createAccount->Id > 0);
        $this->assertIdentical($createAccount->UserId, $john->Id);
        $this->assertIdentical($createAccount->Type, 'US');
        $this->assertIdentical($createAccount->Details->AccountNumber, '234234234234');
        $this->assertIdentical($createAccount->Details->ABA, '234334789');
    }
    
    function test_Users_CreateBankAccount_CA() {
        $john = $this->getJohn();
        $account = new \MangoPay\BankAccount();
        $account->OwnerName = $john->FirstName . ' ' . $john->LastName;
        $account->OwnerAddress = $john->Address;
        $account->Details = new \MangoPay\BankAccountDetailsCA();
        $account->Details->BankName = 'TestBankName';
        $account->Details->BranchCode = '12345';
        $account->Details->AccountNumber = '234234234234';
        $account->Details->InstitutionNumber = '123';
        
        $createAccount = $this->_api->Users->CreateBankAccount($john->Id, $account);
        
        $this->assertTrue($createAccount->Id > 0);
        $this->assertIdentical($createAccount->UserId, $john->Id);
        $this->assertIdentical($createAccount->Type, 'CA');
        $this->assertIdentical($createAccount->Details->AccountNumber, '234234234234');
        $this->assertIdentical($createAccount->Details->BankName, 'TestBankName');
        $this->assertIdentical($createAccount->Details->BranchCode, '12345');
        $this->assertIdentical($createAccount->Details->InstitutionNumber, '123');
    }
    
    function test_Users_CreateBankAccount_OTHER() {
        $john = $this->getJohn();
        $account = new \MangoPay\BankAccount();
        $account->OwnerName = $john->FirstName . ' ' . $john->LastName;
        $account->OwnerAddress = $john->Address;
        $account->Details = new \MangoPay\BankAccountDetailsOTHER();
        $account->Details->Type = 'OTHER';
        $account->Details->Country = 'FR';
        $account->Details->AccountNumber = '234234234234';
        $account->Details->BIC = 'BINAADADXXX';
        
        $createAccount = $this->_api->Users->CreateBankAccount($john->Id, $account);
        
        $this->assertTrue($createAccount->Id > 0);
        $this->assertIdentical($createAccount->UserId, $john->Id);
        $this->assertIdentical($createAccount->Type, 'OTHER');
        $this->assertIdentical($createAccount->Details->Type, 'OTHER');
        $this->assertIdentical($createAccount->Details->Country, 'FR');
        $this->assertIdentical($createAccount->Details->AccountNumber, '234234234234');
        $this->assertIdentical($createAccount->Details->BIC, 'BINAADADXXX');
    }
    
    function test_Users_BankAccount() {
        $john = $this->getJohn();
        $account = $this->getJohnsAccount();
        
        $accountFetched = $this->_api->Users->GetBankAccount($john->Id, $account->Id);
        $this->assertIdenticalInputProps($account, $accountFetched);
    }
    
    function test_Users_BankAccounts() {
        $john = $this->getJohn();
        $account = $this->getJohnsAccount();
        $pagination = new \MangoPay\Pagination(1, 12);
        
        $list = $this->_api->Users->GetBankAccounts($john->Id, $pagination);
        
        $this->assertIsA($list[0], '\MangoPay\BankAccount');
        $this->assertIdentical($account->Id, $list[0]->Id);
        $this->assertIdenticalInputProps($account, $list[0]);
        $this->assertIdentical($pagination->Page, 1);
        $this->assertIdentical($pagination->ItemsPerPage, 12);
        $this->assertTrue(isset($pagination->TotalPages));
        $this->assertTrue(isset($pagination->TotalItems));
    }
    
    function test_Users_BankAccounts_SortByCreationDate() {
        $john = $this->getJohn();
        $this->getJohnsAccount();
        self::$JohnsAccount = null;
        $this->getJohnsAccount();
        $pagination = new \MangoPay\Pagination(1, 12);
        $sorting = new \MangoPay\Sorting();
        $sorting->AddField("CreationDate", \MangoPay\SortDirection::DESC);
        
        $list = $this->_api->Users->GetBankAccounts($john->Id, $pagination, $sorting);
        
        $this->assertTrue($list[0]->CreationDate > $list[1]->CreationDate);
    }
    
    function test_Users_UpdateBankAccount(){
        $john = $this->getJohn();
        $account = $this->getJohnsAccount();
        $account->Active = false;
        
        $accountResult = $this->_api->Users->UpdateBankAccount($john->Id, $account);
        
        $this->assertIdentical($account->Id, $accountResult->Id);
        $this->assertFalse($accountResult->Active);
    }
    
    function test_Users_CreateKycDocument(){
        $kycDocument = $this->getJohnsKycDocument();

        $user = $this->getJohn();
        $this->assertTrue($kycDocument->Id > 0);
        $this->assertIdentical($kycDocument->Status, \MangoPay\KycDocumentStatus::Created);
        $this->assertIdentical($kycDocument->Type, \MangoPay\KycDocumentType::IdentityProof);
        $this->assertIdentical($kycDocument->UserId, $user->Id);
    }
    
    function test_Users_GetKycDocument(){
        $kycDocument = $this->getJohnsKycDocument();
        $user = $this->getJohn();
        
        $getKycDocument = $this->_api->Users->GetKycDocument($user->Id, $kycDocument->Id);
        
        $this->assertIdentical($kycDocument->Id, $getKycDocument->Id);
        $this->assertIdentical($kycDocument->Status, $getKycDocument->Status);
        $this->assertIdentical($kycDocument->Type, $getKycDocument->Type);
        $this->assertIdentical($kycDocument->UserId, $user->Id);
    }
    
    function test_Users_GetKycDocuments(){
        $kycDocument = $this->getJohnsKycDocument();
        $user = $this->getJohn();
        $pagination = new \MangoPay\Pagination(1, 20);
        
        $getKycDocuments = $this->_api->Users->GetKycDocuments($user->Id, $pagination);
        
        $this->assertIsA($getKycDocuments[0], '\MangoPay\KycDocument');
        $kycFromList = $this->getEntityFromList($kycDocument->Id, $getKycDocuments);
        $this->assertIdentical($kycDocument->Id, $kycFromList->Id);
        $this->assertIdenticalInputProps($kycDocument, $kycFromList);
        $this->assertIdentical($pagination->Page, 1);
        $this->assertIdentical($pagination->ItemsPerPage, 20);
        $this->assertTrue(isset($pagination->TotalPages));
        $this->assertTrue(isset($pagination->TotalItems));
    }
    
    function test_Users_GetKycDocuments_SortByCreationDate(){
        $this->getJohnsKycDocument();
        self::$JohnsKycDocument = null;
        $this->getJohnsKycDocument();
        $user = $this->getJohn();
        $pagination = new \MangoPay\Pagination(1, 20);
        $sorting = new \MangoPay\Sorting();
        $sorting->AddField("CreationDate", \MangoPay\SortDirection::DESC);
        
        $getKycDocuments = $this->_api->Users->GetKycDocuments($user->Id, $pagination, $sorting);
        
        $this->assertTrue($getKycDocuments[0]->CreationDate > $getKycDocuments[1]->CreationDate);
    }
    
    function test_Users_CreateKycDocument_TestAll(){
        $john = $this->getJohn();
        $legalJohn = $this->getMatrix();
        
        $aKycDocTypes = array(
            array(\MangoPay\KycDocumentType::AddressProof, $john->Id),
            array(\MangoPay\KycDocumentType::ArticlesOfAssociation, $legalJohn->Id),
            array(\MangoPay\KycDocumentType::IdentityProof, $john->Id),
            array(\MangoPay\KycDocumentType::RegistrationProof, $legalJohn->Id),
            array(\MangoPay\KycDocumentType::ShareholderDeclaration, $legalJohn->Id)
        );
        
        foreach ($aKycDocTypes as $kycDoc) {
            try{
                $this->CreateKycDocument_TestOne($kycDoc[0], $kycDoc[1]);
            } catch (\MangoPay\Libraries\Exception $exc){
                
                $message = 'Error (Code: ' . $exc->getCode() . ', '
                    . $exc->getMessage() . ') '
                    .'during create/get KYC Document with type: ' . $kycDoc[0];
                $this->fail($message);
                
            }
        }
    }
    
    function CreateKycDocument_TestOne($kycDocType, $userId){
        
        $kycDocument = new \MangoPay\KycDocument();
        $kycDocument->Status = \MangoPay\KycDocumentStatus::Created;
        $kycDocument->Type = $kycDocType;
        
        $createdKycDocument = $this->_api->Users->CreateKycDocument($userId, $kycDocument);
        $getKycDocument = $this->_api->Users->GetKycDocument($userId, $createdKycDocument->Id);
        
        $this->assertTrue($createdKycDocument->Id > 0);
        $this->assertIdentical($createdKycDocument->Status, \MangoPay\KycDocumentStatus::Created);
        $this->assertIdentical($createdKycDocument->Type, $kycDocType);
        $this->assertIdentical($createdKycDocument->Id, $getKycDocument->Id);
        $this->assertIdentical($createdKycDocument->Status, $getKycDocument->Status);
        $this->assertIdentical($createdKycDocument->Type, $getKycDocument->Type);
    }
    
    function test_Users_UpdateKycDocument(){
        $kycDocument = $this->getJohnsKycDocument();
        $user = $this->getJohn();
        $kycDocument->Status = \MangoPay\KycDocumentStatus::ValidationAsked;
        
        $updateKycDocument = $this->_api->Users->UpdateKycDocument($user->Id, $kycDocument);
        
        $this->assertIdentical($updateKycDocument->Status, \MangoPay\KycDocumentStatus::ValidationAsked);
    }
    
    function test_Users_CreateKycPage_EmptyFileString(){
        $kycDocument = $this->getJohnsKycDocument();
        $user = $this->getJohn();
        $kycPage = new \MangoPay\KycPage();
        $kycPage->File = "";
        try{
            $this->_api->Users->CreateKycPage($user->Id, $kycDocument->Id, $kycPage);
            
            $this->fail('Expected ResponseException when empty file string');
        } catch (\MangoPay\Libraries\ResponseException $exc) {

            $this->assertIdentical($exc->getCode(), 400);            
        }
    }
    
    function test_Users_CreateKycPage_WrongFileString(){
        $kycDocument = $this->getJohnsKycDocument();
        $user = $this->getJohn();
        $kycPage = new \MangoPay\KycPage();
        $kycPage->File = "qqqq";
        
        try{
            $this->_api->Users->CreateKycPage($user->Id, $kycDocument->Id, $kycPage);
            
            $this->fail('Expected ResponseException when wrong value for file string');
        } catch (\MangoPay\Libraries\ResponseException $exc) {
            
            $this->assertIdentical($exc->getCode(), 400);            
        }
    }
    
    function test_Users_CreateKycPage_CorrectFileString() {
        $user = $this->getJohn();
        $kycDocumentInit = new \MangoPay\KycDocument();
        $kycDocumentInit->Status = \MangoPay\KycDocumentStatus::Created;
        $kycDocumentInit->Type = \MangoPay\KycDocumentType::IdentityProof;
        $kycDocument = $this->_api->Users->CreateKycDocument($user->Id, $kycDocumentInit);
        $kycPage = new \MangoPay\KycPage();
        		$fileString = "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
/wIMAPlarS0ONmynAAAAAElFTkSuQmCC";
        $kycPage->File = $fileString;
        
        $this->_api->Users->CreateKycPage($user->Id, $kycDocument->Id, $kycPage);
    }
    
    function test_Users_CreateKycPage_EmptyFilePath() {
        $user = $this->getJohn();
        $kycDocumentInit = new \MangoPay\KycDocument();
        $kycDocumentInit->Status = \MangoPay\KycDocumentStatus::Created;
        $kycDocumentInit->Type = \MangoPay\KycDocumentType::IdentityProof;
        $kycDocument = $this->_api->Users->CreateKycDocument($user->Id, $kycDocumentInit);
        
        try{
            $this->_api->Users->CreateKycPageFromFile($user->Id, $kycDocument->Id, '');
        } catch (\MangoPay\Libraries\Exception $exc) {
            
            $this->assertIdentical($exc->getMessage(), 'Path of file cannot be empty');
        }
    }
        
    function test_Users_CreateKycPage_WrongFilePath() {
        $user = $this->getJohn();
        $kycDocumentInit = new \MangoPay\KycDocument();
        $kycDocumentInit->Status = \MangoPay\KycDocumentStatus::Created;
        $kycDocumentInit->Type = \MangoPay\KycDocumentType::IdentityProof;
        $kycDocument = $this->_api->Users->CreateKycDocument($user->Id, $kycDocumentInit);
        
        try{
            $this->_api->Users->CreateKycPageFromFile($user->Id, $kycDocument->Id, 'notExistFileName.tmp');
        } catch (\MangoPay\Libraries\Exception $exc) {
            
            $this->assertIdentical($exc->getMessage(), 'File not exist');
        }
    }
    
    function test_Users_CreateKycPage_CorrectFilePath() {
        $user = $this->getJohn();
        $kycDocumentInit = new \MangoPay\KycDocument();
        $kycDocumentInit->Status = \MangoPay\KycDocumentStatus::Created;
        $kycDocumentInit->Type = \MangoPay\KycDocumentType::IdentityProof;
        $kycDocument = $this->_api->Users->CreateKycDocument($user->Id, $kycDocumentInit);
        
        $this->_api->Users->CreateKycPageFromFile($user->Id, $kycDocument->Id, __DIR__ ."/../TestKycPageFile.png");
    }
    
    function test_Users_AllTransactions() {
        $john = $this->getJohn();
        $payIn = $this->getNewPayInCardDirect();

        $pagination = new \MangoPay\Pagination(1, 1);
        $filter = new \MangoPay\FilterTransactions();
        $filter->Type = 'PAYIN';
        $filter->AfterDate = $payIn->CreationDate - 1;
        $filter->BeforeDate = $payIn->CreationDate + 1;
        $transactions = $this->_api->Users->GetTransactions($john->Id, $pagination, $filter);

        $this->assertEqual(count($transactions), 1);
        $this->assertIsA($transactions[0], '\MangoPay\Transaction');
        $this->assertEqual($transactions[0]->AuthorId, $john->Id);
        $this->assertIdenticalInputProps($transactions[0], $payIn);
    }
    
    function test_Users_AllTransactions_SortByCreationDate() {
        $john = $this->getJohn();
        $this->getNewPayInCardDirect();
        $this->getNewPayInCardDirect();
        $sorting = new \MangoPay\Sorting();
        $sorting->AddField("CreationDate", \MangoPay\SortDirection::DESC);
        $pagination = new \MangoPay\Pagination(1, 20);
        $filter = new \MangoPay\FilterTransactions();
        $filter->Type = 'PAYIN';
       
        $transactions = $this->_api->Users->GetTransactions($john->Id, $pagination, $filter, $sorting);

        $this->assertTrue($transactions[0]->CreationDate > $transactions[1]->CreationDate);
    }
    
    function test_Users_AllCards() {
        $john = $this->getNewJohn();
        $payIn = $this->getNewPayInCardDirect($john->Id);
        $card =$this->_api->Cards->Get($payIn->PaymentDetails->CardId);
        $pagination = new \MangoPay\Pagination(1, 1);
        
        $cards = $this->_api->Users->GetCards($john->Id, $pagination);

        $this->assertEqual(count($cards), 1);
        $this->assertIsA($cards[0], '\MangoPay\Card');
        $this->assertIdenticalInputProps($cards[0], $card);
    }
    
    function test_Users_AllCards_SortByCreationDate() {
        $john = $this->getNewJohn();
        $this->getNewPayInCardDirect($john->Id);
        $this->getNewPayInCardDirect($john->Id);
        $pagination = new \MangoPay\Pagination(1, 20);
        $sorting = new \MangoPay\Sorting();
        $sorting->AddField("CreationDate", \MangoPay\SortDirection::ASC);
        
        $cards = $this->_api->Users->GetCards($john->Id, $pagination, $sorting);

        $this->assertTrue($cards[0]->CreationDate < $cards[1]->CreationDate);
    }
    
    function test_Users_AllWallets() {
        $john = $this->getJohn();
        $this->getJohnsWallet();
        $pagination = new \MangoPay\Pagination(1, 1);
        
        $wallets = $this->_api->Users->GetWallets($john->Id, $pagination);

        $this->assertEqual(count($wallets), 1);
        $this->assertIsA($wallets[0], '\MangoPay\Wallet');
    }
    
    function test_Users_AllWallets_SortByCreationDate() {
        $john = $this->getJohn();
        $this->getJohnsWallet();
        self::$JohnsWallet = null;
        $this->getJohnsWallet();
        $pagination = new \MangoPay\Pagination(1, 20);
        $sorting = new \MangoPay\Sorting();
        $sorting->AddField("CreationDate", \MangoPay\SortDirection::DESC);
        
        $wallets = $this->_api->Users->GetWallets($john->Id, $pagination, $sorting);

        $this->assertTrue($wallets[0]->CreationDate > $wallets[1]->CreationDate);
    }
	
	function test_Users_AllMandates() {
         $john = $this->getJohn();
        $this->getJohnsMandate();
         $pagination = new \MangoPay\Pagination(1, 1);
         
         $mandates = $this->_api->Users->GetMandates($john->Id, $pagination);
 
         $this->assertEqual(count($mandates), 1);
         $this->assertIsA($mandates[0], '\MangoPay\Mandate');
     }
     
     function test_Users_AllMandatesForBankAccount() {
         $john = $this->getJohn();
         $account = $this->getJohnsAccount();
         $this->getJohnsMandate();
         $pagination = new \MangoPay\Pagination(1, 1);
         
         $mandates = $this->_api->Users->GetMandatesForBankAccount($john->Id, $account->Id, $pagination);
 
         $this->assertEqual(count($mandates), 1);
         $this->assertIsA($mandates[0], '\MangoPay\Mandate');
     }
}
