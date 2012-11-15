<?php
header('content-type: text/css');
$id = $_GET['monid'];
?>

.clr {clear:both;}

/**
** global styles
**/

/* container style */
.navigation div#<?php echo $id; ?> ul.maximenuCK {
    padding :0;
    margin : 0;
    z-index:1;
}

.navigation #maximenuCK {
    margin:0;
    padding:0;
    
}

.navigation div#<?php echo $id; ?> ul.maximenuCK > li.maximenuCK {
    background : none;
    list-style : none;
    border : none;
    margin:0 0px 0 0px;
    padding:0 0 0 20px;
    
}
.navigation div#<?php echo $id; ?> ul.maximenuCK strong {
    font-weight:bold;
}

/* link image style */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK>a img {
    margin : 3px;
    border : none;
}

/* img style without link (in separator) */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK img {
    border : none;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK > li > a.maximenuCK {
    text-decoration : none;
    outline : none;
    border : none;
    cursor : pointer;
    color : #fff;
    font-weight:normal;
    font-size:14px;
    line-height:14px;
    padding:0 0px 0 0px;
    display:block; 
    text-transform:uppercase;  
    float:left;
    letter-spacing:0px;
    text-align:center;
    z-index:9;
    font-family:Arial, Helvetica, sans-serif;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK > li.parent > a.maximenuCK { overflow:hidden;}




.navigation div#<?php echo $id; ?> ul.maximenuCK > li > a.maximenuCK:hover, .navigation div#<?php echo $id; ?> ul.maximenuCK > li.current > a.maximenuCK,  
.navigation div#<?php echo $id; ?> ul.maximenuCK > li.active > a.maximenuCK, .navigation div#<?php echo $id; ?> ul.maximenuCK > li.sfhover > a {
}


ul.maximenuCK > li.current > a.maximenuCK > span, ul.maximenuCK > li.active > a.maximenuCK > span {
color:#83c00b !important;
}
ul.maximenuCK li a:hover, ul.maximenuCK li a:hover span, ul.maximenuCK > li.sfhover > a > span {
color:#83c00b !important;
}
div#<?php echo $id; ?> ul.maximenuCK li .separator {
    text-decoration : none;
    outline : none;
    background : none;
    border : none;
    padding :0px 0 15px; 0;
    color : #fff;
    font-size:13px;
    display:block
}
.navigation div#<?php echo $id; ?> ul.maximenuCK2 li  {
color:#000;
}
.navigation div#<?php echo $id; ?> ul.maximenuCK2 li:first-child  {
    border-top:none !important
}
.navigation div#<?php echo $id; ?> ul.maximenuCK2 li a.maximenuCK {
    text-decoration : none;
    outline : none;
    background : none;
    border : none;
    height:auto;
    padding:0;
    cursor : pointer;
    color : #000;
    font-size:12px;
    text-transform:none;
    font-weight:normal;
}
.navigation div#<?php echo $id; ?> ul.maximenuCK2 li a.maximenuCK strong{
    font-weight:bold;
}

/* separator item */
.navigation div#<?php echo $id; ?> ul.maximenuCK li span.separator {

}
/**
** active items
**/

/* current item title and description */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.current>a strong {
font-weight:bold;
}

/* current item title when mouseover */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.current>a:hover span.titreCK {

}

/* current item description when mouseover */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.current>a:hover span.descCK {

}

/* active parent title */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.active>a span.titreCK {

}

/* active parent description */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.active>a span.descCK {

}

/**
** first level items
**/


.navigation div#<?php echo $id; ?> ul.maximenuCK {
    margin-left:0px;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 a {
    
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li { padding:0 0 0 0px; width:165px;}
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li a {
    color:#fff;
    font-size:11px;
	font-family:Arial, Helvetica, sans-serif;
	line-height:25px !important;
    font-weight:normal !important;
    text-decoration:none;
    text-transform:uppercase;
    margin:0 0 0 22px;
    text-align:left;
    display:inline-block;
}


.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li:first-child a {
    border-top:none;
}
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.last a {
    border-bottom:none;
    
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li.level1 {
    font-weight:bold !important;
}

.navigation  div#<?php echo $id; ?> ul.maximenuCK li.level0 li  a:hover, .navigation div#<?php echo $id; ?> ul.maximenuCK li.level0  li.active > a, 
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.current > a, .navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.sfhover > a {
}
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li > a:hover > span, 
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.active > a > span, 
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.current > a > span, 
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0 li.sfhover > a > span {color:#8fb342 !important;}




/* first level item title */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0>a span.titreCK {
   
}

/* first level item description */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.level0>a span.descCK {
    
    font-size:12px
}
.descCK {
    
    font-size:12px !important
}

/* first level item link */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.parent.level0>a {
    /*background : none;*/
}

/* parent style level 0 */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.parent.level0 li.parent {

}
.navigation div#<?php echo $id; ?> ul.maximenuCK li.parent.level0 li.parent > a{
    
}

/**
** items title and descriptions
**/
/* item title */

/* item description */
.navigation div#<?php echo $id; ?> span.descCK {
    color : #c0c0c0;
    display : block;
    text-transform : none;
    font-size : 10px;
    text-decoration : none;
    height : 12px;
    line-height : 12px;
    float : none !important;
    float : left;
}

/* item title when mouseover */
.navigation div#<?php echo $id; ?> ul.maximenuCK  a:hover span.titreCK {
    color:#79256e;
}

