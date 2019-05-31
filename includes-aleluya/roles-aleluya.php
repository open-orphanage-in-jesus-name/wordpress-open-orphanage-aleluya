<?php
/* For God so loved the world, that He gave His only begotten Son
 * He gave His only begotten Son, that all who believe in Him should not perish but have everlasting life; */
defined( 'ABSPATH' ) or die( 'Jesus Christ is the Lord . ' );

/**
 * Manage roles for Donor/Supporters, to create users for that specific role
 **/

add_role(
    'donor_aleluya',
    __( 'Donor/Supporter' ),
    array(
        'read'         => true  // true allows this capability
    )
);

