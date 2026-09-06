<?php
require_once 'data.php';

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

// 5. footer-ის გადინამიურება
function dinamic_footer(array $footer): void {
    echo '<section class="info_section">';
    echo '  <div class="container">';
    echo '      <div class="info_top">';
    echo '          <div class="info_logo">';
    echo '              <a href="index.php">';
    echo '                  <img src="images/logo.png" alt="">';
    echo '              </a>';
    echo '          </div>';
    echo '          <div class="info_form">';
    echo '              <form action="">';
    echo '                  <input type="email" placeholder="Your email">';
    echo '                  <button> Subscribe </button>';
    echo '              </form>';
    echo '          </div>';
    echo '      </div>';
    echo '      <div class="info_bottom layout_padding2">';
    echo '          <div class="row info_main_row">';

    echo '              <div class="col-md-6 col-lg-3">';
    echo '                  <h5>Address</h5>';
    echo '              <div class="info_contact">';
    echo '                  <a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i><span>' . $footer['contact']['location'] . '</span></a>';
    echo '                  <a href="tel:' . $footer['contact']['phone'] . '"><i class="fa fa-phone" aria-hidden="true"></i><span>Call ' . $footer['contact']['phone'] . '</span></a>';
    echo '                  <a href="mailto:' . $footer['contact']['email'] . '"><i class="fa fa-envelope" aria-hidden="true"></i><span>' . $footer['contact']['email'] . '</span></a>';
    echo '              </div>';
    echo '              <div class="social_box">';
    foreach ($footer['contact']['socials'] as $icon => $link) {
        echo '              <a href="' . $link . '" target=_blank><i class="fa fa-' . $icon . '" aria-hidden="true"></i></a>';
    }
    echo '              </div>';
    echo '          </div>';

    echo '          <div class="col-md-6 col-lg-3">';
    echo '              <div class="info_links">';
    echo '                  <h5>Useful Link</h5>';
    echo '                  <div class="info_links_menu">';
    foreach ($footer['links_col'] as $item) {
        echo '                  <a href="' . $item['link'] . '">' . $item['title'] . '</a>';
    }
    echo '                  </div>';
    echo '              </div>';
    echo '          </div>';

    echo '          <div class="col-md-6 col-lg-3">';
    echo '              <div class="info_post">';
    echo '                  <h5> LATEST POSTS </h5>';
    foreach ($footer['posts'] as $post) {
        echo '              <div class="post_box">';
        echo '                  <div class="img-box"><img src="' . $post['img'] . '" alt=""></div>';
        echo '                  <p>' . $post['title'] . '</p>';
        echo '              </div>';
    }
    echo '              </div>';
    echo '          </div>';

    echo '          <div class="col-md-6 col-lg-3">';
    echo '              <div class="info_post">';
    echo '                  <h5> News </h5>';
    foreach ($footer['news'] as $news_item) {
        echo '                      <div class="post_box">';
        echo '                          <div class="img-box"><img src="' . $news_item['img'] . '" alt=""></div>';
        echo '                          <p>' . $news_item['title'] . '</p>';
        echo '                      </div>';
    }
    echo '              </div>';
    echo '          </div>';
    echo '      </div>';
    echo '  </div>';
    echo '</section>';
}

// 6. ჯავშნის ფორმის ფუნქცია
function appointmentSubmit($conn) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_appointment'])) {
        $name = $_POST['patient_name'] ?? '';
        $doctor = $_POST['doctor_name'] ?? '';
        $department = $_POST['department_name'] ?? '';
        $phone = $_POST['phone_number'] ?? '';
        $symptoms = $_POST['symptoms'] ?? '';
        $date = $_POST['appointment_date'] ?? '';

        if (!empty($name) && !empty($phone)) {
            $sql = "INSERT INTO appointments (patient_name, doctor_name, department_name, phone_number, symptoms, appointment_date) 
                    VALUES ('$name', '$doctor', '$department', '$phone', '$symptoms', '$date')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: appointment-success.php");
                exit();
            }
        }
    }
}

// 7. კონტაქტის ფორმის ფუნქცია
function contactSubmit($conn) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_contact'])) {
        $name = $_POST['full_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $message = $_POST['message'] ?? '';

        if (!empty($name) && !empty($email)) {
            $sql = "INSERT INTO contact_messages (full_name, email, phone, message) 
                    VALUES ('$name', '$email', '$phone', '$message')";
            
            if (mysqli_query($conn, $sql)) {
                header("Location: contact-success.php");
                exit();
            }
        }
    }
}


