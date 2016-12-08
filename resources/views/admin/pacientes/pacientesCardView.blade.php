<style type="text/css" media="screen">
	body {
	  background: #F1F3FA;
	}

	/* Profile container */
	.profile {
	  margin: 20px 0;
	}

	/* Profile sidebar */
	.profile-sidebar {
	  padding: 10px 0 5px 0;
	  background: #fff;
	}

	.profile-userpic img {
	  float: none;
	  margin: 0 auto;
	  width: 50%;
	  height: 50%;
	  -webkit-border-radius: 50% !important;
	  -moz-border-radius: 50% !important;
	  border-radius: 50% !important;
	}

	.profile-usertitle {
	  text-align: center;
	  margin-top: 5px;
	}

	.profile-usertitle-name {
	  color: #5a7391;
	  font-size: 15px;
	  font-weight: 500;
	  margin-bottom: 7px;
	}

	.profile-usertitle-job {
	  text-transform: uppercase;
	  color: #5b9bd1;
	  font-size: 12px;
	  font-weight: 600;
	  margin-bottom: 15px;
	}

	.profile-userbuttons {
	  text-align: center;
	  margin-top: 10px;
	}

	.profile-userbuttons .btn {
	  text-transform: uppercase;
	  font-size: 11px;
	  font-weight: 600;
	  padding: 6px 15px;
	  margin-right: 5px;
	}

	.profile-userbuttons .btn:last-child {
	  margin-right: 0px;
	}
	    
	.profile-usermenu {
	  margin-top: 10px;
	}

	.profile-usermenu ul li {
	  border-bottom: 1px solid #f0f4f7;
	}

	.profile-usermenu ul li:last-child {
	  border-bottom: none;
	}

	.profile-usermenu ul li a {
	  color: #93a3b5;
	  font-size: 14px;
	  font-weight: 400;
	}

	.profile-usermenu ul li a i {
	  margin-right: 8px;
	  font-size: 14px;
	}

	.profile-usermenu ul li a:hover {
	  background-color: #fafcfd;
	  color: #5b9bd1;
	}

	.profile-usermenu ul li.active {
	  border-bottom: none;
	}

	.profile-usermenu ul li.active a {
	  color: #5b9bd1;
	  background-color: #f6f9fb;
	  border-left: 2px solid #5b9bd1;
	  margin-left: -2px;
	}

	/* Profile Content */
	.profile-content {
	  padding: 20px;
	  background: #fff;
	  min-height: 460px;
	}	
</style>

<div>
		<div>
			<div class="profile-sidebar">
				<div class="profile-usertitle">
					<div class="profile-usertitle-job">
						<div class="btn btn-info btn-circle btn-lg ">
						<i class="glyphicon glyphicon-user"></i>
						</div>
						Datos Personales
					</div>
										
				</div>				
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#" title="Dirección">
							<i class="glyphicon glyphicon-home"></i>
							{!! $pacientes->direccion !!} </a>
						</li>
						<li>
							<a href="#" title="Teléfono">
							<i class="glyphicon glyphicon-earphone"></i>
							{!! $pacientes->telefono !!} </a>
						</li>
						<li>
							<a href="#" title="Fecha de nacimiento">
							<i class="glyphicon glyphicon-hourglass"></i>
							{!! $pacientes->nacimiento !!} </a>
						</li>				
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
</div>
