<?php
header('content-type: text/css');
$id = $_GET['monid'];
?>

.clr {clear:both;}

/**
** global styles
**/

/* container style */
div#<?php echo $id; ?> ul.maximenuCK {
    background :  url(../images/fond_bg.png) top left repeat-x;
    height : 38px;
    padding : 0;
    margin : 0;
}

div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK {
    background : none;
    list-style : none;
    border : none;
}

/* link image style */
div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK>a img {
    margin : 3px;
    border : none;
}

/* img style without link (in separator) */
div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK img {
    border : none;
}

div#<?php echo $id; ?> ul.maximenuCK li a.maximenuCK {
    text-decoration : none;
    text-indent : 2px;
    height : 27px;
    outline : none;
    background : none;
    border : none;
    padding : 0;
    cursor : pointer;
    color : #ccc;
}

/* separator item */
div#<?php echo $id; ?> ul.maximenuCK li span.separator {

}

/**
** active items
**/

/* current item title and description */
div#<?php echo $id; ?> ul.maximenuCK li.current>a span {
    color : #ccc;
}

/* current item title when mouseover */
div#<?php echo $id; ?> ul.maximenuCK li.current>a:hover span.titreCK {

}

/* current item description when mouseover */
div#<?php echo $id; ?> ul.maximenuCK li.current>a:hover span.descCK {

}

/* active parent title */
div#<?php echo $id; ?> ul.maximenuCK li.active>a span.titreCK {
    color : #ccc;
}

/* active parent description */
div#<?php echo $id; ?> ul.maximenuCK li.active>a span.descCK {

}

/**
** first level items
**/

div#<?php echo $id; ?> ul.maximenuCK li.level0 {
    padding : 0 10px;
    background : url(../images/separator.png) top right no-repeat;
}

/* first level item title */
div#<?php echo $id; ?> ul.maximenuCK li.level0>a span.titreCK {
    color : #ccc;
}

/* first level item description */
div#<?php echo $id; ?> ul.maximenuCK li.level0>a span.descCK {
    color : #ccc;
}

/* first level item link */
div#<?php echo $id; ?> ul.maximenuCK li.parent.level0>a {
    background : url(../images/maxi_arrow0.png) bottom right no-repeat;
}

/* parent style level 0 */
div#<?php echo $id; ?> ul.maximenuCK li.parent.level0 li.parent {
    background : url(../images/maxi_arrow1.png) center right no-repeat;
}

/**
** items title and descriptions
**/

/* item title */
div#<?php echo $id; ?> span.titreCK {
    color : #888;
    display : block;
    text-transform : none;
    font-weight : normal;
    font-size : 14px;
    line-height : 18px;
    text-decoration : none;
    height : 17px;
    float : none !important;
    float : left;
}

/* item description */
div#<?php echo $id; ?> span.descCK {
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
div#<?php echo $id; ?> ul.maximenuCK  a:hover span.titreCK {
    color : #ddd;
}

/**
** child items
**/

/* child item title */
div#<?php echo $id; ?> ul.maximenuCK2  a.maximenuCK {
    width : 160px;
}

div#<?php echo $id; ?> ul.maximenuCK2 li a.maximenuCK {
    text-decoration : none;
    border-bottom : 1px solid #505050;
    width : 150px;
    margin : 0 auto;
    padding : 3px 0 3px 0;
}

/* child item block */
div#<?php echo $id; ?> ul.maximenuCK ul.maximenuCK2 {
    background : #1a1a1a;
    margin : 3px 0 0 0;
    padding : 0;
    border : none;
    width : 180px; /* important for Chrome and Safari compatibility */
}

div#<?php echo $id; ?> ul.maximenuCK2 li.maximenuCK {
    width : 180px;
    padding : 2px 0 0 0;
    border : none;
    margin : 0;
    background : none;
}

