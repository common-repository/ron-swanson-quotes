<?php

/*
Plugin Name: Ron Swanson Quotes
Description: As developers, we need regular doses of humour while we manage client WordPress sites. May Ron Swanson Quotes plugin give you some of that today. Source API created by jamesseanwright.
Version: 1.0.1
Author: Maplespace Inc.
Author URI: https://choosemaple.space
License: GPLv2 or later
Text Domain: ron-swanson-quotes
*/

// Source API: https://github.com/jamesseanwright/ron-swanson-quotes

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

Copyright 2019 Maplespace, Inc., DBA Like Button Software
*/

function lbs_rsq_admin_notice__success() {
    $quote = lbs_rsq_getQuote('https://ron-swanson-quotes.herokuapp.com/v2/quotes');
    ?>
    <div class="notice notice-success" style="display:flex;align-items:center;">
        <img src="<?php echo plugins_url( 'images/ron-headshot.jpg', __FILE__ ); ?>" height="25px" width="25px" style="display:inline-block;padding-right:10px;">
        <p style="display:inline-block;"><?php echo $quote ?> -Ron Swanson</p>
    </div>
    <?php
}
add_action( 'admin_notices', 'lbs_rsq_admin_notice__success' );


function lbs_rsq_getQuote($url) {
    $response = wp_remote_get( $url );
    $body = wp_remote_retrieve_body( $response );
    $body = substr($body, 1, -1);
    return $body;
}
