<div class="wrapper">
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-header">
            <h3>PowerLandes</h3>
            <strong>LP</strong>
        </div>

        <ul class="list-unstyled components">
            <li class="nav-item active" style="{{ request()->is('admin/*') ? '' : 'display:none' }}">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="true">

                    <i class="fas fa-home fa-lg" aria-hidden="true"></i>
                    <b>Dashboard</b>
                </a>
            </li>
            <li class="" style="{{ request()->is('admin/*') ? '' : 'display:none' }}">
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-user fa-lg" aria-hidden="true"></i>
                    <b>Usuarios</b>
                </a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li><a href="{{ route('users.index') }}">Listar Usuarios</a></li>
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                    <li><a href="{{ route('permissions.index') }}">Permisos</a></li>
                </ul>
            </li>

            <li style="{{ request()->is('admin/*') ? '' : 'display:none' }}">
                <a href="#generatorSubmenu" data-toggle="collapse" aria-expanded="false">

                    <i class="fas fa-industry fa-lg" aria-hidden="true"></i>
                    <b>Generadores</b>
                </a>
                <ul class="collapse list-unstyled" id="generatorSubmenu">
                    <li><a href="#">Listar generadores</a></li>
                    <li><a href="#">Gráficos</a></li>
                    <li><a href="#">Envío de datos</a></li>
                    <li><a href="#">Mantenciones</a></li>
                </ul>

                <a href="#boilerSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-fire fa-lg" aria-hidden="true"></i>
                    <b>Calderas</b>
                </a>
                <ul class="collapse list-unstyled" id="boilerSubmenu">
                    <li><a href="#">Listar calderas</a></li>
                    <li><a href="#">Gráficos</a></li>
                    <li><a href="#">Mantenciones</a></li>
                </ul>
            </li>
            <li style="{{ request()->is('admin/*', 'analista/*') ? '' : 'display:none' }}">
                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-chart-bar fa-lg" aria-hidden="true"></i>
                    <b>Reporte</b>
                </a>
                <ul class="collapse list-unstyled" id="reportSubmenu">
                    <li><a href="#">Generadores</a></li>
                    <li><a href="#">Caldera</a></li>
                </ul>
            </li>

            <li style="{{ request()->is('admin/*') ? '' : 'display:none' }}">
                <a href="#">
                    <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                    <b>Sección de API´S</b>
                </a>
            </li>

        </ul>

    </nav>


</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
