<?php 
	session_start(); 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="../stylesheets/register.css"/>
    </head>
    <body>  
    <header>
  	<ul class="">
    	<li class = "item_logo" style='float:right'><a href='".$root."'><img class = "logo" src="../img/logo.png" alt=""/></a></li>
	</ul>
    </header>
        <main>
        <div class = "main_div">
        <div class = "forms">
            <h1> Register </h1>
        <form id="register_form">
            <p>Enter your D-name:</p>
            <input id="username" type="text" placeholder="D-name" minlength="5" maxlength="20" required>
            <p>Enter your Firstname:</p>
            <input id="firstname" type="text" placeholder="Firstname" minlength="5" maxlength="20" required>
            <p>Enter your Lastname:</p>
            <input id="username" type="text" placeholder="Lastname" minlength="5" maxlength="20" required>
            <p>Enter your e-mail:</p>
            <input id="email" type="email" placeholder="Email" required>
            <p>Enter your password:</p>
            <input id="pass1" type="password" placeholder="Password" minlength="8" maxlength="20" required>
            <p>Confirm your password:</p>
            <input id="pass2" type="password" placeholder="Confirm Password" minlength="8" maxlength="20" required>
            <p>How old are you:</p>
            <input id="age" type="password" placeholder="Age?" minlength="8" maxlength="20" required>
            <p>Click on the button and agree with policy of our website:</p>
            <p id="register_msg" class="error_msg"></p>
            <input id="register_submit" type="button" value="Sign up" onclick="register_validate()">
        </form>
        </div>
        <div class ="optional_block">
        <table class = "optional">
            <h1>Optional</h1>
            <p>It is not necessary to fill, but it makes the search more accurate</p>
            <form id="optional_form">
            <tr>
            <td colspan="2"><p>Place:</p></td>
            <td><p>My current place</p></td>
            </tr>
            <tr>
            <td colspan="2"><p>Max destintion</p></td>
            <td><p>100 miles</td>
            </tr>
            <tr><td colspan="3"><input id="username" type="range" placeholder="here will be destintion" minlength="5" maxlength="20" required></td></tr>
            <tr><td colspan="2"><p>Show myself:</p></td>
            <td><p>M/F</p></td></tr>
            <tr><td colspan="2"><p>Age average</p></td>
            <td>18-65</td></tr>
            <tr><td colspan="3"><input id="pass1" type="range" multiple placeholder="age" minlength="8" maxlength="20" required></td></tr>
            <tr><td colspan="3"><p>Choose tags for more personal search:</p></td></tr>
            <tr><td><input id="tag" type="button" value="#Geek" onclick=""></td><td><input id="tag" type="button" value="#Vegan" onclick=""></td><td><input id="tag" type="button" value="#Lift" onclick=""></td></tr>
            <tr><td><input id="tag" type="button" value="#Beauty" onclick=""></td><td><input id="tag" type="button" value="#IT" onclick=""></td><td><input id="tag" type="button" value="#Travel" onclick=""></td></tr>
            <tr><td><input id="tag" type="button" value="#Sport" onclick=""></td><td><input id="tag" type="button" value="#Party" onclick=""></td><td><input id="tag" type="button" value="#Cook" onclick=""></td></tr>
            <tr><td><input id="tag" type="button" value="#Cinema" onclick=""></td><td><input id="tag" type="button" value="#Education" onclick=""></td><td><input id="tag" type="button" value="#Music" onclick=""></td></tr>
            <tr><td><input id="tag" type="button" value="#Cars" onclick=""></td><td><input id="tag" type="button" value="#Drink" onclick=""></td><td><input id="tag" type="button" value="#Animals" onclick=""></td></tr>
            <tr><td colspan="3"><p>Enter your phone number:</p></td></tr>
            <tr><td colspan="2"><input id="phone" type="tel" placeholder="" minlength="8" maxlength="20" required></td></tr>
            <p id="register_msg" class="error_msg"></p>
        </form>
        </table>
        </div>
</div>
</main>
	</body>
</html>