/* child item container  */
div#<?php echo $id; ?> ul.maximenuCK li div.floatCK {
    background : #1a1a1a;
    border : 1px solid #707070;
}

/**
** module style
**/

div#<?php echo $id; ?> div.maximenuCK_mod {
    width : 170px;
    padding : 0;
    overflow : hidden;
    color : #ddd;
    white-space : normal;
}

div#<?php echo $id; ?> div.maximenuCK_mod div.moduletable {
    border : none;
    background : none;
}

div#<?php echo $id; ?> div.maximenuCK_mod  fieldset{
    width : 160px;
    padding : 0;
    margin : 0 auto;
    overflow : hidden;
    background : #1a1a1a;
    border : none;
}

div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod a {
    border : none;
    margin : 0;
    padding : 0;
    display : inline;
    background : #1a1a1a;
    color : #888;
    font-weight : normal;
}

div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod a:hover {
    color : #FFF;
}

/* module title */
div#<?php echo $id; ?> ul.maximenuCK div.maximenuCK_mod h3 {
    font-size : 14px;
    width : 170px;
    color : #aaa;
    font-size : 14px;
    font-weight : normal;
    background : #444;
    margin : 5px 0 0 0;
    padding : 3px 0 3px 0;
}

div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod ul {
    margin : 0;
    padding : 0;
    width : 170px;
    background : none;
    border : none;
    text-align : left;
}

div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod li {
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
div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod #form-login ul {
    left : 0;
    margin : 0;
    padding : 0;
    width : 170px;
}

div#<?php echo $id; ?> ul.maximenuCK2 div.maximenuCK_mod #form-login ul li {
    margin : 2px 0;
    padding : 0 5px;
    height : 20px;
    background : #1a1a1a;
}


/**
** columns width & child position
**/

/* child blocks position (from level2 to n) */
div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK div.floatCK div.floatCK {
    margin : -30px 0 0 180px;
}

/* margin for overflown elements that rolls to the left */
div#<?php echo $id; ?> ul.maximenuCK li.maximenuCK div.floatCK div.floatCK.fixRight  {
    margin-right : 180px;
}

/* default width */
div#<?php echo $id; ?> ul.maximenuCK li div.floatCK {
    width : 180px;
}

/* 2 cols width */
div#<?php echo $id; ?> ul.maximenuCK li div.cols2 {
    width : 360px;
}

div#<?php echo $id; ?> ul.maximenuCK li div.cols2>div.maximenuCK2 {
    width : 50%;
}

/* 3 cols width */
div#<?php echo $id; ?> ul.maximenuCK li div.cols3 {
    width : 540px;
}

div#<?php echo $id; ?> ul.maximenuCK li div.cols3>div.maximenuCK2 {
    width : 33%;
}

/* 4 cols width */
div#<?php echo $id; ?> ul.maximenuCK li div.cols4 {
    width : 720px;
}

div#<?php echo $id; ?> ul.maximenuCK li div.cols4>div.maximenuCK2 {
    width : 25%;
}



/**
** fancy parameters
**/

div#<?php echo $id; ?> .maxiFancybackground {
    list-style : none;
}

div#<?php echo $id; ?> .maxiFancybackground .maxiFancycenter {
    background: url('../images/fancy_bg.png') repeat-x top left;
    height : 34px;
}

div#<?php echo $id; ?> .maxiFancybackground .maxiFancyleft {

}

div#<?php echo $id; ?> .maxiFancybackground .maxiFancyright {

}

/**
** rounded style
**/

/* global container */
div#<?php echo $id; ?> div.maxiRoundedleft {

}

div#<?php echo $id; ?> div.maxiRoundedcenter {

}

div#<?php echo $id; ?> div.maxiRoundedright {

}

/* child container */
div#<?php echo $id; ?> div.maxidrop-top {

}

div#<?php echo $id; ?> div.maxidrop-main {

}

div#<?php echo $id; ?> div.maxidrop-bottom {

}


