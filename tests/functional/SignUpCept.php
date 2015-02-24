<?php
$I = new FunctionalTester($scenario);
$I->am('Guest');
$I->wantTo('want to signup in larabook account');

$I->amOnPage('/');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('/register');
$I->fillField('Username:','JohnDoe');
$I->fillField('Email:','john@example.com');
$I->fillField('Password:','demo');
$I->fillField('Password Confirmation:','demo');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to larabook!');
$I->seeRecord('users',[
    'username'=>'JohnDoe',
    'email'=>'john@example.com'
]);

$I->assertTrue(Auth::check());
