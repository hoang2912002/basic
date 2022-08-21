<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat);

*{
  margin: 0;
  padding: 0;
}

html, body{
  background: #f9f9f9;
  width: 100%;
  height: 100%;
  overflow-x: hidden;
  font-family: 'Montserrat', sans-serif;
}

.slide-menu{
  background: #333;
  width: 200px;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  transform: translateX(-200px);
  -webkit-transform: translateX(-200px);
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  transition: all .5s ease;
}

.slide-menu.show{
  transform: translateX(0px);
  -webkit-transform: translateX(0px);
}

.slide-menu ul{
  list-style: none;
}

.slide-menu ul li{
  color: #777;
  background: #444;
  font-size: 16px;
  font-weight: 600;
  font-family: 'Montserrat', sans-serif;
  padding: 20px;
  border-bottom: 1px solid #333;
  text-transform: uppercase;
  cursor: pointer;
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  transition: all .5s ease;
}

.slide-menu ul li:hover{
  color: #e9e9e9;
}

.slide-menu ul li i{
  font-size: 20px;
  margin-right: 10px;
}

.container{
  width: 100%;
  height: 100%;
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  transition: all .5s ease;
}

.container.hide{
  transform: translateX(200px);
  -webkit-transform: translateX(200px);
}
.content{
  padding-top: 50px;
}

.content .title, .content h3{
  text-align: center;
}

.content .title{
  color: #c44;
  padding-bottom: 10px;
}

.icon-menu{
  text-align: center;
  position: absolute;
  width: 40px;
  height: 40px;
  left: 15px;
  top: 10px;
  cursor: pointer;
}

.icon-menu i{
  color: #333;
  font-size: 40px;
  -webkit-transition: all .3s ease;
  -moz-transition: all .3s ease;
  transition: all .3s ease;
}

.icon-menu:hover i{
  opacity: .8;
}

section{
  color: #fff;
  padding: 20px;
}

section.showing{
  -webkit-animation-name: fadeUp;
  animation-name: fadeUp;
  -webkit-animation-duration:1s;
  animation-duration:1s;
  -webkit-animation-fill-mode:both;
  animation-fill-mode:both;
}

section h1{
  padding-bottom: 20px;
}

section p{
  text-align: justify;
}

.home{ background: #2c9; }
.about{ background: #c44; }
.contact{ background: #29c; }

@-webkit-keyframes fadeUp{
  0%{
    opacity: 0;
    -webkit-transform: translateY(20px);
  }
  100%{
    opacity: 1;
    -webkit-transform: translateY(0px);
  }
}

@keyframes fadeUp{
  0%{
    opacity: 0;
    transform: translateY(20px);
  }
  100%{
    opacity: 1;
    transform: translateY(0px);
  }
}
    </style>
</head>
<body>
<nav class="slide-menu">
	  <ul>
	    <li id="home"><i class="fa fa-home"></i>Home</li>
	    <li id="about"><i class="fa fa-user"></i>About</li>
	    <li id="contact"><i class="fa fa-envelope"></i>Contact</li>
	  </ul>
	</nav>

	<div class="container">
	  <div class="icon-menu">
        <i class='bx bx-menu'></i>
	  </div>
	  <div class="content">
	    <h1 class="title">Navigation</h1>
	    <h3>(Click on the icon menu then on a link)</h3>
	    <section class="home" id="visible">
	      <h1>Home section</h1>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam dicta, sint iste earum perferendis beatae similique facilis facere sapiente soluta qui odio quisquam tenetur harum voluptas, sit dolorem aperiam vitae!</p>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam dicta, sint iste earum perferendis beatae similique facilis facere sapiente soluta qui odio quisquam tenetur harum voluptas, sit dolorem aperiam vitae!</p>
	    </section>
	    <section class="about">
	      <h1>About section</h1>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam dicta, sint iste earum perferendis beatae similique facilis facere sapiente soluta qui odio quisquam tenetur harum voluptas, sit dolorem aperiam vitae!</p>
	    </section>
	    <section class="contact">
	      <h1>Contact section</h1>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam dicta, sint iste earum perferendis beatae similique facilis facere sapiente soluta qui odio quisquam tenetur harum voluptas, sit dolorem aperiam vitae!</p>
	      <br/>
	      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam dicta, sint iste earum perferendis beatae similique facilis facere sapiente soluta qui odio quisquam tenetur harum voluptas, sit dolorem aperiam vitae!</p>
	    </section>
	  </div>
	</div>
    <script>
        //hide all sections execpt the home section
$('section').hide();
$('.home').show();

// function hide/show the sliding menu
$('.icon-menu').click(function(){
  $('.slide-menu').toggleClass('show');
  $('.container').toggleClass('hide');
});

//function to modify the content
$('.slide-menu ul li').click(function(){

  var section = $(this).attr('id');

  // if is not the visible section
  if($('.'+section).attr('id') != 'visible'){
    // hide the section and remove the animation class
    $('#visible').attr('id', '').removeClass('showing').hide();
    // show the section after the menu is hidden
    setTimeout(function(){
    	$('.'+section).attr('id', 'visible').addClass('showing').show();
    }, 200);
  }
  //close the menu
    $('.slide-menu').toggleClass('show');
    $('.container').toggleClass('hide');
});
    </script>
</body>
</html>