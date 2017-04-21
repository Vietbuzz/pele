<!DOCTYPE html>
<html>
<head>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>

	<?php
		echo $this->Html->meta('icon');

        echo $this->Html->css('../bower_components/bootstrap/dist/css/bootstrap.min');
        echo $this->Html->css("pels");
		echo $this->Html->css('../bower_components/font-awesome/css/font-awesome.min');
        echo $this->Html->css('../bower_components/datatables-responsive/css/dataTables.responsive');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	<style>
		
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-2">
					<?php echo $this->Html->image('pels_logo.jpg', array(
						"width"=>"150px",
						"alt"=>"logo"
					)) ?>
				</div>
				<div class="col-md-9"></div>
			</div>
			<div class="row">
				<div class="col-md-12" id="nav">
					<ul>
						<li><?php echo $this->Html->link('Home', '/playlists/home')?></li>
					</ul>
				</div>
			</div>
		</div>

		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div class="row connect">
				<div class="col-md-12 center space">
						<a href="#"> <i class="fa fa-facebook white"></i></a>
						<a href="#"> <i class="fa fa-twitter white"></i></a>
				</div>
			</div>

			<div class="row last">
				<div class="col-md-12 center">
					Copyright: Everyday Conversations 2012
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
	<?php
		echo $this->Html->script('jquery-3.2.0.min');
		echo $this->Html->script('../bower_components/bootstrap/dist/js/bootstrap.min');
		//echo $this->Html->script('../dist/js/sb-admin-2');
		echo $this->Html->script('myscript');
	?>
<script>
	$(document).ready(function() {
		$('#media, #media2').carousel({
			pause: true,
			interval: false,
		});
		//maybe conflig
		$(".ducatipart").click(function(){
			$(this).children("input").attr("checked", true);
			var key = $(this).attr("id");
			var idplaylist='<?php echo $idplaylist?>';
			$.post('http://192.168.33.18/pele/playlists/returnText/', {'keyid': key,'idplaylist': idplaylist }, function(data){

				$("#testtext").html($.parseJSON(data)[0]);
				$("#originrow").empty();
				$("#yourrow").empty();
				inittext($.parseJSON(data)[0]);
				$("#audio").attr("src","/pele/files/"+$.parseJSON(data)[1]);
				$("#audio").attr("autoplay", true);
				$("#typingText").val("");
				$("#typingText").attr('disabled', false);
			});

			//var textstr = '
			//inittext(textstr);
			//alert(textstr);
		});
	});

	function inittext(textstr){
		 originText = textstr;
		 wordList = originText.split(" ");
		//wordList.push("");
		 typeList = [];
		 i=0;
		 temp = "";
		for( var count=0; count<wordList.length; count++){
			$("#originrow").append('<td><div class="origin"></div></td>');
			$("#yourrow").append('<td><div class="your"></div></td>');
		}
	}
</script>
</body>
</html>
