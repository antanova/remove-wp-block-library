<?php 
/*
Plugin Name: Remove WP Block Library
Description: Dequeues the extra css that is added when the Gutenberg editor is used. That's it.
Author: JCrosse
Author URI: https://antanova.com
*/

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

Copyright J Crosse 2019
*/
namespace Antanova\Wordpress;

class RemoveWPBlockLibrary
{
    public function assignHooks()
    {
        add_action('wp_enqueue_scripts', [$this, 'dequeueStyles'], 99);
    }

    public function dequeueStyles()
    {
        if (!is_admin()) {
            wp_dequeue_style( 'wp-block-library' );
        }
    }
}

// initiate itself
(new RemoveWPBlockLibrary)->assignHooks();