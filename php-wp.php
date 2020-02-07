<!-- PHP-WP notes -->
<?php

// Setting constants
$val = "variable";
    

// Array
$array = array(1, 2, 3, 4);


// Count(); .length
count($array); // should return 4;


// Function with foreach loop
function greet() {
    foreach ($array as $value) {
        echo $value;
    }
}


// Built-in WP Functions
have_posts(); // Checking if there are posts
the_post(); 
the_title(); // Post title
the_content(); // Post body content
the_permalink(); // Link to a certain post
get_header(); // Getting header content from header.php -> avoiding to code header/footer all the time 
get_footer(); // Getting footer content from footer.php
wp_head(); // Need to include inside header.php file
wp_footer(); // Need to include inside footer.php file </body></html> must be included here
add_action("wp_enqueue_scripts", "any file/function name"); // 'wp_enqueue_scripts' tells WP that we want to load JS/CSS file; second parameter will be the function name
wp_enqueue_style("parameter1", "parameter2"); // ex)  wp_enqueue_style("university_main_styles", get_styleheet_uri());
get_stylesheet_uri(); // 2nd parameter inside wp_enqueue_style function which calls style.css file
wp_enqueue_script();

while(have_posts()) {
the_post(); ?>
<h2>
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?>
    </a>
</h2>
<?php the_content(); ?>
<?php }


// WP Files
index.php // basic index page 
single.php // for individual post
page.php // for individual page
header.php // header file -> avoiding to code header/footer all the time -> wp_head() should be included in <head> tag
footer.php // footer file
functions.php // file that allows us to actually communicate with WP -> add_action() and other functions should be included in this file

// ex) functions.php 
<?php 
function university_files() {
    // Linking style.css file 
    wp_enqueue_style("university_main_styles", get_stylesheet_uri());
}

// Caling university_files() 
add_action("wp_enqueue_scripts", "university_files");
?>


// Class: sample Customer Class
class Customer {
public $id;
public $name;
private $email;
protected $budget;

// Constructor
__constructor() {
$this->id = $id;
}

// Sample Function
public function getCustomerId($id) {
$this-> id = $id;

// Could also return id from the actual DB
}
}

$customer = new Customer;

// Class Inheritance
class Buyer extends Customer {
// Codes
}

?>