<html>
<head>
	<link rel="icon" href="img/logoheader.png">
	<link href="css.css" rel="stylesheet" type="text/css">
	<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
	<script src="js.js"></script>
	<title>Gallery</title>
	<meta charset="UTF-8">
</head>
<body>
<div class="wrap">

<div class="nav-container">
	<nav class="nav-bar">
		<ul>
			<li style="width:250px;">
				<a href="index.html"><img src="logo.jpg"></img></a>
			</li>
		
			<li class="li-tab">
				<a href="index.html">Home</a>
			</li>

			<li class="li-tab">
				<a href="news.html">News</a>
			</li>
			
			<li class="li-tab">
				<a href="History.html">The Fair</a>
			</li>
			
			<li class="li-tab">
				<a href="aaa">Events <p> &#x25BC;</p></a>
					<ul class="li-child">
						<li><a href="b"><p>&#8227;</p>  Exhibition</a></li>
						<li><a href="c"><p>&#8227;</p>  Presentation</a></li>
					</ul>
			</li>
			
			<li class="li-tab">
				<a href="gallery.php">Gallery</a>
			</li>			
			
			<li class="li-search" style="width:20%">
				<div id="sb-search" class="sb-search">
					<form style="margin-top : 10px">
						<input class="sb-search-input" placeholder="Search..." type="search" value="" name="search" id="search">
						<input class="sb-search-submit" type="submit" value="">
						<span class="sb-icon-search"></span>
					</form>
				</div>
			</li>
			
		</ul>
	</nav>
</div>

<div class="template" style="margin-top : 100px;">
<div class="body">	
	<div class="col-middle" style="width : 100%; height : auto; padding-bottom : 100px">
	<h1> Gallery</h1>
	<hr width ="40%" align="left" style="background:#000000; border:0; height : 5px">
		<ul class="gal-slides">
		
		    <input type="radio" name="radio-btn" id="img-1" checked />
			<li class="gal-cont">
				<div class="gal-slide">
					<img src="./img/logo_tw.png">
				</div>
			
				<div class="gal-nav">
					<label for="img-5" class="prev">&#x2039;</label>
					<label for="img-2" class="next">&#x203a;</label>
				</div>
			</li>
			
		    <input type="radio" name="radio-btn" id="img-2"/>
			<li class="gal-cont">
				<div class="gal-slide">
					<img src="./img/bg.jpg">
				</div>
			
				<div class="gal-nav">
					<label for="img-1" class="prev">&#x2039;</label>
					<label for="img-3" class="next">&#x203a;</label>
				</div>
			</li>
			
		    <input type="radio" name="radio-btn" id="img-3"/>
			<li class="gal-cont">
				<div class="gal-slide">
					<img src="./img/bg2.jpg">
				</div>
			
				<div class="gal-nav">
					<label for="img-2" class="prev">&#x2039;</label>
					<label for="img-4" class="next">&#x203a;</label>
				</div>
			</li>
			
			<input type="radio" name="radio-btn" id="img-4"/>
			<li class="gal-cont">
				<div class="gal-slide">
					<img src="./img/logo.png">
				</div>
			
				<div class="gal-nav">
					<label for="img-3" class="prev">&#x2039;</label>
					<label for="img-5" class="next">&#x203a;</label>
				</div>
			</li>
			
			<input type="radio" name="radio-btn" id="img-5"/>
			<li class="gal-cont">
				<div class="gal-slide">
					<img src="./img/logo_cc.png">
				</div>
			
				<div class="gal-nav">
					<label for="img-4" class="prev">&#x2039;</label>
					<label for="img-1" class="next">&#x203a;</label>
				</div>
			</li>
			
			<li class="gal-dots">
				<label for="img-1" class="gal-dot" id="img-dot-1"></label>
				<label for="img-2" class="gal-dot" id="img-dot-2"></label>
				<label for="img-3" class="gal-dot" id="img-dot-3"></label>
				<label for="img-4" class="gal-dot" id="img-dot-4"></label>
				<label for="img-5" class="gal-dot" id="img-dot-5"></label>
			</li>
		</ul>
</div>
<div class="gal-content">
<?php 
$folder = './img/';
$filetype = '*.*';    
$files = glob($folder.$filetype);    
$total = count($files);   
$per_page = 9;   
$line = 1;
$last_page = ceil($total / $per_page);  
  
if(isset($_GET["page"])  && ($_GET["page"] <=$last_page) && ($_GET["page"] > 0) ){
    $page = $_GET["page"];
    $offset = ($per_page + 1)*($page - 1);      
}
else {
    $page=1;
    $offset=0;      
}    
$max = $offset + $per_page;    
if($max>$total) {
    $max = $total;
}
	show_pagination($page, $last_page);        
    for($i = $offset; $i< $max; $i++){
        $file = $files[$i];
        $path_parts = pathinfo($file);
        $filename = $path_parts['filename']; 
        echo '
                <a rel="group" href="'.$file.'"><img class="galleryPhoto" src="'.$file.'" alt="'.$filename.'"></a>    
        ';
    }        
    show_pagination($page, $last_page);
	
function show_pagination($current_page, $last_page){
    echo '<div align="center">
	<table>
	<tr>';
	if($current_page != 1) {
		echo '<td><a href="?page='.($current_page-1).'"><< Previous</a> &nbsp&nbsp&nbsp&nbsp</td>';
	}
    for($z = 1;$z <= $last_page;$z++){
		if ($current_page != $z) {
        echo '<td><a href="?page='.($z).'">'.$z.'</a> &nbsp&nbsp&nbsp&nbsp</td>';
		}
		else {
			echo '<td>'.$z.'&nbsp&nbsp&nbsp&nbsp</td>';
		}
	}
	if($current_page != $last_page){
		echo '<td><a href="?page='.($current_page+1).'">Next >></a>&nbsp&nbsp&nbsp&nbsp</td>';
	}
    echo '</tr>
	</table>
	</div>';
}
?>
</div>
</div>
</div>
<div class="footer" style="margin-top : -8px; opacity : 1">
	<div class="foot-temp" style="padding-top : 20px">
	<hr color="white" style="border : 0;height:1px; margin : 20 0 20 0;">
		<div class="foot-tab">
			<a href="http://kanisius.edu/index.php/en/"><img src="./img/contact_cc.png"></img></a>
		</div>
		<div class="foot-tab" style="width :550px; text-align : center">
		<img src="./img/logo_amdg.png" height="64px" width="64px"/>
		</div>
		<div class="foot-tab" style="right : 0;">
			<h2>&#169; Made by : Antonio Setya, Henry Kosim, <br>Kevin Pratama</h2>
		</div>
	</div>
</div>
<!--JAVASCRIPT-->
<script src="js/classie.js"></script>
<script src="js/uisearch.js"></script>
<script src="js/offset.js"></script>
<script>
	new UISearch( document.getElementById( 'sb-search' ) );
</script>
<script> /*Nav-Bar Zoom Scroll*/
    $(window).scroll(function() {
    $('.nav-bar').css('left', -$(this).scrollLeft() + "px");
    });
</script>
</body>
</html>
