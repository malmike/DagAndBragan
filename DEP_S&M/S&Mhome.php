<?php
	session_start();
	function smhome()
	{
?>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="?">S&M DEPARTMENT</a>
                </div>
                <div>
                    <ul class="nav navbar-nav"> 
                        <li><a href="?view=viewClientList">VIEW CLIENTS</a></li>
			        </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="?action=logout"><span class="glyphicon glyphicon-log-out"></span>LOGOUT</a></li>
                    </ul>

                </div>
            </div>
        </nav>
<?php
	}
?>