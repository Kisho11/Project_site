<?php
  $title = "Principal";
?>
@extends('layouts.web.app')

@section('content')
<style>
  .fa-phone-alt, .fa-envelope, .fa-user-graduate
  {
    color: #500d0a !important
  }

  .teacher_del
  {
    text-align: justify;
  }

  @media screen and (max-width:1034px) 
  {
    .innerContent-wrap
    {
      margin-top: 200px !important;
    }
  }

  @media screen and (max-width:768px) 
  {
    .innerContent-wrap
    {
      margin-top: 90px !important;
    }
  }
</style>

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- Teachers Start -->
    <div class="classDetails-wrap">
      <div class="row " style="margin-top: 30px;">
        
        <div class="col-lg-4">
            
          <div class="teacher_left">
            <div class="teacher_delImg"> <img src="web/assets/images/principals/p.png" alt="Image"></div>
          </div>
        
          <ul class="teacher-address " style="margin-top:10px;">
            <li><span><i class="fas fa-user-graduate" aria-hidden="true"></i></span>SLPS Grade 1, BBA, PGDM, MEd</li><i class="fa-regular "></i>
            <li><span><i class="fas fa-phone-alt" aria-hidden="true"></i></span>+94 77 4529 019</li>
            <li><span><i class="fas fa-envelope" aria-hidden="true"></i></span>principal@kmv.lk</li>
          </ul>
        </div>
        <div class="col-lg-8">
          <div class="teacher_del " >
            <h3 style="text-align: left !important;">Mrs. Ilaventhi Nirmalaraj</h3>
                    

            <p>Welcome to Kn/ Kilinochchi Maha Vidyalayam!</p>
            <p>
              I am proud to be the principal of Kn/Kilinochchi Maha Vidyalayam, one of the leading schools in the 
              Kilinochchi District, located in the heart of Kilinochchi city. This school was established in 1927 by Sir 
              Pon. Ramanathan to provide quality education for the children of employees working on the 
              Iranaimadu irrigation tank construction.
            </p>
            <p>
              Our school is progressing at a rapid pace. The structure of the school is multi-phased, and it is an 
              administrative school. The contributions of the principal, vice principals, deputy principals, teachers, 
              non-academic staff, the school development Society, the old students’ association, well-wishers, and 
              many others are essential for the progress of our school.
            </p>
            <p>
              The achievements of our school are continuously increasing, and our school culture plays a major 
              role in fostering disciplined students. The exemplary behavior and contributions of our alumni to 
              society stand as proof of these accomplishments.
            </p>
            <p>
              However, our school still requires more physical infrastructure, teaching equipment, and materials 
              for extracurricular activities to support further development. I kindly request the cooperation and 
              continuous support from our school community to help us achieve our goals. Together, we will work 
              towards the bright future of Kn/Kilinochchi Maha Vidyalayam.

            </p>
            <p>
             Warm regards,
            </p>
            <p>
              Mrs. Ilaventhi Nirmalaraj<br/>
              Principal, Kn/ Kilinochchi Maha Vidyalayam.
            </p>

          </div>
        </div>
      </div>
    </div>
    <!-- Teachers End --> 
    
  </div>
</div>
<!-- Inner Content Start --> 


@endsection