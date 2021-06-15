<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Testing jQuery Gracket Version 1.5.5</title>

	<!-- basic styles -->
	<style type="text/css">
		.g_gracket { min-width: 700px; background-color: #fff; padding: 55px 15px 5px; line-height: 100%; position: relative; overflow: hidden;}
		.g_round { float: left; margin-right: 70px; }
		.g_game { position: relative; margin-bottom: 15px; }
		.g_gracket h3 { margin: 0; padding: 10px 8px 8px; font-size: 18px; font-weight: normal;}
		.g_team { background: #FCAF80; }
		.g_team:last-child {  background: #FCCD80; }
		.g_round:last-child { margin-right: 20px; }
		.g_winner { background: #FF6060; }
		.g_winner .g_team { background: none; }
		.g_current { cursor: pointer; background: #3DBECE!important; }
		.g_round_label { top: -5px; font-weight: normal; color: white; text-align: center; font-size: 18px;}
	</style>

	<!-- dependencies -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.js"></script>

	<!-- main lib -->
	<script type="text/javascript" src="../../../app/Dependencies/jquery.gracket.min.js"></script>


</head>
<body>

	<!-- empty gracket element -->
	<div class="my_gracket"></div>

	<script type="text/javascript">
        console.log('Hello');

		(function(win, doc, $){
			
			console.warn("Make sure the min-width of the .gracket_h3 element is set to width of the largest name/player. Gracket needs to build its canvas based on the width of the largest element. We do this my giving it a min width. I'd like to change that!");

			// Fake Data
			win.TestData = [
                @foreach ($data['tour'] as $tour)
                    [
                        @foreach ($data['match'] as $matchs)
                            [
                                {"name" : "{{$tour->id}}", "id" : "{{$tour->id}}", "score" : 2},
                            ],
                        @endforeach
                    ],
                @endforeach
			];

			// initializer
			$(".my_gracket").gracket({ src : win.TestData });

		})(window, document, jQuery);
	</script>
</body>
</html>