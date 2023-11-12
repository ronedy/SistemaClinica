<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            {{ __('Sistema Clinica') }}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-time-alarm"></i>
                    <p>{{ __('Citas programadas') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'citas' ? 'active' : '' }}">
                <a href="{{ route('cita.index') }}">
                    <i class="nc-icon nc-align-center"></i>
                    <p>{{ __('Historial de citas') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'clientes' ? 'active' : '' }}">
                <a href="{{ route('cliente.index') }}">
                    <i class="nc-icon nc-ambulance"></i>
                    <p>{{ __('Pacientes') }}</p>
                </a>
            </li>
            {{--
            <li class="{{ $elementActive == 'enfermedades' ? 'active' : '' }}">
                <a href="{{ route('enfermedad.index') }}">
                    <i class="nc-icon nc-atom"></i>
                    <p>{{ __('Enfermedades') }}</p>
                </a>
            </li>
             --}}
            <li class="{{ $elementActive == 'doctores' ? 'active' : '' }}">
                <a href="{{ route('doctor.index') }}">
                    <i class="nc-icon nc-user-run"></i>
                    <p>{{ __('Doctores') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'seguros' ? 'active' : '' }}">
                <a href="{{ route('seguro.index') }}">
                    <i class="nc-icon nc-tag-content"></i>
                    <p>{{ __('Seguro') }}</p>
                </a>
            </li> --}}
            <li class="{{ $elementActive == 'especialidades' ? 'active' : '' }}">
                <a href="{{ route('especialidad.index') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Especialidad Doctor') }}</p>
                </a>
            </li>
            {{-- <li class="{{ $elementActive == 'asignaciones-seguros' ? 'active' : '' }}">
                <a ref="{{ route('asignacionSeguro.index') }}">
                    <i class="nc-icon nc-delivery-fast"></i>
                    <p>{{ __('Asignacion Cliente/Seguero') }}</p>
                </a>
            </li> --}}

            @if ( auth()->user()->id_rol == 1)
            <li class="{{ $elementActive == 'usuarios' ? 'active' : '' }}">
                <a href="{{ route('usuarios.index') }}">
                    <i class="nc-icon nc-single-02"></i>
                    <p>{{ __('Usuarios') }}</p>
                </a>
            </li>
            @endif

            @if ( auth()->user()->id_rol == 1)
            <li class="{{ $elementActive == 'bitacora' ? 'active' : '' }}">
                <a href="{{ route('bitacora.index') }}">
                    <i class="nc-icon nc-align-center"></i>
                    <p>{{ __('Bitacora') }}</p>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
