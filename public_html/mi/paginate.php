<?php
function paginate($reload, $page, $tpages)
 {
    $adjacents = 2;
    $prevlabel = "&lsaquo; Prev";
    $nextlabel = "Next &rsaquo;";
    $out = "";	

    // previous
    if ($page == 1) {
        $out.= "<span>" . $prevlabel . "</span>\n";
    } elseif ($page == 2) {
        $out.= "<li><a class='paginate_button previous' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_previous' href=\"" . $reload . "\">" . $prevlabel . "</a>\n</li>";
    } else {
        $out.= "<li><a class='paginate_button previous' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_previous'  href=\"" . $reload . "&amp;page=" . ($page - 1) . "\">" . $prevlabel . "</a>\n</li>";
    }
  
    $pmin = ($page > $adjacents) ? ($page - $adjacents) : 1;
    $pmax = ($page < ($tpages - $adjacents)) ? ($page + $adjacents) : $tpages;
    for ($i = $pmin; $i <= $pmax; $i++) {
        if ($i == $page) {
            $out.= "<li class='paginate_button active' aria-controls='dataTables-example' tabindex='0'  class=\"active\"><a href=''>" . $i . "</a></li>\n";
        } elseif ($i == 1) {
            $out.= "<li class='paginate_button' aria-controls='dataTables-example' tabindex='0'><a  href=\"" . $reload . "\">" . $i . "</a>\n</li>";
        } else {
            $out.= "<li class='paginate_button' aria-controls='dataTables-example' tabindex='0'><a  href=\"" . $reload . "&amp;page=" . $i . "\">" . $i . "</a>\n</li>";
        }
    }
    
    if ($page < ($tpages - $adjacents)) {
        $out.= "<li class='paginate_button' aria-controls='dataTables-example' tabindex='0'><a style='font-size:11px' href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $tpages . "</a>\n</li>";
    }
    // next
	
    if ($page < $tpages) {
        $out.= "<li class='paginate_button next' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_next'><a  href=\"" . $reload . "&amp;page=" . ($page + 1) . "\">" . $nextlabel . "</a>\n</li>";
    } else {
        $out.= "<li class='paginate_button next' aria-controls='dataTables-example' tabindex='0' id='dataTables-example_next'><span  style='font-size:11px'>" . $nextlabel . "</span>\n</li>";
    }
    $out.= "";
    return $out;
}?>
 
