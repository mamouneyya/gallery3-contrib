<?php defined("SYSPATH") or die("No direct script access.");
/**
 * Gallery - a web based photo album viewer and editor
 * Copyright (C) 2000-2009 Bharat Mediratta
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or (at
 * your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street - Fifth Floor, Boston, MA  02110-1301, USA.
 */
class TagsMap_Controller extends Controller {
  public function googlemap() {
    // Display all tags with GPS coordinates on a google map.
    
    // Set up and display the actual page.
    $template = new Theme_View("page.html", "Contact");
    $template->content = new View("tagsmap_googlemap.html");

    // Generate a list of GPS coordinates.
    $tagsGPS = ORM::factory("tags_gps")->find_all();
    $template->content->tags_gps = $tagsGPS;
    
    // Load in module preferences.
    $template->content->google_map_key = module::get_var("tagsmap", "googlemap_api_key");
    $template->content->google_map_latitude = module::get_var("tagsmap", "googlemap_latitude");
    $template->content->google_map_longitude = module::get_var("tagsmap", "googlemap_longitude");
    $template->content->google_map_zoom = module::get_var("tagsmap", "googlemap_zoom");
    $template->content->google_map_type = module::get_var("tagsmap", "googlemap_type");
    
    print $template;
  }
}