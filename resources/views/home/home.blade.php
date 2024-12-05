<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

	<link rel="stylesheet" type="text/css" href= "css/index.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
	
   
 </head>
  <body>
    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif
    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <!-- ............................Navbar start................................ -->
    @include('layouts.header')
      <!--........................Navbar end...............................  -->
   

        <section id="banner">
          <div class=" container">
            <div class="row">
              <div class="col-md-6">
                <h1>Revolutionize how you evaluate your students </h1>
                <p>Exam Craft is a website designed to simplify the educational process.
                  It allows teachers to create exams quickly, and manage their profiles,
                   while students can find tutors, provide feedback, and access personalized learning experiences.</p>
              </div>   
            <img src="images/simplistic-stock-trader-working-on-laptop-with-charts.gif"  class="img-fluid" width="500" >
            </div>
          </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#fff" fill-opacity="1" d="M0,256L26.7,266.7C53.3,277,107,299,160,272C213.3,245,267,171,320,128C373.3,85,427,75,480,112C533.3,149,587,235,640,272C693.3,309,747,299,800,256C853.3,213,907,139,960,106.7C1013.3,75,1067,85,1120,122.7C1173.3,160,1227,224,1280,208C1333.3,192,1387,96,1413,48L1440,0L1440,320L1413.3,320C1386.7,320,1333,320,1280,320C1226.7,320,1173,320,1120,320C1066.7,320,1013,320,960,320C906.7,320,853,320,800,320C746.7,320,693,320,640,320C586.7,320,533,320,480,320C426.7,320,373,320,320,320C266.7,320,213,320,160,320C106.7,320,53,320,27,320L0,320Z"></path>
        </svg>
      </section>
{{-- ................................why exam craft......................................... --}}
     <section id="reason">
      <h5>why examcraft</h5>
      <p> "Create exams in seconds, find the right tutor, and enjoy a better way to learn with Exam Craft."
      </p>
      </section>
      {{-- .............................benefit........................ --}}
      <section id="benifits">
        <div class=" container">
         <div class="row text-center">
         <div class="col-md-4" benifits>
           <img src="images/whyus1.png" class="benifit-img">
           <h5> Secure and Reliable</h5>
           <p>Exam Craft prioritizes the security of your data. 
             From exam papers to user profiles, everything is securely stored and protected.</p>
         </div>
         <div class="col-md-4" benifit>
           <img src="images/whyus2.png" class="benifit-img">
           <h5>Save tour time</h5>
           <p>Exam Craft allows teachers to create exams in just a few clicks. 
             By typing questions once and you can generate papers quickly, saving valuable time for teaching..</p>
         </div>
         <div class="col-md-4" benifit>
           <img src="images/whyus3.png" class="benifit-img">
           <h5> Easy to Use</h5>
           <p>Designed with simplicity in mind, Exam Craft is user-friendly and accessible, ensuring that both teachers
            and students can easily navigate and utilize its features..</p>
         </div>
   </div>
  </div>

</section>
          <!-- --------------------features------------------ -->
               
          <section id="feature">
            <div class="container">
            <h5>Features</h5>
            <div class="title"><p> Contains full essential features to conduct an Exam.</p>
               <div class="row">    
                
                     <!-- <div class="row"> -->
                       <div class="col-md-6 col-lg-4">
                           <div class="box">Generate  paper</div> 
                           </div>
                           <div class="col-md-6 col-lg-4">
                             <div class="box">Finding Tutor</div> 
                             </div>
                             <div class="col-md-6 col-lg-4">
                               <div class="box">Upload CV</div> 
                               </div>
                               <div class="col-md-6 col-lg-4">
                                 <div class="box">Input Question</div> 
                                 </div>
                                 <div class="col-md-6 col-lg-4">
                                   <div class="box">reuse paper</div> 
                                   </div>
                                   <div class="col-md-6 col-lg-4">
                                     <div class="box">Giving Feedback</div> 
                                     </div>
                 </div> 
              </div>
              </div>
              </section>
                <!---------------------------FAQ --------------------------->

    
          <section id="Faq">
            <h5> FAQ</h5>
            <div class="show"><p> Frequently Asked question</p>
              <div class="container">
              <div class="row">   
            <div class="column">
            <div class="accordion" id="accordionExample">

                <!-- Question 1 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" onclick="toggleAccordion('collapseOne')" aria-expanded="true" aria-controls="collapseOne">
                            Who can use Exam Craft?       
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse">
                        <div class="accordion-body">
                            Exam Craft is designed for educational institutions, individual teachers, and students around the world. Its a versatile platform that supports various educational needs.
                        </div>
                    </div>
                </div>

                <!-- Question 2 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button" type="button" onclick="toggleAccordion('collapseTwo')" aria-expanded="true" aria-controls="collapseTwo">
                            What features does Exam Craft offer?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse">
                        <div class="accordion-body">
                            Exam Craft offers automated paper generation, tutor-student matching, and a customizable difficulty rating system for exam questions.
                        </div>
                    </div>
                </div>

                <!-- Question 3 -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button" type="button" onclick="toggleAccordion('collapseThree')" aria-expanded="true" aria-controls="collapseThree">
                          How does the automated paper generation work?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse">
                        <div class="accordion-body">
                          Teachers can input questions once into the system and then generate unique exam papers with a single click. The platform uses a rating system to adjust the difficulty of the questions.
                        </div>
                    </div>
                </div>
                  <!-- Question 4 -->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingfourth">
                        <button class="accordion-button" type="button" onclick="toggleAccordion('collapsefourth')" aria-expanded="true" aria-controls="collapsefourth">
                          Can students find tutors through Exam Craft?               
                                 </button>
                    </h2>
                    <div id="collapsefourth" class="accordion-collapse">
                        <div class="accordion-body">
                          Yes, students can search for tutors based on subject, location, and other criteria. The platform matches students with tutors who best meet their needs, making it easy to find the right educational support.
                        </div>
                    </div>
                </div>
                 <!-- Question 5-->
                 <div class="accordion-item">
                  <h2 class="accordion-header" id="headingfifth">
                      <button class="accordion-button" type="button" onclick="toggleAccordion('collapsefifth')" aria-expanded="true" aria-controls="collapsefifth">
                        How do teachers manage their profiles on Exam Craft?
                      </button>
                  </h2>
                  <div id="collapsefifth" class="accordion-collapse">
                      <div class="accordion-body">
                        Teachers can create and update their profiles, listing their qualifications etc.. They can also offer home tuition, and receive feedback from students.                            </div>
                      </div>
                  </div>
              </div>
                  <!-- Question 6-->
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingsixth">
                        <button class="accordion-button" type="button" onclick="toggleAccordion('collapsesixth')" aria-expanded="true" aria-controls="collapsesixth">
                          Can I customize the exams I create?
                        </button>
                    </h2>
                    <div id="collapsesixth" class="accordion-collapse">
                        <div class="accordion-body">
                          Yes, teachers have full control over the exam creation process. They can select specific questions, adjust difficulty levels, and generate multiple versions of the same exam.                        </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
  </section> 
     
     
     <!-- ...........................Footer section.................. -->
      @include('layouts.footer')
       <script>     
        function toggleAccordion(collapseId) {
            var content = document.getElementById(collapseId);
            content.classList.toggle('show');
        }
    </script>
  </body>
</html>