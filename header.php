<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Yuehan Liu</title>
<!-- Stylesheets -->
<link rel="stylesheet" href="./style.css" type="text/css" media="screen" />
</head>
<body>
<div class="wrapper">
    <header>
        <nav class="navbar">
            <div class="container">
                <div class="navbar-header header-logo"><a href="/">Yuehan Liu</a></div>
                <div class="menu navbar-right">
                        <a class="menu-item" href="/archives">Posts</a>
                    <input id="switch_default" type="checkbox" class="switch_default">
                    <label for="switch_default" class="toggleBtn"></label>
                </div>

            </div>
        </nav>

        
        <nav class="navbar-mobile" id="nav-mobile">
            <div class="container">
                <div class="navbar-header">
                    <div>
                        <a href="/">Yuehan Liu</a><a id="mobile-toggle-theme">·&nbsp;Light</a>
                    </div>
                    <div class="menu-toggle" onclick="mobileBtn()">&#9776; Menu</div>
                </div>
                <div class="menu" id="mobile-menu">
                    
                        <a class="menu-item" href="/archives">Posts</a>
                    
                </div>
            </div>
        </nav>
    </header>
    <script>
        var mobileBtn = function f() {
            var toggleMenu = document.getElementsByClassName("menu-toggle")[0];
            var mobileMenu = document.getElementById("mobile-menu");
            if(toggleMenu.classList.contains("active")){
            toggleMenu.classList.remove("active")
                mobileMenu.classList.remove("active")
            }else{
                toggleMenu.classList.add("active")
                mobileMenu.classList.add("active")
            }
        }
    </script>