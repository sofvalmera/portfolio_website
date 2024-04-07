<?php 

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Social;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;

function getBlogs(){
   return Blog::orderBy('title','ASC')
    ->where('status',1)
    ->get();

}
function getContacts(){
    return Contact::orderBy('id','ASC')
     ->where('status',1)
     ->get();
 
 }

function getProfiles(){
    return Profile::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }
 function getSocials(){
    return Social::orderBy('id','ASC')
    ->where('id',1)
     ->get();
 
 }
 function getMembers(){
    return Member::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }
 function getPortfolios(){
    return Portfolio::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }
 function getServices(){
    return Service::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }
 function getSkills(){
    return Skill::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }


?>