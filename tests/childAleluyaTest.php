<?php // For God so loved the world, that He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life
/**
 * Class ChildAleluyaTest
 *
 * @package Open_Orphanage
 */

/**
 * Tests mostly for Child_aleluya class
 */
class ChildAleluyaTest extends WP_UnitTestCase {

  /**
   * Test if setting a value in the object stores it immediately in the database.
   */
  public function test_child_immediate_persistence_aleluya() {
    // Replace this with some actual testing code.
    $str_aleluya = "Hallelujah - ".rand(0,1<<24);

    //Note, must have title and or content to save with valid id
    $child_id_aleluya = wp_insert_post(array('post_title'=>$str_aleluya, 'post_content'=> $str_aleluya, 'post_type'=>'child_aleluya') );

    $this->assertFalse( is_a( $child_id_aleluya, 'WP_Error') );

    $child_aleluya = new Child_aleluya($child_id_aleluya);

    $child_aleluya->nick_names_aleluya = $str_aleluya;

    $child_2_aleluya = new Child_aleluya($child_id_aleluya);

    $this->assertEquals(  $child_2_aleluya->nick_names_aleluya, $str_aleluya );
  }
}
