{{-- resources/views/partials/adminPanelNavbarTop.blade.php --}}

<nav class="main-navbar nav">
    <div class="container-fluid">
        <div class="row justify-content-end">
            <div class="col-auto btn d-flex justify-content-end align-items-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" formaction="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();" class="btn btn-transparent">
                        <i class="bi bi-box-arrow-right px-1" style="font-size: 1.5rem;"></i> 
                        Odhlásiť sa
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>