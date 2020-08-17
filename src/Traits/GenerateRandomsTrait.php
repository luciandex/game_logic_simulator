<?php declare(strict_types=1);

namespace App\Traits;

trait GenerateRandomsTrait
{
    public function generateRandoms($chance)
    {
        ///
        /// under construction
        ///

        $arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
        $arrayPercent10 = [0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0]; // 2x1
        $arrayPercent20 = [0, 0, 0, 1, 0, 0, 1, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0]; // 4x1


        if($chance == 10){
            return $this->combineAndReturn($arr1, $arrayPercent10);
        }elseif ($chance == 20){
            return $this->combineAndReturn($arr1, $arrayPercent20);
        }else{
            return "Nothing to show";
        }
    }

    public function combineAndReturn($arr1, $arr2)
    {
        shuffle($arr2);
        $arr3 = array_combine($arr1, $arr2);
        return $arr3;
    }
}