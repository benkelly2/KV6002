<?php
    function getConnection(){
        try{
            $connection = new PDO();
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection
        }catch(Exception $e){
            throw new Exception("Connection error ". $e->getMessage(), 0 , $e);
        }
    }

    function makePageStart($title, $cssFile){
        $pageStartContent = <<<PAGESTART
        <!Doctype html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>$title</title>
            <link href=$cssFile" rel="stylesheet" type="text/css">
        </head>
        <body>
            <div class="constainer">
    PAGESTART;
        $pageStartContent .="\n";
        return $pageStartContent
    }

    function makeMain($mainTitle){
		$mainContent = <<<HEAD
		<main>
		<h1>$mainTitle</h1>
		</main>
		
HEAD;
	$mainContent .="\n";
	return $mainContent;
	}

    function isLogged(){
		try{
			if(isset($_SESSION['logged-in']) && $_SESSION['logged-in']){
				echo makeLogOut();
			}else{
				echo makeLogInS();
				echo makeLogInE();
			}
		}catch (Exception $e) {
			throw new Exception("Connection error ". $e->getMessage(), 0, $e);
		}
	}

    function makeLogInS(){
        $logInCont = <<< LOGIN
        <div id="logIn">
            <form method="post" action="logProcess.php">
                Username:
                <input type="text" name="username" placeholder="Username">
                Password:
                <input type="password" name='password' placeholder='Password'>
                <input type='submit' name='logInBTN' value='Log In'>
            </form>
LOGIN;
    $logInCont .="\n";
    return $logInCont;
    }

    function makeLogInE(){
		if(isset($_SESSION['logMessage'])){
			echo $_SESSION['logMessage'];
			echo "</div>";
		}else{
			echo "</div>";
		}
	}
    
	function makeLogOut(){
		$logOutCont = <<< LOGOUT
			<div id="logIn">
				<form method="post" action="logProcess.php">
					<input type="submit" name="logOut" value="Log Out">
				</form>
			</div>
LOGOUT;
	$logOutCont .="\n";
	return $logOutCont;
	}

    function makeNavOptions(array $links){
        $output = "<ul>\n";
        foreach($links as $key=>$Value){
            $output .= "<li><a = href='$key'>$Value</a></li>\n";
        }
        $output .= "</ul>\n </nav>\n";
        return $output;
    }

    function makeNav($navHead){
		$navMenu = <<<NAV
		<nav>
		<h2>$navHead</h2>
NAV;
	$navMenu .="\n";
	return $navMenu;
	}

    function makeBody($bodyTitle){
		$bodyTitle = <<<BODY
		<div id="body">
		<h2>$bodyTitle</h2>
		<p>
BODY;
	$bodyTitle .="\n";
	return $bodyTitle;
	}
	
	function endBody(){
		echo "<p>\n		</div>\n";
	}
	

	function makeFooter($footCont){
		$fContent = <<<FOOT
		<footer>$footCont</footer>\n
		</div>
		</body>
		</html>
FOOT;
		return$fContent;
	}

?>
