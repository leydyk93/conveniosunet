<?php 
  $this->breadcrumbs=array(
	'Convenioses'=>array('consultar'),
	'Consulta Convenios',
);
 ?>
 <h1>Consultar</h1>

<style type="text/css">
	
	@media (min-width: 768px) {
  .sidebar-nav .navbar .navbar-collapse {
    padding: 0;
    max-height: none;
  }
  .sidebar-nav .navbar ul {
    float: none;
  }
  .sidebar-nav .navbar ul:not {
    display: block;
  }
  .sidebar-nav .navbar li {
    float: none;
    display: block;
  }
  .sidebar-nav .navbar li a {
    padding-top: 12px;
    padding-bottom: 12px;
  }
}
</style> 


 <div class="row">
  <div class="col-sm-3">
    <div class="sidebar-nav">
      <div class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <span class="visible-xs navbar-brand">Sidebar menu</span>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Menu Item 1</a></li>
            <li><a href="#">Menu Item 2</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
            <li><a href="#">Menu Item 4</a></li>
            <li><a href="#">Reviews <span class="badge">1,118</span></a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
  </div>
  <div class="col-sm-9">
    Main content goes here
  </div>
</div>

<style>
	

	#accordion {
 list-style: none;
 padding: 0 0 0 0;
 width: 220px;
 margin: 0;
 }
 #accordion div {
 display: block;
 font-weight: bold;
 font-size:11px;
 color:white;
 cursor: pointer;
 padding: 5px;
 margin:0;
 background-color: #375d84;
 background-image: url(../images/arrow-down.png);
 background-position: right center;
 background-repeat:no-repeat;
 border-bottom: 1px solid #eff2f5;
 }
 #accordion ul {
 list-style-type: none;
 display: none;
 background: #eff2f5 url(/images/stripes.png) repeat;
 }
 #accordion ul li {
 font-weight: normal;
 cursor: auto;
 padding: 5px;
 width: 210px;
 height: 15px;
 font-size:11px;
 color: #375d84;
 display:block;
 }
 #accordion ul li:hover {
 background-color: #d6dfec;
 font-weight: normal;
 cursor: auto;
 padding: 5px;
 font-size:11px;
 color: #375d84;
 display:block;
 }
 #accordion a {
 text-decoration: none;
 color: #375d84;
 }
</style>


<ul id="accordion">
<li><div>System Administration</div>
<ul>
<li><a href="#">Personal Details</a></li>
<li><a href="#">Company Information</a></li>
<li><a href="#">Announcement Details</a></li>
<li><a href="#">Reports</a></li>
<li><a href="#">Search</a></li>
<li><a href="#">Committee</a></li>
</ul>
</li>
<li><div>Committee</div>
<ul>
<li><a href="#">Personal Details</a></li>
<li><a href="#">Company Information</a></li>
<li><a href="#">Announcement Details</a></li>
</ul>
</li>
<li><div>Compliance</div>
<ul>
<li><a href="#">Personal Details</a></li>
<li><a href="#">Company Information</a></li>
<li><a href="#">Announcement Details</a></li>
</ul>
</li>
</ul>

<script type="text/javascript">
 $("#accordion > li > div").click(function(){
 if(false == $(this).next().is(':visible')) {
 $('#accordion ul').slideUp(300);
 }
 $(this).next().slideToggle(300);
 });
 $('#accordion ul:eq(0)').show();
 </script>