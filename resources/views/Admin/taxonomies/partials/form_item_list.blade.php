@foreach ($taxonomies as $taxonomy)

    <option value="{{$taxonomy->id ?? ""}}"
            @isset($parent)

                @if ($parent == $taxonomy->id)
                selected="true"
                @endif

            @endisset

    >
        {!! $delimiter ?? "" !!}{{$taxonomy->title ?? ""}}
    </option>

    @if (count($taxonomy->children) > 0)

        @include('admin.taxonomies.partials.form_item_list', [
          'taxonomies'  => $taxonomy->children()->where('content_type', $content_type)->get(),
          'delimiter'   => '&mdash;' . $delimiter . ' ',
          'parent'      => $parent
        ])

    @endif
@endforeach