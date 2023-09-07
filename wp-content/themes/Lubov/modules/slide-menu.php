<?php 
function create_slide_menu($menu_name){
$locations = get_nav_menu_locations();

  $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

  $menu_items = wp_get_nav_menu_items($menu->term_id);
  $menu_list = '';
  $count = 0;
  $submenu = false;$cpi=get_the_id();
  foreach( $menu_items as $current ) {
      if($cpi == $current->object_id ){if ( !$current->menu_item_parent ) {$cpi=$current->ID;}else{$cpi=$current->menu_item_parent;}$cpi=$current->ID;break;}
  }
  foreach( $menu_items as $menu_item ) {
    // echo '<pre style="color:white;">'.print_r($menu_item).'</pre>';
      $link = $menu_item->url;
      $title = $menu_item->title;
      $classes = implode(' ', $menu_item->classes);
      $menu_item->ID==$cpi ? $ac2=' current_menu' : $ac2='';
      if ( !$menu_item->menu_item_parent ) {
          $parent_id = $menu_item->ID;
          $parent_title = $menu_item->title;
          $parent_url = $menu_item->url;
          $parent_id==$cpi ? $ac=' current_item' : $ac='';
          if(!empty($menu_items[$count + 1]) && $menu_items[ $count + 1 ]->menu_item_parent == $parent_id ){//Checking has child
              $menu_list .= '<li class="slide-list-item has_child'.$ac.' '.$classes.'"><a href="'.$link.'" class="parent-item'.$ac2.'"  role="button" ><span class="nav-span"></span>'.$title.'</a><button class="to-parent" data-trigger="'. $parent_id .'"><span class="sr-only">to '. $parent_title .'</span><span class="chevron-right"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></span></button>';
          }else{
              $menu_list .= '<li class="slide-list-item no-child '.$ac.'">' ."\n";$menu_list .= '<a href="'.$link.'" class="'.$ac2.'">'.$title.'</a>' ."\n";
          }
            
      }
      if ( $parent_id == $menu_item->menu_item_parent ) {
          if ( !$submenu ) {
              $submenu = true;
              $menu_list .= '<ul class="secondary-menu id-'.$parent_id.'" data-trigger="' . $parent_id . '"><div class="secondary-menu-header d-flex flex-column"><button class="go-back" data-trigger="'. $parent_id .'">Back to menu</button><li class="slide-menu-item current-parent '.$classes.'"><a href="'.$parent_url.'" class="submenu-title">'. $parent_title .'</a><span class="chevron-down"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg></span></li></div>' ."\n";
          }
          $menu_list .= '<li class="child-item slide-list-item '.$classes.'">' ."\n";
          $menu_list .= '<a href="'.$link.'" class="'.$ac2.'">'.$title.'</a>' ."\n";
          $menu_list .= '</li>' ."\n";
          if(empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id && $submenu){
              $menu_list .= '</ul>' ."\n";
              $submenu = false;
          }
      }
      if (empty($menu_items[$count + 1]) || $menu_items[ $count + 1 ]->menu_item_parent != $parent_id ) { 
          $menu_list .= '</li>' ."\n";      
          $submenu = false;
      }
      $count++;
  }

  echo $menu_list;
}