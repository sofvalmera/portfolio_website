<?php 

use App\Models\Blog;
use App\Models\Contact;
use App\Models\Profile;
use App\Models\Member;
use App\Models\Social;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Educ;
use App\Models\Experience;
use App\Models\Testimonial;

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
<<<<<<< HEAD
 function getExperiences(){
=======
 function getExperience(){
>>>>>>> 1c8fc5becd1de79aa92641d21eb77b208990e4d5
    return Experience::orderBy('id','ASC')
    // ->where('id',1)
     ->get();
 
 }
<<<<<<< HEAD
 function getEducations(){
    return Educ::orderBy('id','ASC')
=======
 function getEducation(){
    return Education::orderBy('id','ASC')
>>>>>>> 1c8fc5becd1de79aa92641d21eb77b208990e4d5
    // ->where('id',1)
     ->get();
 
 }
 function getTestimonials(){
    return Testimonial::orderBy('id','ASC')
     ->where('status',1)
     ->get();
 
 }


?>