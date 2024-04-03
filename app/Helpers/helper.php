<?php 

use App\Models\Blog;
use App\Models\Profile;
use App\Models\Social;

function getBlogs(){
   return Blog::orderBy('title','ASC')
    ->where('status',1)
    ->get();

}

function getProfiles(){
    return Profile::orderBy('fullname','ASC')
     ->get();
 
 }
 function getSocials(){
    return Social::orderBy('id','ASC')
     ->get();
 
 }

?>