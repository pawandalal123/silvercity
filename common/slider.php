
<style type="text/css">
  


/* /////////////////////////////////////////// */
.owl-carousel4 {
  display: none;
  width: 100%;
  -webkit-tap-highlight-color: transparent;
  position: relative;
  z-index: 1; }
.owl-carousel4 .owl-stage {
  position: relative;
  -ms-touch-action: pan-Y;
   }
.owl-carousel4 .owl-stage:after {
  content: ".";
  display: block;
  clear: both;
  visibility: hidden;
  line-height: 0;
  height: 0;
  padding-left: 0 !important; }
.owl-carousel4 .owl-stage-outer {
  position: relative;
  overflow: hidden;
  -webkit-transform: translate3d(0px, 0px, 0px);
  padding-left: 0 !important; }
.owl-carousel4 .owl-item {
  position: relative;
  min-height: 1px;
  float: left;
  -webkit-backface-visibility: hidden;
  -webkit-tap-highlight-color: transparent;
  -webkit-touch-callout: none; }
.owl-carousel4 .owl-item img {
  width: 100%;
  -webkit-transform-style: preserve-3d; }
.owl-carousel4 .owl-nav.disabled,
.owl-carousel4 .owl-dots.disabled {
  display: none; }
.owl-carousel4 .owl-nav .owl-prev,
.owl-carousel4 .owl-nav .owl-next,
.owl-carousel4 .owl-dot {
  cursor: pointer;
  cursor: hand;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }
.owl-carousel4.owl-loaded {
  display: block; }
.owl-carousel4.owl-loading {
  opacity: 0;
  display: block; }
.owl-carousel4.owl-hidden {
  opacity: 0; }
.owl-carousel4.owl-refresh .owl-item {
  visibility: hidden; }
.owl-carousel4.owl-drag .owl-item {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }
.owl-carousel4.owl-grab {
  cursor: move;
  cursor: grab; }
.owl-carousel4.owl-rtl {
  direction: rtl; }
.owl-carousel4.owl-rtl .owl-item {
  float: right; }
/* No Js */
.no-js .owl-carousel4 {
  display: block; }

.owl-carousel4.home_carousel img {
    width: 100%!important;
    height: 100%!important;
    display: block!important;
    max-width: 100%!important;
    object-fit: fill!important;
}
.home_carousel_box {
    padding-top: 12px;
    padding-bottom: 12px;
    height: 354px;
    overflow: hidden!important;
    background-color: #E5E5E5;
}
.owl-carousel4.home_carousel {
    position: relative;
}
.owl-carousel4.home_carousel .owl-prev, .owl-carousel4.home_carousel .owl-next{
  width: 30px;
  height: 46px;
  padding: 0px!important;
  line-height: 44px;
  position: absolute;
  text-align: center;
  font-size:18px;
  transition: 200ms;
  color: #e0e0e0;
  background-color: rgba(0, 0, 0, 0.6);
}
.owl-carousel4.home_carousel{
  position: relative;
  height: 354px;
} 
.owl-carousel4.home_carousel .owl-prev{
  left: -30px;
  top: 50%;
  margin-top: -23px;
  border-radius: 0px 2px 2px 0px;
}
.owl-carousel4.home_carousel .owl-next{
  right: -30px;
  top: 50%;
  margin-top: -23px;
  border-radius: 2px 0px 0px 2px;
}
.owl-next.disabled,.owl-prev.disabled{
  /*display: none;*/
}
.owl-carousel4.home_carousel:hover .owl-next{
  right: 0px!important;
  transition: 200ms;
}
.owl-carousel4.home_carousel:hover .owl-prev{
  left: 0px!important;
  transition: 200ms;
}


.owl-carousel4.home_carousel .item{
  height: 330px;
  background-color: #dddddd;
}
.owl-carousel4.home_carousel img{
  width: 100%!important;
 height: 100%!important;
  display: block!important;
  max-width: 100%!important;
  object-fit: fill!important;
}
.owl-carousel4 .owl-stage {
  right: -260px!important;
}
.owl-carousel4 .owl-item,.owl-carousel4 .owl-item.active{
  opacity: 1;
  border-radius: 3px;
  overflow: hidden;
}
/* ///////////////////////////////////////////// 
</style>
<?php 
$sql = "SELECT * FROM tbl_banner WHERE BANNER_PAGE = 0";
$result = $conn->query($sql);

$data = mysqli_fetch_all ($result, MYSQLI_ASSOC);


 ?>



<div class="home_carousel_box">
        <div class="row">
<div class="owl-carousel4 home_carousel">

<?php 
foreach ($data as $key => $value) { ?>
  <div class="item">
              <a href=""><img src="images/<?php echo $value['IMAGE']; ?>"></a>
          </div>

<?php }

?>
   
   </div>
  </div>
</div>