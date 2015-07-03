<?php	
	function home($i)
	{
?>
		<nav id="navigation">
			<div class="menu">
				<!--<ul>
					<li><a href=""></a></li>
					<li><a href=""></a></li>
				</ul>-->


                <nav class="navbar navbar-inverse">
                  <div class="container-fluid">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">DAG AND BRAGAN</a>
                    </div>
                    <div>

                        <ul class="nav navbar-nav navbar-right">
                           <?php if($i == 1){?> <li class="active"> <?php } else{?> <li> <?php } ?><a href="?action=login"><span class="glyphicon glyphicon-log-in"></span>  LOGIN</a></li>
                           <?php if($i == 2){?><li class="active"> <?php } else{?> <li> <?php } ?><a href="?action=register"><span class="glyphicon glyphicon-user"></span>  EMPLOYEE REGISITRATION</a></li>
                        </ul>

                    </div>
                  </div>
                </nav>


				<?php
				?>
				
			</div>
		</nav>
<?php
	}
?>




