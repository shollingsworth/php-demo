<?php
/**
 * javascript-color-hide-show : Demonstrates creating javascript elements with PHP for dynamic web display
 * @version 2014-09-10 08:23
 * @author Steven Hollingsworth <steven.hollingsworth@fresno.gov>
 */

$classes = array(
   'red'
   ,'brown'
   ,'gray'
   ,'green'
   ,'orange'
   ,'pink'
   ,'purple'
   ,'blue'
   ,'violet'
   ,'yellow'
);

$lorem = <<<___DOC
Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren,
no sea takimata sanctus est Lorem ipsum dolor sit amet.
___DOC;

$style_body = '';
$hide_buttons = '';
$show_buttons = '';
$script_body = '';
$showarr = array();
$hidearr = array();


/**
 * Iterate through colors, and create style elements, the hide buttons, and the script bodies 
 * jquery is used for the anonymous function calls for show / hide
 */
foreach ($classes as $class){
   $style_body .= <<<___DOC
.$class {
   background-color:$class;
}

___DOC;


$hide_buttons .= <<<___DOC
<button id="hide_{$class}">Hide $class</button>
___DOC;


$show_buttons .= <<<___DOC
<button id="show_{$class}">Show $class</button>
___DOC;


$show = <<<___DOC
$(".{$class}").show();
___DOC;
$showarr[] = $show;

$hide = <<<___DOC
$(".{$class}").hide();
___DOC;
$hidearr[] = $hide;

$script_body .= <<<___DOC
$("#hide_{$class}").click(function(){
   $hide
});

$("#show_{$class}").click(function(){
   $show
});
___DOC;
}

$show_txt = implode("\n",$showarr);
$hide_txt = implode("\n",$hidearr);

$script_body .= <<<___DOC
$("#hide_all").click(function(){
$hide_txt
});

$("#show_all").click(function(){
$show_txt
});
___DOC;


/** Begin Program */                                 

?>
<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Test Page </title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
<?php echo $script_body ?>
})
</script>
<style>
<?php echo $style_body ?>
</style>
</head>
<body>
<?php echo $hide_buttons ?><br>
<?php echo $show_buttons ?><br>
<button id="show_all">Show All</button>
<button id="hide_all">Hide All</button>
<table>
<?php 
foreach ($classes as $class){
   echo "<tr class=\"$class\">\n";
   echo "<td>";
   echo $class;
   echo "</td>";
   echo "<td>";
   echo $lorem;
   echo "</td>";
   echo "</tr>\n";
}
?>
</table>
</body>
</html>
