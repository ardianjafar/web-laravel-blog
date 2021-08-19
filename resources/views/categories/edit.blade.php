@extends('layouts.dashboard')

@section('title')
    {{ trans('categories.title.create') }}
@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('edit_category', $category) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
       <div class="card">
          <div class="card-body">
             <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- title -->
                <div class="form-group">
                   <label for="input_category_title" class="font-weight-bold">
                      {{ trans('categories.form_control.input.title.label') }}
                   </label>
                   <input id="input_category_title" value="{{ old('title', $category->title) }}" name="title" type="text" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                   placeholder="{{ trans('categories.form_control.input.title.placeholder') }}"/>
                   @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>
                <!-- slug -->
                <div class="form-group">
                   <label for="input_category_slug" class="font-weight-bold">
                    {{ trans('categories.form_control.input.slug.label') }}
                   </label>
                   <input id="input_category_slug" value="{{ old('slug', $category->slug) }}" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" readonly
                    placeholder="{{ trans('categories.form_control.input.slug.placeholder') }}
                    "/>
                    @error('slug')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <!-- thumbnail -->
                <div class="form-group">
                   <label for="input_category_thumbnail" class="font-weight-bold">
                    {{ trans('categories.form_control.input.thumbnail.label') }}
                   </label>
                   <div class="input-group">
                      <div class="input-group-prepend">
                          {{-- data-input="thumbnail"  --}}
                         <button id="button_category_thumbnail" data-input="input_category_thumbnail"
                         class="btn btn-primary" type="button" data-preview="holder">
                           {{ trans('categories.button.browse.value') }}
                         </button>
                      </div>
                      <input id="input_category_thumbnail" name="thumbnail" value="{{ old('thumbnail', asset($category->thumbnail)) }}" type="text" class="form-control @error('thumbnail') is-invalid @enderror" value="{{ old('thumbnail') }}"
                      placeholder="{{ trans('categories.form_control.input.thumbnail.placeholder') }}" readonly />
                      @error('thumbnail')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                </div>
                {{-- preview -> thumbnail --}}
                <div id="holder">
                </div>
                <!-- parent_category -->
                <div class="form-group">
                   <label for="select_category_parent" class="font-weight-bold">
                       {{ trans('categories.form_control.select.parent_category.label') }}
                   </label>
                   <select id="select_category_parent" name="parent_category"
                   data-placeholder="{{ trans('categories.form_control.select.parent_category.placeholder') }}" class="custom-select w-100">
                    @if (old('parent_category', $category->parent))
                        <option value="{{ old('parent_category', $category->parent)->id }}">
                            {{ old('parent->category', $category->parent)->title }}
                        </option>
                    @endif
                   </select>
                </div>
                <!-- description -->
                <div class="form-group">
                   <label for="input_category_description" class="font-weight-bold">
                        {{ trans('categories.form_control.textarea.description.label') }}
                   </label>
                   <textarea id="input_category_description" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" rows="3"
                   placeholder="{{ trans('categories.form_control.textarea.description.placeholder') }}">{{ old('description', $category->description) }}</textarea>
                   @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                   @enderror
                </div>
                <div class="float-right">
                	<a class="btn btn-warning px-4" href="{{ route('categories.index') }}">
                        {{ trans('categories.button.back.value') }}
                    </a>
                	<button type="submit" class="btn btn-primary px-4">
                        {{ trans('categories.button.edit.value') }}
                    </button>
                </div>
             </form>
          </div>
       </div>
    </div>
</div>

@endsection


@push('css-external')
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2-bootstrap4.min.css') }}">
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    {{-- filemanager --}}
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function(){
            // generate slug
            function generateSlug(value){
                return value.trim()
                .toLowerCase()
                .replace(/[^a-z\d-]/gi, '-')
                .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }
            // select2 parent category
            $('#select_category_parent').select2({
            theme: 'bootstrap4',
            language: "{{ app()->getLocale() }}",
            allowClear: true,
            ajax: {
                url: "{{ route('categories.select') }}",
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                        return {
                            text: item.title,
                            id: item.id
                        }
                        })
                    };
                }
            }
            });

            // event -> input title
            $('#input_category_title').change(function() {
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });

            // event -> select parent category
            $('#select_category_parent').change(function() {
                let title = $('#input_category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#input_category_slug').val(generateSlug(title + " " + parent_category));
            });

            // event -> thumbnail
            $('#button_category_thumbnail').filemanager('image');
        });
    </script>
@endpush
