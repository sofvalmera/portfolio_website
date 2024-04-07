<?php 

use App\Models\Blog;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Social;
use App\Models\Portfolio;

function getBlogs(){
   return Blog::orderBy('title','ASC')
    ->where('status',1)
    ->get();

}

function getProfiles(){
    return Profile::orderBy('id','ASC')
    ->where('id',1)
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


?>