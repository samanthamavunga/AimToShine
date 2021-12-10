<!--unit testing
require controller-->
<?php
//unit tsting
use PHPUnit\Framework\TestCase;
require_once (dirname(__FILE__)).'/../controllers/user_controller.php';//returns parent directory path of this file

class unit_testing extends TestCase
{

    public function testPostCreate()
    { //register new user
        
      $response = register_new_user("Denzel","Prim", "mentor","DPrim","female", "", "Harare", "0779380450","denzel@gmail.com", "denzel");
      $this->assertTrue($response);


    }



    public function testMentorCanAdd()
    { //register new user
        
      
      $this->assertTrue(TRUE);


    }

    // public function testPostUpdate(){
        
    //     $response = updatePost("5", "updated title", "updated body");
    //     $this->assertTrue($response);
    // }

    // public function testPostDelete(){
        
    //     $response = deletePost("5");
    //     $this->assertTrue($response);
    // }

    // public function testSinglePost(){

    //     $response = getSinglePost("15");
    //     $this->assertArrayHasKey('id', $response);
    // }

    // public function testSinglePostQuery(){

    //     $response = getSinglePost("15");
    //     $this->assertTrue($response);
    // }

    // public function testGetAllPosts(){
    //     $response = getPosts();
    //     $this->assertIsArray($response);
    // }

    public function testIfFileExists(){
      $this->assertFileExists('controllers/user_controller.php');
    }

    public function testIfPostClassExists(){
     $this->assertFileExists('classes/user_class.php');
    }
}
?>