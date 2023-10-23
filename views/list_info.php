<h2>List of Users</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Email</th>
				<th>User name</th>
				<th>Edit / Delete</th>
			</tr>
		</thead>
		<tbody>
			<?php 
		
			$lines = file('data/bb.csv',FILE_IGNORE_NEW_LINES);
			
		
			$i = 0;
			
	
			foreach($lines as $line) {
				$parts = explode(',',$line);
				$email = $parts[1];
				$username = $parts[3];
				
				echo '<tr>';
				echo 	"<td>$email</td>";
				echo 	"<td>$username</td>";
			
				echo 	"<td><a class=\"btn btn-warning\" href=\"./?p=form_edit&band=$i\"><i class=\"icon-edit icon-white\"></i></a> <a class=\"btn btn-danger\" href=\"actions/delete.php?linenum=$i\"><i class=\"icon-trash icon-white\"></i></a></td>";
				echo '</tr>';
				
				$i++; // increment line number
			}
			?>
		</tbody>
	</table>