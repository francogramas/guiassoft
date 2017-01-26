@extends('layouts.plane')
@section('body')
 <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Mostrar/Ocultar Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">GuiasSoft V3.1</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">                                            
                                        <i class="fa fa-sign-out fa-fw"></i> Salida Segura</a>
                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li >
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Facturas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*venta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('facturas/venta') }}">Capitadas</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('facturas/compra' ) }}">Por eventos</a>
                                </li>
                                <li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>
                                    <a href="{{ url('facturas/cotizacion') }}">Evento capitada</a>
                                </li>
                            </ul>
                        </li>
                        <li {{ (Request::is('*terceros') ? 'class="active"' : '') }}>
                            <a href="#"><i class="fa fa-users fa-fw"></i>Pacientes<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/pacienteslistado') }}">Listado</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/pacientes' ) }}">Registrar nuevo</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/pacientes' ) }}">Cargue masivo</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/pacientes' ) }}">Historial de asistencias</a>
                                </li>
                                <li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/admin/pacientes' ) }}">Historia clínica</a>
                                </li>
                            </ul>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-pencil-square fa-fw"></i>Contratación<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Seguros Médicos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/segurosmedicoslistado') }}">Listado</a>
                                        </li>
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/segurosmedicos') }}">Agregar Nuevo</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Contratos<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/contratos') }}">Administrar</a>
                                        </li>
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/contratos/create') }}">Agregar Nuevo</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Empleados<span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/empleadoslistado') }}">Administrar</a>
                                        </li>
                                        <li {{ (Request::is('*panels') ? 'class="active"' : '') }}>
                                            <a href="{{ url ('/admin/empleados') }}">Agregar Nuevo</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li >
                            <a href="#"><i class="fa  fa-wrench fa-fw"></i>Herramientas Administrativas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/empresa') }}">Datos generales</a>
                                </li>
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/servicios') }}">Servicios</a>
                                </li> 
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('admin/instalaciones') }}">Instalaciones</a>
                                </li>                                                                                 
                            </ul>
                        </li>
                        <li >
                            <a href="#"><i class="fa  fa-heart fa-fw"></i>Historias Clínicas<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('hc/antecedente') }}">Antecedentes</a>
                                </li>
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('hc/etapashc') }}">Etapas</a>
                                </li>
                                <li {{ (Request::is('*empresa') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('hc/antecedente') }}">Estructura</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <!--div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">
                @include('partials.message')
				@yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop