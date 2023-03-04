<button type="button" class="btn-menu-expand btn btn-primary btn-block mb-4 d-lg-none" type="button" data-toggle="collapse" data-target="#navbarUserHome" aria-controls="navbarCollapse" aria-expanded="false">
		<i class="fa fa-bars mr-2"></i> {{trans('general.categories')}}
	</button>

	<div class="navbar-collapse collapse d-lg-block" id="navbarUserHome">

		<span class="category-filter d-lg-block d-none">
			<i class="bi bi-list-ul mr-2"></i> {{trans('general.categories')}}
		</span>
		
	<div class="py-1 mb-4">
	<div class="text-center">
		@foreach (Categories::where('mode','on')->orderBy('name')->with('subcategories')->get() as $category)
		<div class="main-menu @if(Request::path() == "category/$category->slug" || Request::path() == "category/$category->slug/featured" || Request::path() == "category/$category->slug/more-active" || Request::path() == "category/$category->slug/new" || Request::path() == "category/$category->slug/free") clicked @endif">
			<div class="main-menu-content btn btn-sm bg-white border mb-2 e-none btn-category @if(Request::path() == "category/$category->slug" || Request::path() == "category/$category->slug/featured" || Request::path() == "category/$category->slug/more-active" || Request::path() == "category/$category->slug/new" || Request::path() == "category/$category->slug/free")active-category @endif">
				<a class="text-muted" href="{{url('category', $category->slug)}}">
					<img src="{{url('public/img-category', $category->image)}}" class="mr-2 rounded" width="30" /> {{ Lang::has('categories.' . $category->slug) ? __('categories.' . $category->slug) : $category->name }}
				</a>
			</div>

			@foreach($category->subcategories as $subcategory)
				<div class="sub-menu btn btn-sm bg-white border mb-2 e-none btn-category @if(Request::path() == "category/$category->slug/$subcategory->slug")active-sub-category @endif">
				<a class="text-muted" href="{{ url('category', [$category->slug, $subcategory->slug]) }}">
					<img src="{{url('public/img-sub-category', $subcategory->image)}}" class="mr-2 rounded sub-menu-child" width="30" /> {{ $subcategory->name }}
				</a>
				</div>
			@endforeach
		</div>
		@endforeach
</div>
</div>
</div>
