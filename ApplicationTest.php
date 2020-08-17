<?php declare(strict_types=1);

// under construction

namespace App;

include "bootstrap.php";

use App\Classes\Hero;
use App\Classes\UserFactory;
use http\Exception\InvalidArgumentException;

final class ApplicationTest
{
    public function assertInstanceOf($expectedClass, $actualClass)
    {
        if($expectedClass == $actualClass)
            echo "Classes are the same <br>";
        else
            echo "Classes are different <br>";
    }

    public function testCanBeCreatedFromValidApp()
    {
        $this->assertInstanceOf(
            \App\Application::class,
            get_class(\App\Application::getInstance())
        );
    }

    public function expectException($e){
        try{
            \App\Application::getInstance("invalid data");
        }catch (\InvalidArgumentException $ie){
            echo $ie;
        }


    }

    public function testCannotBeCreatedFromInvalidApp()
    {
        $this->expectException(\InvalidArgumentException::class);

        $app = \App\Application::getInstance("invalid data");

        if(!$app){
            throw new InvalidArgumentException(" wrong argument type <br>");
        }
    }



    public function testCanBeUsedToBuildUser()
    {
        $this->assertInstanceOf(
            Hero::class,
            (new Classes\UserFactory)->buildUser(["name" => "hero", "health" => [70, 100], "strength" => [70, 80], "defence" => [45, 55], "speed" => [40, 50], "luck" => [10, 30]])
        );
    }

    public function testCannotBeUsedToBuildUser(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        (new Classes\UserFactory)->buildUser("name");
    }


}

$test = new ApplicationTest();
$test->testCanBeCreatedFromValidApp();
$test->testCannotBeCreatedFromInvalidApp();
$test->testCanBeUsedToBuildUser();