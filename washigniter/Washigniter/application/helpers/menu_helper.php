<?php  
function activate_menu($controller) {
     $CI = get_instance();
     $last = $CI->uri->total_segments();
     $seg = $CI->uri->segment($last);
     if(is_numeric($seg)) {
       $seg = $CI->uri->segment($last-1);
     }
     if (in_array($controller, array($seg))) {
         return 'active';
     } else {
        if(in_array($controller, array($CI->uri->segment($last-1)))) {
         return 'active';   
        } else {
            return '';  
        }
     } 
   }
?>