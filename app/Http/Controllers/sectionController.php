<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class sectionController extends Controller
{
    /*
     *      Basic controller
     *
    public function index(){return '<center><h1>The Library</h1></center>';}
    public function createNewSection(){return '<center><h1>Adding New Section To The Library</h1></center>';}
    public function saveNewSection(){$sectionName= Input::get('sectionName'); $sectionDetails= Input::get('sectionDetails');}
    public function showSection($sectionName){return '<center><h1>This Page For '.$sectionName.' Section </h1></center>';}
    public function editSection($sectionName){return '<center><h1>This Page For Editing '.$sectionName.' Section </h1></center>';}
    public function saveEditedSection($sectionName){}
    public function deleteSection($sectionName){}

    */

    public function getIndex(){return '<center><h1>The Library</h1></center>';}
    public function getNewSection(){return '<center><h1>Adding New Section To The Library</h1></center>';}
    public function postNewSection(){$sectionName= Input::get('sectionName'); $sectionDetails= Input::get('sectionDetails');}
    public function getShow($sectionName){return '<center><h1>This Page For '.$sectionName.' Section </h1></center>';}
    public function getEdit($sectionName){return '<center><h1>This Page For Editing '.$sectionName.' Section </h1></center>';}
    public function patchEdit($sectionName){}
    public function deleteDeletedSection($sectionName){}



}
