<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('clientes.index') }}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Clientes</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('cuentas.index') }}" class="nav-link {{ Request::is('cuentas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Cuentas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipo-Cuentas.index') }}" class="nav-link {{ Request::is('tipoCuentas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Cuentas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipo-monedas.index') }}" class="nav-link {{ Request::is('tipoMonedas*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Monedas</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('tipo-movimientos.index') }}" class="nav-link {{ Request::is('tipoMovimientos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Tipo Movimientos</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('movimientos.index') }}" class="nav-link {{ Request::is('movimientos*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Movimientos</p>
    </a>
</li>
