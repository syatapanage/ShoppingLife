<!DOCTYPE html>
<html>
<head>
  <title>Shopping cart</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css">
</head>
<body>
	<div>
		<ul id="toplist">
			<li class="left"><a href="<?php echo base_url(); ?>index.php/home" id="logo">Shopping Life</a></li>
			<li class="right">
				<?php  if (isset($_SESSION['username'])) : ?>
				<a href="<?php echo base_url(); ?>index.php/users/logout" id="logout">Logout</a>
				<?php endif ?>
			</li>
			<li class="right">
				<?php  if (isset($_SESSION['username'])) : ?>
				<p>Logged in as: <strong><?php echo $_SESSION['username']; ?></strong></p>
				<?php endif ?>
			</li>
				
		</ul>
	</div>
			
	<div class="sellheader">
		<h2>Shopping cart</h2>
	</div>
			
	<div class="sellitem">
				
		<table id="cartitems" width="400" border="1" cellspacing="5" cellpadding="5">
			<tr>
			<th>Product name</th>
			<th>Price</th>
			<th>Action</th>
	
			</tr>
				<?php
				$totalcart = 0;
  
				foreach($cart as $row) {
					echo "<tr>";
					echo "<td>".$row->productname."</td>";
					echo "<td>$" . $row->price."</td>";
					echo "<td>";
					echo '<a href="deleteitem/'.$row->cartid.'">Remove</a>';
					echo "</td>";
					echo "</tr>";
  
					$totalcart += $row->price;
				}
				echo "<tr style=\"background:#e6e6e6\">";
				echo "<td><strong>TOTAL</strong></td>";
				echo "<td><strong>$" . $totalcart ."</strong></td>";
				echo "<td></td>";
				echo "</tr>";
				?>
		</table>

	</div>

</body>
</html>
