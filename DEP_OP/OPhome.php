<?php
	session_start();
	function ophome()
	{
?>

        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="?">OPERATIONS DEPARTMENT</a>
                </div>
                <div>
                    <ul class="nav navbar-nav"> 
                        <li class="active" class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">WORKPLAN<span class="caret"></span> </a> 
						    <ul class="dropdown-menu">
                                <li class="divider"></li> 
							    <li><a href="?view=viewWorkplan">VIEW WORKPLAN</a></li> 
                                <li class="divider"></li>
							    <li><a href="?insert=insWorkPlan">ENTER WORKPLAN</a></li> 
                                <li class="divider"></li>
						    </ul> 
					    </li>
                        <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown">TEAM<span class="caret"></span> </a> 
						    <ul class="dropdown-menu">
                                <li class="divider"></li> 
							    <li><a href="?view=viewTeam">VIEW TEAMS</a></li> 
                                <li class="divider"></li>
							    <li><a href="?insert=insTeam">ASSIGN TEAM</a></li> 
                                <li class="divider"></li>
						    </ul> 
					    </li>  
					    <li><a href="?insert=insInspection">INSPECTION</a></li>
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
