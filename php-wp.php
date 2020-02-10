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


// Associated Array
$sounds = array(
    "cat" => "meow",
    "dog" => "bark",
    "pig" => "oink" 
)
echo $soudns["cat"] // should return "meow"



// Built-in WP Functions
have_posts(); // Checking if there are posts
the_post(); // Getting the all appropriate data ready 
the_title(); // Getting the Post title of the current page

while(have_posts()) {
    the_post(); ?>
    <h2>
        <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
    <?php the_content(); ?>
<?php }

get_the_title(); // Getting the Post title of the certain page. ex) get_the_title(get_the_ID());
the_content(); // Post body content
the_excerpt(); // So far, it seems like its pretty much same as the_content(); 
the_permalink(); // Link to a certain post
get_header(); // Getting header content from header.php -> avoiding to code header/footer all the time 
get_footer(); // Getting footer content from footer.php
wp_head(); // Need to include inside header.php file
wp_footer(); // Need to include inside footer.php file </body></html> must be included here
add_action("wp_enqueue_scripts", "any file/function name"); // 'wp_enqueue_scripts' tells WP that we want to load JS/CSS file; second parameter will be the function name
add_theme_support("title-tag (ETC...)"); // Setting the title tags on certain pages
site_url("/about-us"); // ex) <?php echo site_url("/about-us") ? > Returning certain page URI
wp_enqueue_style("parameter1", "parameter2", "Dependencies", "Version"); // ex)  wp_enqueue_style("university_main_styles", get_styleheet_uri());
wp_enqueue_script("file-name", get_theme_file_url("/js/scripts-bundled.js"), NULL, "Version", boolean); // Scripting JS file into HTML
get_stylesheet_uri(); // 2nd parameter inside wp_enqueue_style function which calls style.css file
get_theme_file_uri(); // Getting theme file image function -> ex) <?php echo get_theme_file_uri("/images/library-hero.jgp") ? >
get_the_ID(); // Getting the ID of certain page
the_author_posts_link(); // Getting the post author as a link
the_time("m-d-Y"); // https://wordpress.org/support/article/formatting-date-and-time/
get_the_category_list(",") // Getting the category list
paginate_links(); // Gotta echo it first; After setting blog pages at most (@ Settings > Reading) it allows the pagination
is_category(); // Returns true if we are on the category archive screen
single_cat_title(); // Echo single category name
is_author(); // Returns true if we are on the author archive screen
the_author(); // Returns the author name
the_archive_title(); // Returns the archive data accordingly (by Author, date, category); 
the_archive_desciption(); // Returns the archive description written in WP-Admin page
wp_get_post_parent_ID(); // Getting the parent ID of a child page. ex) <?php wp_get_post_parent_ID(get_the_ID())? >
get_pages(); // Returning page info. ex) For below example, it will return something if the page has children page or return nothing if none
<?php 
    $array = get_pages(array(
        "child_of" => get_the_ID();
    ))
?>
wp_list_page(); // Getting the list of all the pages
<?php 
    if ($parent) {
        $findChildrenOf = $parent;
    } else {
        $findChildrenOf = get_the_ID();
    }

    wp_list_pages(array(
        "title_li" => Null,
        "child_of" => $findChildrenOf,
        // Sorting the column orders by the orders defined in the WP admin page.
        "sort_column" => "menu_order"
    ));
?>
register_nav_menu("AnylocationName", "Name that will actually appear on the admin page"); // This function will allow the custom Nav to be appeared and customized in the WP admin page
// Related to the above built in function; the function below must be added instead of static (or hard coded) lists of the options and can be modified from Admin page
wp_nav_menu(array(
    "theme_location" => "CertainLocationName"
));
WP_Query(); // WP Custom Query. Example below
<?php 
    $posts = new WP_Query(array(
        // Returns posts per page
        "posts_per_page" => 2,
        // Returns posts under certain category name
        "category_name" => "awards",
        // Returns posts with certain post type
        "post_type" => "page"
    ));

    while($posts->have_posts()) {
        $posts->have_post(); ?>

        <li><?php the_title(); ?></li>
    <?php }
?>
wp_trim_words(get_the_content(), 18) // Need to echo first: it basically trims certain/returned data into given length of words. In this case, the length is 18 words.
wp_reset_postdata(); // After using custom WP Query and the while loop, its a good habit to end the while loop with this function which reset different WP data and global variables back to the state that it was in when it made its default automatic query based on the current URL
get_post_type(); // Getting the post type. ex) if (get_post_type() == 'post') { Do Something }
register_post_type("post_type_name", array( // Built-in WP function which registers new Post type in Admin page. Must be coded inside functions.php file
    "public" => true,
    // Setting the name of the Post type to "Events"
    "labels" => array(
        "name" => "Events",
        "add_new_item" => "Add New Event",
        "edit_item" => "Edit Event",
        "all_items" => "All Events",
        "singular_name" => "Event"
    ),
    // Chaning the menu icon of the newly added post type in Admin page
    "menu-icon" => "dashicons-calendar-alt"
));



// WP Files
index.php // basic index page 
single.php // for individual post
page.php // for individual page
header.php // header file -> avoiding to code header/footer all the time -> wp_head() should be included in <head> tag
footer.php // footer file
functions.php // file that allows us to actually communicate with WP -> add_action() and other functions should be included in this file
front-page.php // When I change the homepage displays to a static page. @WP-Admin > Settings > Reading 
archive.php // When I want to look for blogs only for certain category, author, date, etc...

// ex) functions.php 
<?php 
function university_files() {
    // Linking style.css file 
    wp_enqueue_style("university_main_styles", get_stylesheet_uri());
}

// Caling university_files() 
add_action("wp_enqueue_scripts", "university_files");

// Setting the title-tags
function university_features() {
    register_nav_menu("AnyName", "Name that will actually appear on the admin page");
    add_theme_support("title-tag");
}

// Naming the title of the website page
add_action("after_setup_theme", "university_features");
?>


// Class: sample Customer Class
class Customer {
    public $id;
    public $name;
    private $email;
    protected $budget;

    // Constructor
    public function __constructor() {
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

// Example: connecting PHP with mySQL
<?php 
    class Database {
        // DB Parameters
        private $host = "localhost";
        private $db_name = "myblog";
        private $username = "root";
        private $password = "123456";
        private $conn;

        // DB Connect
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=" . $this->host . ";dbname= " . $this->db_name,
                $this->username, $this->password);

                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Connection Error: " . $e -> getMessage();
            }

            return $this->conn;
        }
    }
?>

?>