<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipo-Cuentas.index') }}" class="nav-link {{ Request::is('tipoCuentas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Cuentas</p>
    </a>
</li>
