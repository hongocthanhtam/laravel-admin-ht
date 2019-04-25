<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Ht active admin</h3>
    </div>

    <ul class="list-unstyled components">
        <p class="font-weight-bold">HT Side bar pages</p>
        <li>
            <a href="{{ route('service') }}">Service</a>
            <a href="{{ route('user') }}">User</a>
            <a href="{{ route('service_category') }}">Service Category</a>
            <!-- <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
            </ul> -->
        </li>
        <!-- <li>
            <a href="#">Portfolio</a>
        </li>
        <li>
            <a href="#">Contact</a>
        </li> -->
    </ul>

    <ul class="list-unstyled components">
        <p class="font-weight-bold">Other Pages</p>
        <li>
            <a href="{{ route('index') }}">Home</a>
        </li>
    </ul>
</nav>