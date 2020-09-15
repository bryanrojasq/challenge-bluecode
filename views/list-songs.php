<style>
	#custom-search {
		background: black;
		color: white;
		text-align: center;
/*		margin: 20px 0;
    	padding: 50px 0;*/
	}
	#custom-search .ctrl {
		display: flex;
		width: 320px;
    	margin: 0 auto;
    	position: relative;
	}
	#custom-search form {
		width: 100%;
	}
	#custom-search input {
		color: black;
		width: 100%;
		height: 30px;
		border: 0;
	    border-radius: 3px;
    	text-indent: 27px;
	}
	#custom-search button {
		color: black;
		border: black;
	}
	#custom-search svg {
		z-index: 1;
	    position: absolute;
	    top: 50%;
	    left: 3px;
	    width: 18px;
	    height: 18px;
	    fill: rgba(0, 0, 0, .6);
	    -webkit-transition: all .3s;
	    transition: all .3s;

        transform: translateY(-50%);
	}
	#custom-search svg:last-of-type {
		left: auto;
		right: 3px;
	    width: 18px;
	    height: 18px;
	}
	#suggestions {
		/*border: 1px solid transparent;*/
		box-shadow: 0px 6px 12px grey;
		background: rgba(255, 255, 255, .75);
		/*padding: 20px;*/
		list-style: none;
		padding: 0;
		/*border-bottom-right-radius: 3px;
		border-bottom-left-radius: 3px;*/
		border-radius: 3px;

		width: 100%;
		position: absolute;
    	top: 32px;
	}
	#suggestions a {
		cursor: pointer;
		color: black;
		display: block;
		padding: 12px 0;
		border: 1px solid transparent;
	}
	#suggestions a:hover {		
		border-radius: 3px;
		border-bottom: 1px solid lightgrey;
		border-top: 1px solid lightgrey;
		box-shadow: 0px -1px 7px lightgrey;
		background: rgba(255, 255, 255, 0.6);
	}
	body {
		/*padding-top: 60px;*/
	}


	@media screen and (min-width: 767px) {
		.main {
			display: flex;
		}
		.main ul {
			flex-grow: 2;
		}
		.main aside {
			flex-grow: 1;
		}		
	}
	#subscribe {
		border: 1px solid grey;
		background: lightgrey;
		padding: 20px;
		display: flex;

		position: relative;
	}

	#subscribe .error-mgs {
		position: absolute;

		/* IE & FireFox */
		animation: slideRight 1s;
		/* Chrome, Safari & Opera */
		-webkit-animation: slideRight 1s;

		animation-fill-mode: forwards;

		top: 50%;
		transform: translateY(-50%);
	}

	/* IE & FireFox */
	@keyframes slideRight {
		from {
			right: -100%;
		}
		to {
			right: 0;
		}
	}
	 
	/* Chrome, Safari & Opera */
	@-webkit-keyframes slideRight {
		from {
			right: -100%;
		}
		to {
			right: 0;
		}
	}

	.bi-hourglass-split {
		animation-name: spin;
  		animation-duration: 3s;
  		/*https://www.w3schools.com/css/tryit.asp?filename=trycss3_transition_speed*/
  		animation-timing-function: linear;
		/*animation-delay: 4s;*/
  		animation-iteration-count: infinite;  		
  		/*animation-direction: alternate;*/
  		animation-fill-mode: forwards;
  		/*animation: spin 3s ease-in-out 2s infinite alternate;*/
	}
	@keyframes spin { 
		0% {
			-webkit-transform: rotate(0); 
			transform:rotate(0);		
		}
		60%, 100% { 
			-webkit-transform: rotate(360deg); 
			transform:rotate(360deg); 
			color: coral;
		} 
	}
</style>

<section id="custom-search">
	<header>
		Songs Collection
	</header>
	<div class="ctrl">
		<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
		  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
		</svg>

		<form action="/" id="finder-songs">
			<input type="text" placeholder="Search" name="q" autocomplete="off">
			<ul id="suggestions">
				<li><a href="#1" data-option="key-1">Tip 1</a></li>
				<li><a href="#2" data-option="key-2">Tip 2</a></li>
				<li><a href="#3" data-option="key-3">Tip 3</a></li>
				<div id="tmpl-component-2"></div>
			</ul>
		</form>
		<svg id="form-reset" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
		  <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
		  <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
		</svg>
	</div>
</section>


<!-- fumar, tocer, tímpano roto, comezón de conducto del oido, respiración, transformación  -->
<!-- presencia y conciencia de mi ego que no se detiene, poca alerta, caida -->

<section class="main">

	<?php
	global $post;

	$songs = get_posts([
	    'posts_per_page' => 5,
	    'post_type' => 'songs',
	]);

	if ($songs):
	    ob_start();
		    foreach ($songs as $post):
		        setup_postdata($post);
		        ?>
		    	<li>
					<h2>
						<strong>song:</strong> 
						<a href="<?php the_permalink();?>" style="color: red;"><?php the_title();?></a>
					</h2>
					<div>
						<img src="https://via.placeholder.com/150.png/000000/FFFFFF/?text=<?php the_title();?>" alt="ALBUM THUMBNAIL">
						<strong>album:</strong> 
						<?php print show_category('album', $post);?>
					</div>
					<div>			
						<strong>artist:</strong> 
						<?php print show_category('artist', $post);?>			
					</div>
				</li>
				<?php
		    endforeach;
	    wp_reset_postdata();
		$list = ob_get_clean();
	    printf('<ul>%s</ul>', $list);
	endif;
	?>


	<aside>
		<section id="subscribe">
			<div class="ctrl-2">
				<input type="text" name="email" placeholder="add your email here">
			</div>
			<button type="submit" id="subscribe-cta" class="">
				SUBSCRIBE!
				<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-hourglass-split" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				  <path fill-rule="evenodd" d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0c0 .701.478 1.236 1.011 1.492A3.5 3.5 0 0 1 11.5 13s-.866-1.299-3-1.48V8.35z"/>
				</svg>
			</button>
		</section>
		<div class="searching-space">
			<button type="submit" id="get-data" class="">
				GET DATA!
			</button>
			<label for="activate-err">
				<input type="checkbox" id="activate-err">
				activate error
			</label>
		</div>
		
		<div id="tmpl-component-1"></div>

		<script type="text/html" id="tmpl-my-template">
		   <p>Status: {{{data.status}}}</p> 
		   <p>Msg: {{{data.msg}}}</p> 
		   <p>data: {{{data.success}}}</p> 
		</script>
	</aside>

</section>

<script type="text/html" id="suggestions-item">
	<li>{{{data.name}}}</li>
</script>