/**
** child items
**/

/* child item title */
.navigation div#<?php echo $id; ?> ul.maximenuCK2  a.maximenuCK {
    
}
div.maximenuCK2 {
    border:0;
    padding:15px 0 !important;
    background:#191919;
}


   
.navigation div#<?php echo $id; ?> ul.maximenuCK2 li a.maximenuCK {
    text-decoration : none;
    margin : 0 auto;
    font-weight:bold;
    padding : 0px 0 0px 0;
    
}

/* child item block */
.navigation div#<?php echo $id; ?> ul.maximenuCK ul.maximenuCK2 {
    margin : 0px 0 0 0;
    padding:0;
    border : none;
     /* important for Chrome and Safari compatibility */
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 li.maximenuCK {
    
    padding : 0px;
    border : none;
    margin : 0;
    font-weight:bold;
    text-align:left;
    
}

/* child item container  */

/**
** module style
**/

.navigation div#<?php echo $id; ?> div.maximenuCK_mod {
    width : 170px;
    padding : 15px;
    overflow : hidden;
    color : #ddd;
    white-space : normal;
}

.navigation div#<?php echo $id; ?> div.maximenuCK_mod div.moduletable {
    border : none;
    background : none;
}

.navigation div#<?php echo $id; ?> div.maximenuCK_mod  fieldset{
    padding : 0;
    margin : 0 auto;
    overflow : hidden;
    background : #1a1a1a;
    border : none;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod a {
    border : none;
    margin : 0;
    padding : 0;
    display : inline;
    background : none;
    color : #888;
    font-weight : normal;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod a:hover {
    color : #000;
}

/* module title */
.navigation div#<?php echo $id; ?> ul.maximenuCK div.maximenuCK_mod h3 {
    font-size : 14px;
    width : 170px;
    color : #aaa;
    font-size : 14px;
    font-weight : normal;
    background : #444;
    margin : 5px 0 0 0;
    padding : 3px 0 3px 0;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod ul {
    margin : 0;
    padding : 0;
    width : 170px;
    background : none;
    border : none;
    text-align : left;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod li {
    margin : 0 0 0 15px;
    padding : 0;
    width : 155px;
    background : none;
    border : none;
    text-align : left;
    font-size : 11px;
    float : none;
    display : block;
    line-height : 20px;
    white-space : normal;
}

/* login module */
.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod #form-login ul {
    left : 0;
    margin : 0;
    padding : 0;
    width : 170px;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod #form-login ul li {
    margin : 2px 0;
    padding : 0 5px;
    height : 20px;
    background : #1a1a1a;
}


/**
** columns width & child position
**/

/* child blocks position (from level2 to n) */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK div.floatCK div.floatCK {
    margin : -40px 0 0 175px;
}

/* margin for overflown elements that rolls to the left */
.navigation div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK div.floatCK div.floatCK.fixRight  {
    margin-right : 188px;
}

/* default width */
.navigation div#<?php echo $id; ?> ul.maximenuCK li div.floatCK {
    width : 175px;
    margin:0px 0 0 -20px;
    z-index:9999;
    padding:0px 0 0 0;
    background:none;
    z-index:1;
   
}

/* 2 cols width */
.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols2 {
    width : 360px;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols2>div.maximenuCK2 {
    width : 50%;
}

/* 3 cols width */
.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols3 {
    width : 540px;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols3>div.maximenuCK2 {
    width : 33%;
}

/* 4 cols width */
.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols4 {
    width : 720px;
}

.navigation div#<?php echo $id; ?> ul.maximenuCK li div.cols4>div.maximenuCK2 {
    width : 25%;
}



/**
** fancy parameters
**/

.navigation div#<?php echo $id; ?> .maxiFancybackground {
	background:url(../images/menu_hover.png) 0 0 repeat;
    height:40px;
     -webkit-border-radius:5px;
       -moz-border-radius:5px;
            border-radius:5px;
    list-style : none;
}

.navigation div#<?php echo $id; ?> .maxiFancybackground .maxiFancycenter, .navigation div#maximenuCK ul.maximenuCK li.level0.current {
   

}
.navigation div#maximenuCK ul.maximenuCK li.level0.current > strong {  color:#fff !important;}

.navigation div#<?php echo $id; ?> .maxiFancybackground .maxiFancyleft {

}

.navigation div#<?php echo $id; ?> .maxiFancybackground .maxiFancyright {

}

/**
** rounded style
**/

/* global container */
.navigation div#<?php echo $id; ?> div.maxiRoundedleft {

}

.navigation div#<?php echo $id; ?> div.maxiRoundedcenter {

}

.navigation div#<?php echo $id; ?> div.maxiRoundedright {

}

/* child container */
.navigation div#<?php echo $id; ?> div.maxidrop-top {


}

.navigation div#<?php echo $id; ?> div.maxidrop-main {

}

.navigation div#<?php echo $id; ?> div.maxidrop-bottom {

}


