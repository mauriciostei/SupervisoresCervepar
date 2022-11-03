<div class="d-flex flex-column">

    <h5 class="font-weight-bold">Dashboard</h5>
    <x-menu.link route="home" label="inicio" />

    @if( Auth::user()->can('viewAny', \App\Model\Users::class)
        || Auth::user()->can('viewAny', \App\Model\Perfiles::class)
    )
    <h5 class="font-weight-bold mt-3">Accesos</h5>
        @can('viewAny', \App\Model\Users::class)
            <x-menu.link route="users.index" label="Usuarios" />
        @endcan
        @can('viewAny', \App\Model\Perfiles::class)
            <x-menu.link route="perfiles.index" label="Perfiles" />
        @endcan
    @endif

    @if( Auth::user()->can('viewAny', \App\Model\Centros::class)
        || Auth::user()->can('viewAny', \App\Model\Sectores::class)
        || Auth::user()->can('viewAny', \App\Model\Sensores::class)
    )
    <h5 class="font-weight-bold mt-3">Locaciones</h5>
        @can('viewAny', \App\Model\Centros::class)
            <x-menu.link route="centros.index" label="Centros" />
        @endcan
        @can('viewAny', \App\Model\Sectores::class)
            <x-menu.link route="sectores.index" label="Sectores" />
        @endcan
        @can('viewAny', \App\Model\Sensores::class)
            <x-menu.link route="sensores.index" label="Sensores" />
        @endcan
    @endif

    @if( Auth::user()->can('viewAny', \App\Model\Problemas::class)
        || Auth::user()->can('viewAny', \App\Model\Soluciones::class)
    )
    <h5 class="font-weight-bold mt-3">Anomalías</h5>
        @can('viewAny', \App\Model\Problemas::class)
            <x-menu.link route="problemas.index" label="Problemas" />
        @endcan
        @can('viewAny', \App\Model\Soluciones::class)
            <x-menu.link route="soluciones.index" label="Soluciones" />
        @endcan
    @endif

</div>