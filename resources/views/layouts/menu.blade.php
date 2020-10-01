
<li class="nav-item {{ Request::is('movies*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('movies.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Movies</span>
    </a>
</li>

<li class="nav-item ">
    <a target="_blank" class="nav-link" href="{{ url('generator_builder') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>Module Generator</span>
    </a>
</li>
 
