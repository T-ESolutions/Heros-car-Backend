<?php
/**
 * Created by PhpStorm.
 * User: Al Mohands
 * Date: 12/06/2019
 * Time: 08:32 ص
 */

namespace App\Http\Controllers\Interfaces\V1\User;


interface HelperRepositoryInterface
{
    public function pages($request);
    public function departments();
    public function userTripTerms();
    public function socialMedia();
    public function contactUs($request);
    public function colors();
    public function brands();
    public function modells($request);
}
