<?php

	
		if(isset($_POST['submit']))
			{
				$name = $_POST['name'];
				$id = $_POST['id'];
                $borrowdate = $_POST['date'];
				$borrowdate = date("Y-m-d");
				$book = $_POST['book'];
                
                $date= date_create($_POST['date']);
                date_add($date,date_interval_create_from_date_string("7 days"));
			
                if(strlen($id)==10 && substr_count($id,"-")==2)
                {
                    
				$cookie_name = $id;

				$cookie_value = $book;

				if(!isset($_COOKIE[$cookie_name]))
				{
					echo $cookie_name.$cookie_value;
					setcookie($cookie_name, $cookie_value, time() + (30 * 86400));
				}else{
					echo "Sorry You have already borrowed a book on".$borrowdate.". You cannot take another book in 7 days from the borrowing date. You can again be able to borrow the same book on ";echo date_format($date,"Y-m-d");

				}

				if (isset($_COOKIE[$cookie_name]) && count($_COOKIE) > 0) {  
					echo " <br> Your Borrowed book is".$_COOKIE[$cookie_name]."</p>";
				}
				}else{
                    echo'Id is not correct';
                }
			}
			

		
		
?>
<h2> HI, <?php echo $_POST['name']; ?> </h2>
<a href="http://localhost/book/process.php">Refresh</a>

