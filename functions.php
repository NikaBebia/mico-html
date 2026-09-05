<?php

// 1. დინამიური ნავიგაციის მენიუს გენერირება

function create_nav_menu(array $categories): void{
    foreach ($categories as $category){
        echo '<li class="nav-item">';
        echo '  <a class="nav-link" href="' . $category['link'] . '">' . $category['title'] . '</a>';
        echo '</li>';
    }
}

// 2. hospital treatments სექციის გადინამიურება
function hospital_treatments(array $treatments): void {
    foreach ($treatments as $treatment) {
        echo '<div class="col-md-6 col-lg-3">';
        echo '  <div class="box">';
        echo '    <div class="img-box">';
        echo '      <img src="' . $treatment['image'] . '" alt="' . $treatment['title'] . '">';
        echo '    </div>';
        echo '    <div class="detail-box">';
        echo '      <h4>' . $treatment['title'] . '</h4>';
        echo '      <p>' . $treatment['text'] . '</p>';
        echo '      <a href="#">Read More</a>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
}

// 3. our doctors სექციის გადინამიურება
function our_doctors(array $doctors): void {
    foreach ($doctors as $doctor) {
        echo '<div class="item">';
        echo '  <div class="box">';
        echo '    <div class="img-box">';
        echo '      <img src="' . $doctor['image'] . '" alt="' . $doctor['name'] . '">';
        echo '    </div>';
        echo '    <div class="detail-box">';
        echo '      <h5>' . $doctor['name'] . '</h5>';
        echo '      <h6 class="doctor_qualification">' . $doctor['degree'] . '</h6>';
        echo '      <div class="social_box">';
        echo '        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
        echo '        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
        echo '        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>';
        echo '        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>';
        echo '      </div>';
        echo '    </div>';
        echo '  </div>';
        echo '</div>';
    }
}

// 4. testimonial სექციის გადინამიურება
function testimonials(array $testimonials): void {
    foreach ($testimonials as $key => $testimonial) {
        $activeClass = ($key === 0) ? ' active' : '';

        echo '<div class="carousel-item' . $activeClass . '">';
        echo '  <div class="box">';
        echo '    <div class="client_info">';
        echo '      <div class="client_name">';
        echo '        <h5>' . $testimonial['name'] . '</h5>';
        echo '        <h6>' . $testimonial['role'] . '</h6>';
        echo '      </div>';
        echo '      <i class="fa fa-quote-left" aria-hidden="true"></i>';
        echo '    </div>';
        echo '    <p>' . $testimonial['text'] . '</p>';
        echo '  </div>';
        echo '</div>';
    }
}