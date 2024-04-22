
{{-- resources/views/partials/adminPanelNavbarMain.blade.php --}}

<section>
        <div class="container-fluid admin-panel-gray">
            <div class="row py-2 align-items-center">
            @foreach ($categories as $category)
                <div class="col-12 col-md">
                    <div class="d-flex align-items-center h-100 justify-content-center">
                    <button class="btn btn-transparent" onclick="location.href='{{ route('admin.products.show', $category->category_name) }}'">
                         {{ $category->category_name }}
                    </button>
                    </div>
                </div>
            @endforeach
                <div class="col d-none d-lg-block">
                    <div class="d-flex align-items-center h-100 justify-content-center">

                    </div>
                </div>
            </div>
        </div>
</section>