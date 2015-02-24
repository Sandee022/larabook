<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook user.');
$I->wantTo('follow other Larabook users.');

$I->haveAnAccount(['username' => 'Otheruser']);
$I->signIn();

$I->click('Browse Users');
$I->click('Otheruser');
$I->seeCurrentUrlEquals('/@Otheruser');

//When i follow a user...
$I->click('Follow Otheruser');
$I->seeCurrentUrlEquals('/@Otheruser');
$I->see('Unfollow Otheruser');

//When i unfollow that same user...
$I->click('Unfollow Otheruser');
$I->seeCurrentUrlEquals('/@Otheruser');
$I->see('Follow Otheruser');