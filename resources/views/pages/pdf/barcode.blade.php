<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<style type="text/css">
		.container {
			margin: auto;
			width: 80%;
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>
	<div class="container">
		<table>
			<tr>
				@for ($i = 0; $i < $banyak ; $i++)
					<td style="padding: 10px;">{!! DNS1D::getBarcodeSVG($barang->barcode, 'C39', 1, 66) !!}</td>
					@if (($i+1) % 3 == 0)
						</tr><tr>
					@endif
				@endfor
			</tr>
		</table>
	</div>	
	<script>
		window.addEventListener('DOMContentLoaded', () => {
			(function() {
		      window.print();
		      setTimeout(() => {
					history.back(); 
		      }, 500);
		   })();
		});	   
	</script>
</body>
</html>