<?php function loadDayTourPriceCompute($code){ ?>
	<form id="form_price" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
		<input type="hidden" name="code" value=<?php echo $code ?> > 
		<label for="adults">Adults</label>
		<input name="adults" size="2" pattern='\d{1}'><br>
		<label for="kids05">Child(0-5 years)</label>
		<input name="kids05" size="2" a><br>
		<label for="kids612">Child(6-11 years)</label>
		<input name="kids612" size="2"><br>
		<input type="submit">
	</form>
	
<?php } ?>	



<?php function loadDayTourBook(){ ?> 
	<form action="" method="post">
		<input type="hidden" name=<?php echo $code ?>> 
		<label for="name" >Name</label><br>
		<input name="name" size="35"><br>
		<label for="departureDate" >Date of tour</label><br>
		<input type ="date" name="departureDate"><br>
		<label for="email">Email Address</label><br>
		<input type="email" name="email" size="35"><br>
		<label for="contactNo">Contact number</label><br>
		<input type="text" name="contactNo" size="15"><br>
		<input type="submit">				
	</form>
<?php } ?>

<?php 

?>	